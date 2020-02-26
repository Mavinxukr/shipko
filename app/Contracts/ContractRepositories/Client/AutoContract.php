<?php


namespace App\Contracts\ContractRepositories\Client;

use Illuminate\Http\Request;


interface AutoContract
{
    public function index(Request $request);
}
