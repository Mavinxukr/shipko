<?php

namespace Tests\Feature\Client\Tests;

use App\Models\Auto\Auto;
use Tests\Feature\Client\ClientCase;

class AutoTest extends ClientCase
{
    /** @test */

    public function get_all_auto_test()
    {
        $response = $this->get("$this->uri/get-autos",
            ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();

    }

    /** @test */

    public function get_auto_by_id_test()
    {
        $auto_id = Auto::first()->value('id');
        $response = $this->get("$this->uri/get-auto/$auto_id",
            ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }
}
