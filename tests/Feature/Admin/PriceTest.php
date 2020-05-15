<?php

namespace Tests\Feature\Admin;

use App\Models\Client\Client;
use App\Models\Group\Group;
use App\Models\Part\Part;
use App\Models\Price\Price;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\Feature\TokenContract\TokenContract;
use Tests\TestCase;

class PriceTest extends TestCase implements TokenContract
{
    protected $uri =  'api-admin';

    /** @test */

    public function create_price_test()
    {
        $this->withoutExceptionHandling();
        $response = $this->post("$this->uri/store-price",[
            'name'              => 'Test Price',
            'price'             => 100,
            'priceable_type'    => 'group',
            'priceable_id'      => 1,
            'cities'            => '1,2,3,4',
            'due_day'           => Carbon::now(),
        ], ['Authorization' => $this->getToken()]);
        $response->assertStatus(201);
    }

    /** @test */

    public function show_all_price_test()
    {
        $this->withoutExceptionHandling();
        $response = $this->get("$this->uri/get-prices"
        , ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }

    /** @test */

    public function show_price_test()
    {
        $this->withoutExceptionHandling();
        $price = Price::first()->value('id');
        $response = $this->get("$this->uri/get-price/$price"
            , ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }

    /** @test */
    public function update_price_test()
    {
        $this->withoutExceptionHandling();
        $price = Price::first()->value('id');
        $response = $this->post("$this->uri/update-price/$price",[
            'name'              => 'Test Group Update',
            'price'             => 1000,
            'priceable_type'    => 'client',
            'priceable_id'      => Client::first()->value('id'),
            'cities'            => '1,2',
            'due_day'           => Carbon::now(),
        ], ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }

    /** @test */
    public function delete_price_test()
    {
        $this->withoutExceptionHandling();
        $price = Price::first()->value('id');
        $response = $this->delete("$this->uri/delete-price/$price",[
        ], ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }

    public function getToken(): string
    {
        $user =  [
            'email'     => 'admin@gmail.com',
            'password'  => '111111'
        ];
        $responseLogin = $this->post("$this->uri/login",
            $user)->decodeResponseJson();
        return $responseLogin['data']['data']['auth']['token'];
    }
}
