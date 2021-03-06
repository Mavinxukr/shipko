<?php

namespace App\Repositories\Admin;

use App\Contracts\ContractRepositories\Admin\InvoiceContract;
use App\Filters\InvoiceFilters\AuctionStatus;
use App\Filters\InvoiceFilters\ClientId;
use App\Filters\InvoiceFilters\DateFrom;
use App\Filters\InvoiceFilters\DateTo;
use App\Filters\InvoiceFilters\PastDue;
use App\Filters\InvoiceFilters\ShippingStatus;
use App\Http\Resources\InvoiceResource;
use App\Models\Invoice\Invoice;
use App\Traits\FormattedJsonResponse;
use App\Traits\GetAdditional;
use App\Traits\Service\AutoService\UploadDocuments;
use App\Traits\SortCollection;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class InvoiceRepository implements InvoiceContract
{
    use FormattedJsonResponse, UploadDocuments, SortCollection;

    public function index()
    {
        $search = \request('search');
        $model = Invoice::latest('id');

        if(!is_null($search)){
            $model->whereHas('auto', function (Builder $query) use($search) {
                $query->whereHas('lotInfo', function (Builder $autoQuery) use ($search) {
                    $autoQuery->where('vin_code', 'like', "%$search%");
                });
            });
        }

        $model =  app(Pipeline::class)
            ->send($model)
            ->through([
                ClientId::class,
                DateFrom::class,
                DateTo::class,
                AuctionStatus::class,
                ShippingStatus::class,
                PastDue::class,
            ])->thenReturn()
            ->select('invoices.*');

        $invoices = $this->getWithSort($model,
            \request('countpage'),
            \request('order_type'),
            \request('order_by'));

        return $this->toJson('Invoices get all successfully',200,
            InvoiceResource::collection($invoices)->additional(array_merge($this->getAdditional(), $this->amountValue())), true);
    }

    public function show(int $id)
    {
        return $this->toJson('Invoices get by id successfully',200,
            new InvoiceResource(Invoice::findOrFail($id)));
    }

    public function store(Request $request)
    {
        $document = $request->only('document');
        $invoice = Invoice::create($request->except(['type','file']) + [
            'due_day' => Carbon::now(),
        ]);
        if (isset($document['document'])) $this->saveDocuments($invoice,$document['document'],'invoice');

        return $this->index();
        /*return $this->toJson('Invoice created successfully', 201,
            new InvoiceResource($invoice));*/
    }

    public function update(Request $request, int $id)
    {
        Invoice::whereId($id)
            ->update(array_filter($request->all()));
        $invoice = Invoice::find($id);

        return $this->toJson('Invoice updated successfully',200,
                new InvoiceResource($invoice));
    }

    public function destroy(int $id)
    {
        $invoice = Invoice::findOrFail($id);
        $documents = $invoice->documents()->pluck('id')
                                            ->toArray();
        if (count($documents)) $this->deleteDocument($documents, $invoice,'invoice');
        $invoice->delete();

        return $this->index();
        /*return $this->toJson('Invoice deleted successfully',200, null);*/
    }

    public function restoreImage(Request $request, int $id)
    {
        $invoice = Invoice::findOrFail($id);
        $this->saveDocuments($invoice, $request->document,'invoice');

        return $this->toJson('Auto document restore successfully',200,
            new InvoiceResource($invoice));
    }

    public function deleteImage(Request $request, int $id)
    {
        $invoice = Invoice::findOrFail($id);
        $ids = explode(',',$request->ids);
        $documents =  $invoice->documents()->find($ids)->pluck('id')
                        ->toArray();
        if (count($documents)) $this->deleteDocument($documents, $invoice,'invoice');

        return $this->toJson('Auto document deleted successfully',200,
            null);
    }

    public function amountValue() : array
    {
        $amount = [];
        $arrayValues = ['total_price','outstanding_price','paid_price'];
        foreach ($arrayValues as $item){
            $amount['amount'][$item] = Invoice::whereNotNull($item)->sum($item);
        }
        return $amount;
    }

    public function getAdditional()
    {
        return GetAdditional::get(['clients']);
    }
}
