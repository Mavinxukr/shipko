<?php

namespace Tests\Feature\Admin\Tests;

use Tests\Feature\Admin\AdminCase;

class AdminActionTest extends AdminCase
{
    /** @test */

    public function admin_login_test()
    {
        $response = $this->post("/$this->uri/login",[
            'email'     => 'admin@gmail.com',
            'password'  => '111111'
        ]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    /** @test */

    public function admin_logout_test()
    {

        $responseLogin = $this->post("/$this->uri/login",[
            'email'     => 'admin@gmail.com',
            'password'  => '111111'
        ])->decodeResponseJson();
        $token = $responseLogin['data']['data']['auth']['token'];
        $responseLogout = $this->post("$this->uri/logout",[],['Authorization' => $token]);
        $this->withoutExceptionHandling();
        $responseLogout->assertOk();
    }
}
