<?php


namespace App\Http\Controllers\ApiClient\Auth;

use App\Contracts\ContratRepositories\Client\AuthContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;


class AuthController extends Controller
{

    private $login;

    public function __construct(AuthContract $login)
    {
        $this->login = $login;
    }

    /**
     * @api {post} client/login  Login Client
     * @apiName Login Client
     * @apiVersion 1.1.1
     * @apiGroup Client Auth
     * @apiParam {String} email Email
     * @apiParam {String} password Password
     * @apiSampleRequest  client/login
     */

    public function login(LoginRequest $request)
    {
        return $this->login->login($request);
    }

    /**
     * @api {post} client/logout  Logout Client
     * @apiName Logout Client
     * @apiVersion 1.1.1
     * @apiGroup Client Auth
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  client/logout
     */

    public function logout(Request $request)
    {
        return $this->login->logout($request);
    }
}
