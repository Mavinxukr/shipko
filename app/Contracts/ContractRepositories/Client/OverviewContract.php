<?php


namespace App\Contracts\ContractRepositories\Client;

use Illuminate\Http\Request;

interface OverviewContract
{

    public function index(Request $request) ;

}
