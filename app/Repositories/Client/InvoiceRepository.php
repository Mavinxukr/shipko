<?php


namespace App\Repositories\Client;


use App\Contracts\ContractRepositories\Client\InvoiceContract;
use App\Http\Resources\InvoiceResource;
use App\Models\Invoice\Invoice;
use App\Traits\FormattedJsonResponse;
use Illuminate\Http\Request;

class InvoiceRepository implements InvoiceContract
{
    use FormattedJsonResponse;

    public function index(Request $request)
    {
        $user = $request->user();
        $invoices = $user->autos()->latest('id')->with('invoice')->has('invoice')->paginate(10)->pluck('invoice');
        return $this->toJson('Get All invoice',200,
            InvoiceResource::collection($invoices)->additional($this->amountValue()));

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
