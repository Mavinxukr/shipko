<?php

namespace App\Http\Controllers\ApiClient\Invoice;

use App\Contracts\ContractRepositories\Client\InvoiceContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    private  $invoice;

    public function __construct(InvoiceContract $invoice)
    {
        $this->invoice = $invoice;
    }
    /**
     * @api {get} client/get-invoices  Show All Invoices
     * @apiName Show All Invoices
     * @apiVersion 1.1.1
     * @apiGroup Client Auto
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  client/get-invoices
     */

    public function index(Request $request)
    {
        return $this->invoice->index($request);
    }

}
