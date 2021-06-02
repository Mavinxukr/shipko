<?php

namespace Tests\Feature\Client;

use Tests\Feature\TokenContract\TokenContract;
use Tests\TestCase;

abstract class ClientCase extends TestCase implements TokenContract
{
    protected $uri = 'api-client';

    public function getToken(): string
    {
        $user =  [
            'email'     => 'client12@gmail.com',
            'password'  => '111111'
        ];
        $responseLogin = $this->post("$this->uri/login",
            $user)->decodeResponseJson();
        return $responseLogin['data']['data']['auth']['token'];
    }
}
