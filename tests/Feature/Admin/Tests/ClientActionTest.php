<?php

namespace Tests\Feature\Admin\Tests;

use App\Models\Client\Client;
use Illuminate\Http\UploadedFile;
use Tests\Feature\Admin\AdminCase;
use Tests\Feature\TokenContract\TokenContract;
use Tests\TestCase;

class ClientActionTest extends AdminCase
{
    /** @test */

    public function store_client_test()
    {
        $response = $this->post("$this->uri/store-client",[
            'name'     => 'from_test_user_test',
            'username'  => 'from_test_user_test',
            'phone'  => '+3800000000',
            'email'  => 'from_test_user_test@gmail.com',
            'password'  => bcrypt('11111111'),
            'country'  => 'USA',
            'city'  => 'ANAHEIM',
            'image' => $file = UploadedFile::fake()->image('random.jpg')
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertStatus(200);
    }

    /** @test */

    public function get_all_client_test()
    {
        $response = $this->get("$this->uri/get-clients",
            ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    /** @test */

    public function get_client_by_id()
    {
        $response = $this->get("$this->uri/get-client/" . $this->getTestClient(),
            ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }
    /** @test */

    public function update_client_test()
    {
        $response = $this->post("$this->uri/update-client/" . $this->getTestClient(),[
            'name'     => 'from_test_user_test_update',
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();

    }
    /** @test */

    public function delete_client_test()
    {
        $response = $this->delete("$this->uri/delete-client/" . $this->getTestClient(),[
            ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    public function getTestClient()
    {
        return Client::whereEmail('from_test_user_test@gmail.com')->first()->id;
    }
}
