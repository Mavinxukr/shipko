<?php

namespace Tests\Feature\Client\Tests;

use Carbon\Carbon;
use Tests\Feature\Client\ClientCase;

class ClientActionTest extends ClientCase
{
    /** @test */

    public function client_register_test()
    {
        $time = Carbon::now()->getTimestamp();
        $response = $this->post("/$this->uri/register", [
            'name' => 'test_client'.$time,
            'email' => 'test_client'.$time.'@gmail.com',
            'password' => '11111111',
            'password_confirmation' => '11111111'
        ]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    /** @test */

    public function client_login_test()
    {
        $response = $this->post("/$this->uri/login", [
            'email' => 'client12@gmail.com',
            'password' => '111111'
        ]);
        $response->assertOk();
    }

    /** @test */

    public function client_logout_test()
    {
        $responseLogin = $this->post("/$this->uri/login",[
            'email'     => 'client12@gmail.com',
            'password'  => '111111'
        ])->decodeResponseJson();
        $token = $responseLogin['data']['data']['auth']['token'];
        $responseLogout = $this->post("$this->uri/logout",[],['Authorization' => $token]);
        $this->withoutExceptionHandling();
        $responseLogout->assertOk();
    }

    /** @test */

    public function client_overview_page_test()
    {
        $response = $this->get("/$this->uri/overview",
            ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }
}
