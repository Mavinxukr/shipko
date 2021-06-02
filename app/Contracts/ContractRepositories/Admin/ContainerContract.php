<?php


namespace App\Contracts\ContractRepositories\Admin;

use App\Contracts\vendor\TemplateContract;
use Illuminate\Http\Request;


interface ContainerContract extends TemplateContract
{
    public function delete(Request $request);
}
