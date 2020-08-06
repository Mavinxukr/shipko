<?php

namespace Tests\Feature\Admin\Tests;

use App\Models\Auto\Auto;
use Tests\Feature\Admin\AdminCase;

class AutoDismantingTest extends AdminCase
{
    /** @test */

    public function get_all_auto_dismanting_test()
    {
        $response = $this->get("$this->uri/get-autos-dismanting",
            ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();

    }

    /** @test */

    public function get_auto_dismanting_by_id_test()
    {
        $auto_id = Auto::first()->value('id');
        $response = $this->get("$this->uri/get-auto-dismanting/$auto_id",
            ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    /** @test */

    public function update_auto_dismanting_test()
    {
        $auto_id = Auto::first()->value('id');
        $response = $this->post("$this->uri/update-auto-dismanting/$auto_id",[
            'disassembly'             => 1,
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertStatus(200);
    }
}
