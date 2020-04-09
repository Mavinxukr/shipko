<?php


namespace App\Contracts\ContratRepositories\Client;

use Illuminate\Http\Request;

interface AutoNoteContract
{
    public function store(Request $request);
}
