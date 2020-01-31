<?php


namespace App\Repository\Admin;

use App\Contracts\Admin\AuthInterface;
use App\Http\Resources\AuthResource;
use App\Traits\FormattedJsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthInterface
{
    use FormattedJsonResponse;

    public function login(Request $request) :object
    {
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return $this->response('Unauthorized',401,false,null);

        return $this->response('Login success',200,
                                true,new AuthResource($request->user()));
    }

    public function logout(Request $request): object
    {
        $request->user()->token()->revoke();
        return $this->response('Logout success',200,
            true, null);
    }


    public function response( string $message, int $statusCode, bool $statusBool, $data = null)
    {
        return $this->toJson($message,$statusCode,$statusBool,$data);
    }

}
