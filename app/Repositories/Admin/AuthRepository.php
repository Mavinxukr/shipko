<?php


namespace App\Repositories\Admin;

use App\Contracts\ContratRepositories\Admin\AuthContract;
use App\Http\Resources\AuthResource;
use App\Traits\FormattedJsonResponse;
use Illuminate\Http\Request;

class AuthRepository implements AuthContract
{
    use FormattedJsonResponse;

    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);
        if(!\Auth::attempt($credentials))
            return $this->response('Unauthorized',401,null);

        return $this->response('Login success',200,
                                new AuthResource($request->user()));
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return $this->response('Logout success',200, null);
    }

    public function response( string $message, int $statusCode, $data = null)
    {
        return $this->toJson($message,$statusCode,$data);
    }


}
