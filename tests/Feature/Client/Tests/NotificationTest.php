<?php

namespace Tests\Feature\Client\Tests;

use Tests\Feature\Client\ClientCase;

class NotificationTest extends ClientCase
{
    /** @test */

    public function get_notifications()
    {
        $response = $this->get("$this->uri/notifications",
            ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    /** @test */

    public function update_profile_test()
    {
        $response = $this->post("$this->uri/notifications",[
            'id' => json_encode(["1", "3"]),
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();

    }
}
