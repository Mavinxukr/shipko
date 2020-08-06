<?php

namespace Tests\Feature\Admin\Tests;

use App\Models\Client\Client;
use App\Models\Group\Group;
use App\Models\Part\Part;
use App\Models\Payment\Payment;
use App\Models\Price\Price;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\Feature\Admin\AdminCase;
use Tests\Feature\TokenContract\TokenContract;
use Tests\TestCase;

class PriceTest extends AdminCase
{
    /** @test */

    public function create_price_test()
    {
        $response = $this->post("$this->uri/store-price",[
            'name'              => 'Test Price',
            'priceable_type'    => 'group',
            'priceable_id'      => 1,
            'dependency'        => 'c=1,p=110;c=2,p=210',
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertStatus(200);
    }

    /** @test */

    public function show_all_price_test()
    {
        $response = $this->get("$this->uri/get-prices"
        , ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    /** @test */

    public function show_price_test()
    {
        $response = $this->get("$this->uri/get-price/" . $this->getTestPrice()
            , ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    /** @test */
    public function update_price_test()
    {
        $response = $this->post("$this->uri/update-price/" . $this->getTestPrice(),[
            'priceable_type'    => 'client',
            'priceable_id'      => Client::first()->value('id'),
            'dependency'        => 'c=1,p=100;c=2,p=200',
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    /** @test */
    public function delete_price_test()
    {
        $response = $this->delete("$this->uri/delete-price/" . $this->getTestPrice(),[
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    public function getTestPrice()
    {
        return Price::whereName('Test Price')->first()->value('id');
    }
}
