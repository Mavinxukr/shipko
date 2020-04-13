<?php

namespace Tests\Feature\Client;

use App\Models\Auto\Auto;
use App\Models\Client\Client;
use App\Models\Invoice\Invoice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class InvoiceTest extends TestCase
{
    protected $uri =  'api-client';

    public function getToken(): string
    {
        $user =  [
            'email'     => 'client12@gmail.com',
            'password'  => '111111'
        ];
        $responseLogin = $this->post("$this->uri/login",
            $user)->decodeResponseJson();
        return $responseLogin['data']['data']['auth']['token'];
    }

    /** @test */

    public function get_all_invoice_test()
    {
        $this->withoutExceptionHandling();
        $response = $this->get("$this->uri/get-invoices",
            ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }
}
