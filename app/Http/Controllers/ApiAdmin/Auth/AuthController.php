<?php


namespace App\Http\Controllers\ApiAdmin\Auth;

use App\Contracts\ContratRepositories\Admin\AuthContract;
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
     * @api {post} admin/login  Login User
     * @apiName Login User
     * @apiVersion 1.1.1
     * @apiGroup Admin Auth
     * @apiParam {String} email Email
     * @apiParam {String} password Password
     * @apiSampleRequest  admin/login
     */

    public function login(LoginRequest $request)
    {
       return $this->login->login($request);
    }

    /**
     * @api {post} admin/logout  Logout User
     * @apiName Logout User
     * @apiVersion 1.1.1
     * @apiGroup Admin Auth
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  admin/logout
     */

    public function logout(Request $request)
    {
        return $this->login->logout($request);
    }
}
