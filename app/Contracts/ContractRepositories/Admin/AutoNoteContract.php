<?php


namespace App\Contracts\ContractRepositories\Admin;

use Illuminate\Http\Request;

interface AutoNoteContract
{
    public function store(Request $request);
}
