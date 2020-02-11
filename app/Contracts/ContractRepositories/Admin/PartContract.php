<?php


namespace App\Contracts\ContractRepositories\Admin;


use App\Contracts\vendor\TemplateContract;
use Illuminate\Http\Request;

interface PartContract extends TemplateContract
{
    public function removeImage(array $ids, int $id);

    public function restoreImage(Request $request,  int $id);
}
