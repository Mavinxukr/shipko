<?php


namespace App\Contracts\ContratRepositories\Client;

use Illuminate\Http\Request;

interface NotificationContract
{
    public function index(Request $request);
    public function update(Request $request);
}
