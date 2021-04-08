<?php

namespace App\Repositories\Client;

use App\Contracts\ContractRepositories\Client\AuthContract;
use App\Http\Resources\AuthResource;
use App\Models\Client\Client;
use App\Traits\FormattedJsonResponse;
use Illuminate\Http\Request;

class AuthRepository implements AuthContract
{
    use FormattedJsonResponse;

    public function register(Request $request)
    {
        $client = Client::create($request->except('password') + [
            'password' => bcrypt($request->password),
            ]);
        \Auth::login($client);

        return $this->response('Register success',200,
            new AuthResource(\Auth::user()));
    }

    public function login(Request $request)
    {
        $client = Client::where('email', $request->email)->first();
        if($client)
            $checkPass = $client->checkPassword($request->password);
        if(!$client || !$checkPass)
            return $this->response('Unauthorized',401,null);

        \Auth::login($client);

        return $this->response('Login success',200,
            new AuthResource(\Auth::user()));
    }

    public function logout(Request $request)
    {
        $request->user('client')->token()->revoke();
        return $this->response('Logout success',200, null);
    }

    public function response( string $message, int $statusCode, $data = null)
    {
        return $this->toJson($message,$statusCode,$data);
    }
}
