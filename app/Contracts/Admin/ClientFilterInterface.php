<?php


namespace App\Contracts\Admin;


use App\Contracts\vendor\ClientService\FilterInterface;
use App\Contracts\vendor\FormattedInterface;
use Illuminate\Http\Request;

interface ClientFilterInterface extends FilterInterface , FormattedInterface
{
    public function generateResponse(Request $request);
}
