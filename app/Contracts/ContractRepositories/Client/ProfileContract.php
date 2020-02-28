<?php


namespace App\Contracts\ContratRepositories\Client;

use Illuminate\Http\Request;

interface ProfileContract
{
    public function index(Request $request);
    public function update(Request $request);
    public function updatePassword(Request $request);
}
