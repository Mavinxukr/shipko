<?php

namespace Tests\Feature\Admin\Tests;

use App\Models\Auto\Auto;
use App\Models\Auto\Shipping;
use App\Models\Client\Client;
use Illuminate\Http\UploadedFile;
use Tests\Feature\Admin\AdminCase;
use Tests\TestCase;

class AutoShippingTest extends AdminCase
{
    /** @test */

    public function create_auto_shipping_test()
    {
        $response = $this->post("$this->uri/store-auto-shipping",[
            'auto_id'            => json_encode([Auto::first()->value('id')]),
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertStatus(200);
    }

    /** @test */

    public function get_all_auto_shipping_test()
    {
        $response = $this->get("$this->uri/get-autos-shipping",
            ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();

    }

    /** @test */

    public function get_auto_shipping_by_id_test()
    {
        $auto_id = Auto::first()->value('id');
        $response = $this->get("$this->uri/get-auto-shipping/$auto_id",
            ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    /** @test */

    public function update_auto_shipping_test()
    {
        $auto_id = Auto::first()->value('id');
        $response = $this->post("$this->uri/update-auto-shipping/$auto_id",[
            'status'             => 'in_the_sea',
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertStatus(200);
    }
}
