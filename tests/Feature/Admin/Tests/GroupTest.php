<?php

namespace Tests\Feature\Admin\Tests;

use App\Models\Client\Client;
use App\Models\Group\Group;
use App\Models\Part\Part;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\Feature\Admin\AdminCase;
use Tests\Feature\TokenContract\TokenContract;
use Tests\TestCase;

class GroupTest extends AdminCase
{
    /** @test */

    public function create_group_test()
    {
        $response = $this->post("$this->uri/store-group",[
            'name'      => 'Test Group',
            'price'     => 100,
            'clients'   => '1,2,3,4'
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertStatus(200);
    }

    /** @test */

    public function show_all_group_test()
    {
        $response = $this->get("$this->uri/get-groups"
        , ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    /** @test */

    public function show_group_test()
    {
        $response = $this->get("$this->uri/get-group/" . $this->getTestGroup()
            , ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    /** @test */
    public function update_group_test()
    {
        $response = $this->post("$this->uri/update-group/" . $this->getTestGroup(),[
            'name'      => 'Test Group',
            'price'     => 1000,
            'clients'   => '1,2,4'
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    /** @test */
    public function delete_group_test()
    {
        $response = $this->delete("$this->uri/delete-group/" . $this->getTestGroup(),[
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    public function getTestGroup()
    {
        return Group::whereName('Test Group')->first()->value('id');
    }
}
