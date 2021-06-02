<?php


namespace App\Contracts\ContractRepositories\Client;


use Illuminate\Http\Request;

interface ProfileContract
{
    public function index(Request $request);
    public function update(Request $request);
    //public function updatePassword(Request $request);
}
