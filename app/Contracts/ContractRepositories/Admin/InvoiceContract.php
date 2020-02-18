<?php


namespace App\Contracts\ContractRepositories\Admin;


use App\Contracts\vendor\TemplateContract;
use Illuminate\Http\Request;

interface InvoiceContract extends TemplateContract
{
    public function restoreImage(Request $request, int  $id);
    public function deleteImage(Request $request, int  $id);
}
