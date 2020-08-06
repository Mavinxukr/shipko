<?php

namespace Tests\Feature\Client\Tests;

use Tests\Feature\Client\ClientCase;

class ProfileTest extends ClientCase
{
    /** @test */

    public function get_profile()
    {
        $this->withoutExceptionHandling();
        $response = $this->get("$this->uri/get-profile",
            ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
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
}
