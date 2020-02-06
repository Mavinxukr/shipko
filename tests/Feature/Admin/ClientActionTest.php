<?php

namespace Tests\Feature\Admin;

use App\Models\Client\Client;
use Illuminate\Http\UploadedFile;
use Tests\Feature\TokenContract\TokenContract;
use Tests\TestCase;

class ClientActionTest extends TestCase implements TokenContract
{
    protected $uri =  'api-admin';
    private  $user =  [
        'email'     => 'admin@gmail.com',
        'password'  => '111111'
    ];

    /** @test */
    public function store_client_test()
    {
        $this->withoutExceptionHandling();
        $response = $this->post("$this->uri/store-client",[
            'name'     => 'user_test',
            'username'  => 'create_user_test',
            'phone'  => '380000000000',
            'email'  => 'test@gmail.com',
            'password'  => bcrypt('111111'),
            'country'  => 'USA',
            'city'  => 'Miami',
            'zip'  => '12345',
            'address'  => 'beach street 123',
            'card_number'  => '1234-1234-1234-1311',
            'image' => $file = UploadedFile::fake()->image('random.jpg')
        ], ['Authorization' => $this->getToken($this->user)]);
        $this->assertCount(1, Client::all());
        $response->assertStatus(201);
    }

    /** @test */

    public function get_all_client_test()
    {
        $this->withoutExceptionHandling();
        $response = $this->get("$this->uri/get-clients",
            ['Authorization' => $this->getToken($this->user)]);
        $this->assertCount(1, Client::all());
        $response->assertOk();


    }

    /** @test */
    public function get_client_by_id()
    {
        $client_id  = Client::first()->value('id');
        $this->withoutExceptionHandling();
        $response = $this->get("$this->uri/get-client/$client_id",
            ['Authorization' => $this->getToken($this->user)]);
        $this->assertCount(1, Client::all());
        $response->assertOk();
    }
    /** @test */
    public function update_client_test()
    {
        $client_id  = Client::first()->value('id');
        $this->withoutExceptionHandling();
        $response = $this->post("$this->uri/update-client/$client_id",[
            'name'     => 'user_test_update',
            'phone'  => '380000000111',
            'email'  => 'test_update@gmail.com',
            'country'  => 'USA',
            'city'  => 'Miami',
            'zip'  => '12345',
            'address'  => 'beach street 123',
            'card_number'  => '1234-1234-0000-1311',
        ], ['Authorization' => $this->getToken($this->user)]);
        $this->assertCount(1, Client::all());
        $response->assertOk();

    }
    /** @test */
    public function delete_client_test()
    {
        $this->withoutExceptionHandling();
        $client_id  = Client::first()->value('id');

        $response = $this->delete("$this->uri/delete-client/$client_id",[
            ], ['Authorization' => $this->getToken($this->user)]);

        $this->assertCount(0, Client::all());
        $response->assertOk();
    }

    public function getToken( array $user) :string
    {
        $responseLogin = $this->post("$this->uri/login",
            $user)->decodeResponseJson();
        $token = $responseLogin['data']['auth']['token'];
        return $token;
    }
}
