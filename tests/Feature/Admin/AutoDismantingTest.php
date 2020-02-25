<?php

namespace Tests\Feature\Admin;

use App\Models\Auto\Auto;
use App\Models\Auto\Shipping;
use App\Models\Client\Client;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AutoDismantingTest extends TestCase
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
        return $responseLogin['data']['auth']['token'];
    }

    /** @test */

    public function get_all_auto_dismanting_test()
    {
        $this->withoutExceptionHandling();
        $response = $this->get("$this->uri/get-autos-dismanting",
            ['Authorization' => $this->getToken()]);
        $response->assertOk();

    }

    /** @test */

    public function get_auto_dismanting_by_id_test()
    {
        $auto_id = Auto::first()->value('id');
        $this->withoutExceptionHandling();
        $response = $this->get("$this->uri/get-auto-dismanting/$auto_id",
            ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }

    /** @test */

    public function update_auto_dismanting_test()
    {
        $auto_id = Auto::first()->value('id');
        $this->withoutExceptionHandling();
        $response = $this->post("$this->uri/update-auto-dismanting/$auto_id",[
            'disassembly'             => 1,
        ], ['Authorization' => $this->getToken()]);
        $response->assertStatus(200);
    }
}
