<?php

namespace Tests\Feature\Client;
use Tests\TestCase;

class ClientActionTest extends TestCase
{
    protected $uri = 'api-client';

    /** @test */

    public function client_login_test()
    {
        $this->withoutExceptionHandling();
        $response = $this->post("/$this->uri/login", [
            'email' => 'client12@gmail.com',
            'password' => '111111'
        ]);
        $response->assertOk();
    }

    /** @test */

    public function client_logout_test()
    {
        $this->withoutExceptionHandling();
        $responseLogin = $this->post("/$this->uri/login",[
            'email'     => 'client12@gmail.com',
            'password'  => '111111'
        ])->decodeResponseJson();
        $token = $responseLogin['data']['auth']['token'];
        $responseLogout = $this->post("$this->uri/logout",[],['Authorization' => $token]);
        $responseLogout->assertOk();
    }
}
