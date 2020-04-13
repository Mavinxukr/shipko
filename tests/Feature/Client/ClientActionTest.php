<?php

namespace Tests\Feature\Client;
use Tests\TestCase;

class ClientActionTest extends TestCase
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

    /** @test */

    public function client_register_test()
    {
        $this->withoutExceptionHandling();
        $response = $this->post("/$this->uri/register", [
            'name' => 'test_client',
            'email' => 'test_client@gmail.com',
            'password' => '111111',
            'password_confirmation' => '111111'
        ]);
        $response->assertOk();
    }

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
        $token = $responseLogin['data']['data']['auth']['token'];
        $responseLogout = $this->post("$this->uri/logout",[],['Authorization' => $token]);
        $responseLogout->assertOk();
    }

    /** @test */

    public function client_overview_page_test()
    {
        $this->withoutExceptionHandling();
        $response = $this->get("/$this->uri/overview",
            ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }
}
