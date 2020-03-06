<?php

namespace Tests\Feature\Client;

use Tests\Feature\TokenContract\TokenContract;
use Tests\TestCase;

class NotificationTest extends TestCase implements TokenContract
{
    protected $uri =  'api-client';

    /** @test */

    public function get_notifications()
    {
        $this->withoutExceptionHandling();
        $response = $this->get("$this->uri/notifications",
            ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }

    /** @test */

    public function update_profile_test()
    {
        $response = $this->post("$this->uri/notifications",[
            'id' => json_encode(["1", "3"]),
        ], ['Authorization' => $this->getToken()]);

        $this->withoutExceptionHandling();
        $response->assertOk();

    }

    public function getToken() :string
    {
        $user =  [
            'email'     => 'client12@gmail.com',
            'password'  => '111111'
        ];
        $responseLogin = $this->post("$this->uri/login",
            $user)->decodeResponseJson();
        $token = $responseLogin['data']['auth']['token'];
        return $token;
    }
}
