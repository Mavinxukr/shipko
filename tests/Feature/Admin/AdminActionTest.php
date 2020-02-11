<?php

namespace Tests\Feature\Admin;
use Tests\TestCase;

class AdminActionTest extends TestCase
{
    protected $uri =  'api-admin';

    /** @test */

    public function admin_login_test()
    {
        $this->withoutExceptionHandling();
        $response = $this->post("/$this->uri/login",[
            'email'     => 'admin@gmail.com',
            'password'  => '111111'
        ]);
        $response->assertOk();
    }

    /** @test */

    public function admin_logout_test()
    {
        $this->withoutExceptionHandling();
        $responseLogin = $this->post("/$this->uri/login",[
            'email'     => 'admin@gmail.com',
            'password'  => '111111'
        ])->decodeResponseJson();
        $token = $responseLogin['data']['auth']['token'];
        $responseLogout = $this->post("$this->uri/logout",[],['Authorization' => $token]);
        $responseLogout->assertOk();
    }
}
