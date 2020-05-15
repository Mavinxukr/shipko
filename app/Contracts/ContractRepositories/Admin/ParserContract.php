<?php


namespace App\Contracts\ContractRepositories\Admin;

use App\Contracts\vendor\TemplateContract;
use Illuminate\Http\Request;


interface ParserContract
{
   public function index(Request $request, string $table);
}
