<?php

namespace Tests\Feature\Admin;

use App\Models\Auto\Auto;
use App\Models\Auto\Shipping;
use App\Models\Client\Client;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AutoShippingTest extends TestCase
{
    protected $uri =  'api-admin';

    public function getToken(): string
    {
        $user =  [
            'email'     => 'admin@gmail.com',
            'password'  => '111111'
        ];
        $responseLogin = $this->post("$this->uri/login",
            $user)->decodeResponseJson();
        return $responseLogin['data']['data']['auth']['token'];
    }

    /** @test */

    public function create_auto_shipping_test()
    {
        $this->withoutExceptionHandling();
        $response = $this->post("$this->uri/store-auto-shipping",[
            'auto_id'            => json_encode([Auto::first()->value('id')]),
        ], ['Authorization' => $this->getToken()]);
        $response->assertStatus(201);
    }

    /** @test */

    public function get_all_auto_shipping_test()
    {
        $this->withoutExceptionHandling();
        $response = $this->get("$this->uri/get-autos-shipping",
            ['Authorization' => $this->getToken()]);
        $response->assertOk();

    }

    /** @test */

    public function get_auto_shipping_by_id_test()
    {
        $auto_id = Auto::first()->value('id');
        $this->withoutExceptionHandling();
        $response = $this->get("$this->uri/get-auto-shipping/$auto_id",
            ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }

    /** @test */

    public function update_auto_shipping_test()
    {
        $auto_id = Auto::first()->value('id');
        $this->withoutExceptionHandling();
        $response = $this->post("$this->uri/update-auto-shipping/$auto_id",[
            'status'             => 'at_unloading',
        ], ['Authorization' => $this->getToken()]);
        $response->assertStatus(200);
    }
}
