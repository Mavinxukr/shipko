<?php

namespace Tests\Feature\Admin\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Admin\AdminCase;
use Tests\Feature\TokenContract\TokenContract;
use Tests\TestCase;

class ClientFilterTest extends AdminCase
{
    /** @test */

    public function get_client_by_filters()
    {
        $response = $this->get("$this->uri/get-clients-by-filters",
            ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }
}
