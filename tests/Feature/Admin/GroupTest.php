<?php

namespace Tests\Feature\Admin;

use App\Models\Client\Client;
use App\Models\Group\Group;
use App\Models\Part\Part;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\Feature\TokenContract\TokenContract;
use Tests\TestCase;

class GroupTest extends TestCase implements TokenContract
{
    protected $uri =  'api-admin';

    /** @test */

    public function create_group_test()
    {
        $this->withoutExceptionHandling();
        $response = $this->post("$this->uri/store-group",[
            'name'      => 'Test Group',
            'price'     => 100,
            'clients'   => '1,2,3,4'
        ], ['Authorization' => $this->getToken()]);
        $response->assertStatus(200);
    }

    /** @test */

    public function show_all_group_test()
    {
        $this->withoutExceptionHandling();
        $response = $this->get("$this->uri/get-groups"
        , ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }

    /** @test */

    public function show_group_test()
    {
        $this->withoutExceptionHandling();
        $group = Group::first()->value('id');
        $response = $this->get("$this->uri/get-group/$group"
            , ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }

    /** @test */
    public function update_group_test()
    {
        $this->withoutExceptionHandling();
        $group = Group::first()->value('id');
        $response = $this->post("$this->uri/update-group/$group",[
            'name'      => 'Test Group Update',
            'price'     => 1000,
            'clients'   => '1,2,4'
        ], ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }

    /** @test */
    public function delete_group_test()
    {
        $this->withoutExceptionHandling();
        $group = Group::first()->value('id');
        $response = $this->delete("$this->uri/delete-group/$group",[
        ], ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }

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
}
