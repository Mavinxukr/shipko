<?php


namespace App\Contracts\ContractRepositories\Client;


use App\Contracts\vendor\TemplateContract;
use Illuminate\Http\Request;

interface InvoiceContract
{
    public function index(Request $request);
    public function show(Request $request, int $id);
    public function amountValue() : array;
}
