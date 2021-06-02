<?php


namespace App\Contracts\ContractRepositories\Client;

use Illuminate\Http\Request;

interface AutoNoteContract
{
    public function store(Request $request);
}
