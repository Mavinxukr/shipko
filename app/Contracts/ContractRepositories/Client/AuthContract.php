<?php


namespace App\Contracts\ContratRepositories\Client;

use Illuminate\Http\Request;

interface AuthContract
{

    public function register(Request $request) ;

    public function login(Request $request) ;

    public function logout(Request $request) ;

}
