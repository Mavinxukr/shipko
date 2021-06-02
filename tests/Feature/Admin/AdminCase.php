<?php

namespace Tests\Feature\Admin;

use Tests\Feature\TokenContract\TokenContract;
use Tests\TestCase;

abstract class AdminCase extends TestCase implements TokenContract
{
    protected $uri =  'api-admin';

    public function getToken(): string
    {
        $user =  [
            'email'     => 'admin@gmail.com',
            'password'  => '111111'
        ];
        $responseLogin = $this->post("$this->uri/login",
            $user)->decodeResponseJson();
        return $responseLogin['data']['data']['auth']['token'];
    }
}
