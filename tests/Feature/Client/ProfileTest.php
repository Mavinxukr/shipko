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
        $response = $this->post("$this->uri/update-profile",[
            'name'     => 'from_test_user_test_update',
            'phone'  => '380000000111',
            'email'  => 'from_test_user_test_update@gmail.com',
            'country'  => 'USA',
            'city'  => 'Miami',
            'zip'  => '12345',
            'address'  => 'beach street 123',
            'card_number'  => '1234-1234-0000-1311',
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();

    }
    /** @test */

    public function update_profile_password_test()
    {
        $response = $this->post("$this->uri/update-profile-password",[
            'old_password'          => '111111',
            'password'              => '11111111',
            'password_confirmation' => '11111111',
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
