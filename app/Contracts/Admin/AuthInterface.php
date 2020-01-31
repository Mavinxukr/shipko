<?php


namespace App\Contracts\Admin;


use App\Contracts\vendor\FormattedInterface;
use Illuminate\Http\Request;

interface AuthInterface extends FormattedInterface
{

    public function login(Request $request) :object;

    public function logout(Request $request) :object;
}
