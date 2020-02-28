<?php


namespace App\Contracts\ContractRepositories\Client;

use App\Contracts\vendor\TemplateContract;
use Illuminate\Http\Request;


interface AutoDismantingContract
{
    public function index(Request $request);
}
