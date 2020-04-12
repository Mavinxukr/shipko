<?php

namespace Tests\Feature\Client;

use Tests\Feature\TokenContract\TokenContract;
use Tests\TestCase;

class ProfileTest extends TestCase implements TokenContract
{
    protected $uri =  'api-client';

    /** @test */

    public function get_profile()
    {
        $this->withoutExceptionHandling();
        $response = $this->get("$this->uri/get-profile",
            ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }

    /** @test */

    public function update_profile_test()
    {
        $token = $this->getToken();

        $response = $this->post("$this->uri/update-profile",[
            'name'     => 'from_test_user_test_update',
            'username' => 'from_test_user_test_update',
            'phone'  => '+3-8000-000-00-00',
            'email'  => 'from_test_user_test_update@gmail.com',
            'country'  => 'USA',
            'city'  => 'Miami',
            'zip'  => '12345',
            'address'  => 'beach street 123',
            'card_number'  => '1234-1234-0000-1311',
            'old_password'          => '111111',
            'password'              => '11111111',
            'password_confirmation' => '11111111',
        ], ['Authorization' => $token]);

        $response = $this->post("$this->uri/update-profile",[
            'email'  => 'client12@gmail.com'
        ], ['Authorization' => $token]);

        $response = $this->post("$this->uri/update-profile",[
            'old_password'          => '11111111',
            'password'              => '111111',
            'password_confirmation' => '111111',
        ], ['Authorization' => $token]);

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
        $token = $responseLogin['data']['data']['auth']['token'];
        return $token;
    }
}
