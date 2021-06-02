<?php


namespace App\Contracts\ContractRepositories\Admin;


use App\Contracts\vendor\ClientService\FilterContract;
use App\Contracts\vendor\FormattedContract;
use Illuminate\Http\Request;

interface ClientFilterContract
{
    public function generateResponse();
}
