<?php


namespace App\Contracts\ContratRepositories\Admin;

use Illuminate\Http\Request;

interface AutoNoteContract
{
    public function store(Request $request);
}
