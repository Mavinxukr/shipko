<?php

namespace Tests\Feature\Client;

use App\Models\Auto\Auto;
use App\Models\Client\Client;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AutoTest extends TestCase
{
    protected $uri =  'api-client';

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

    public function get_all_auto_test()
    {
        $this->withoutExceptionHandling();
        $response = $this->get("$this->uri/get-autos",
            ['Authorization' => $this->getToken()]);
        $response->assertOk();

    }

    /** @test */

    public function get_auto_by_id_test()
    {
        $auto_id = Auto::first()->value('id');
        $this->withoutExceptionHandling();
        $response = $this->get("$this->uri/get-auto/$auto_id",
            ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }
}
