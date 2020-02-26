<?php


namespace App\Repositories\Admin;


use App\Contracts\ContractRepositories\Admin\InvoiceContract;
use App\Http\Resources\InvoiceResource;
use App\Models\Invoice\Invoice;
use App\Traits\FormattedJsonResponse;
use App\Traits\Service\AutoService\UploadDocuments;
use Illuminate\Http\Request;

class InvoiceRepository implements InvoiceContract
{
    use FormattedJsonResponse, UploadDocuments;

    public function index()
    {
        $invoices = Invoice::latest('id')->paginate(10);
        return $this->toJson('Get All invoice',200,
            InvoiceResource::collection($invoices)->additional($this->amountValue()));

    }

    public function show(int $id)
    {
        return $this->toJson('Get invoice by id',200,
            new InvoiceResource(Invoice::findOrFail($id)));
    }

    public function store(Request $request)
    {
        $document = $request->only('document');
        $invoice = Invoice::create($request->except(['type','file']));
        if (isset($document['document'])) $this->saveDocuments($invoice,$document['document'],'invoice');

        dd($invoice);
        return $this->toJson('Invoice created successfully', 201,
                                new InvoiceResource($invoice));
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
        return $this->toJson('Invoice deleted successfully',200, null);

    }

    public function restoreImage(Request $request, int $id)
    {
        $invoice = Invoice::findOrFail($id);
        $this->saveDocuments($invoice, $request->document,'invoice');
        return $this->toJson('Auto document restore successfully',
            200, new InvoiceResource($invoice));
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
}
