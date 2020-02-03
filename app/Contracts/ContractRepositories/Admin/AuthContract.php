<?php


namespace App\Contracts\ContratRepositories\Admin;


use App\Contracts\vendor\FormattedContract;
use Illuminate\Http\Request;

interface AuthContract extends FormattedContract
{

    public function login(Request $request) ;

    public function logout(Request $request) :object;
}
