<?php


namespace App\Contracts\ContratRepositories\Admin;


use App\Contracts\vendor\ClientService\FilterContract;
use App\Contracts\vendor\FormattedContract;
use Illuminate\Http\Request;

interface ClientFilterContract extends FormattedContract
{
    public function generateResponse();
}
