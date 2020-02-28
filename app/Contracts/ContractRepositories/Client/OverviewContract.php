<?php


namespace App\Contracts\ContratRepositories\Client;

use Illuminate\Http\Request;

interface OverviewContract
{

    public function index(Request $request) ;

}
