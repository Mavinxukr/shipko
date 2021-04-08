<?php


namespace App\Http\Controllers\ApiClient\Auth;

use App\Contracts\ContractRepositories\Client\AuthContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;


class AuthController extends Controller
{

    private $login;

    public function __construct(AuthContract $login)
    {
        $this->login = $login;
    }

    /**
     * @api {post} client/register  Register Client
     * @apiName Register Client
     * @apiVersion 1.1.1
     * @apiGroup Client Auth
     * @apiParam {String} name Name
     * @apiParam {String} email Email
     * @apiParam {String} password Password
     * @apiParam {String} password_confirmation Password Confirmation
     * @apiSampleRequest  client/register
     */

    public function register(RegisterRequest $request)
    {
        return $this->login->register($request);
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
