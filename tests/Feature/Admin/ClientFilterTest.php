<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\TokenContract\TokenContract;
use Tests\TestCase;

class ClientFilterTest extends TestCase implements TokenContract
{
    protected $uri =  'api-admin';
    private  $user =  [
        'email'     => 'admin@gmail.com',
        'password'  => '111111'
    ];
    /** @test */
    public function get_client_by_filters()
    {
        $this->withoutExceptionHandling();
        $response = $this->get("$this->uri/get-clients-by-filters",
            ['Authorization' => $this->getToken($this->user)]);
        $response->assertOk();
    }

    public function getToken(array $user): string
    {
        $responseLogin = $this->post("$this->uri/login",
            $user)->decodeResponseJson();
        $token = $responseLogin['data']['auth']['token'];
        return $token;
    }

}
