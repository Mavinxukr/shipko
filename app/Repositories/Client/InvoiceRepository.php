<?php


namespace App\Repositories\Client;


use App\Contracts\ContractRepositories\Client\InvoiceContract;
use App\Http\Resources\InvoiceResource;
use App\Models\Invoice\Invoice;
use App\Traits\FormattedJsonResponse;
use App\Traits\SortCollection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class InvoiceRepository implements InvoiceContract
{
    use FormattedJsonResponse, SortCollection;

    public function index(Request $request)
    {
        $search = \request('search');
        $model = $request->user()
            ->autos()
            ->latest('id')
            ->with('invoice')
            ->has('invoice');

        if(!is_null($search)){
            $model->whereHas('lotInfo', function (Builder $autoQuery) use ($search) {
                $autoQuery->where('vin_code', 'like', "%$search%");
            });
        }

        $invoices = $this->getWithSort($model,
            \request('countpage'),
            \request('order_type'),
            \request('order_by'))
            ->pluck('invoice');


        return $this->toJson('Get All invoice',200,
            InvoiceResource::collection($invoices)->additional($this->amountValue()), true);

    }

    public function show(Request $request, int $id)
    {
        //TODO: if needed add
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
