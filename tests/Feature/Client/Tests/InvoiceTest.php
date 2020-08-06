<?php

namespace Tests\Feature\Client\Tests;

use Tests\Feature\Client\ClientCase;

class InvoiceTest extends ClientCase
{
    /** @test */

    public function get_all_invoice_test()
    {
        $response = $this->get("$this->uri/get-invoices",
            ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }
}
