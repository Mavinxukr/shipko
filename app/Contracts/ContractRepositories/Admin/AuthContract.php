<?php


namespace App\Contracts\ContratRepositories\Admin;

use Illuminate\Http\Request;

interface AuthContract
{

    public function login(Request $request) ;

    public function logout(Request $request) ;

}
