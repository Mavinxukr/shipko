<?php


namespace App\Contracts\ContratRepositories\Admin;

use App\Contracts\vendor\TemplateContract;
use Illuminate\Http\Request;

interface ClientContract extends TemplateContract
{
    public function delete(Request $request);
}
