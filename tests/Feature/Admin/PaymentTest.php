<?php

namespace Tests\Feature\Admin;

use App\Models\Client\Client;
use App\Models\Group\Group;
use App\Models\Part\Part;
use App\Models\Payment\Payment;
use App\Models\Price\Price;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\Feature\TokenContract\TokenContract;
use Tests\TestCase;

class PaymentTest extends TestCase implements TokenContract
{
    protected $uri =  'api-admin';

    /** @test */

    public function create_payment_test()
    {
        $this->withoutExceptionHandling();
        $response = $this->post("$this->uri/store-payment",[
            'name'               => 'Test Payment',
            'applicable_type'    => 'group',
            'applicable_id'      => 1,
            'due_day'            => 10,
        ], ['Authorization' => $this->getToken()]);
        $response->assertStatus(200);
    }

    /** @test */

    public function show_all_payment_test()
    {
        $this->withoutExceptionHandling();
        $response = $this->get("$this->uri/get-payments"
        , ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }

    /** @test */

    public function show_payment_test()
    {
        $this->withoutExceptionHandling();
        $price = Payment::first()->value('id');
        $response = $this->get("$this->uri/get-payment/$price"
            , ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }

    /** @test */
    public function update_payment_test()
    {
        $this->withoutExceptionHandling();
        $price = Payment::first()->value('id');
        $response = $this->post("$this->uri/update-payment/$price",[
            'name'               => 'Test Payment',
            'applicable_type'    => 'client',
            'applicable_id'      => 1,
            'due_day'            => 11,
        ], ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }

    /** @test */
    public function delete_payment_test()
    {
        $this->withoutExceptionHandling();
        $price = Payment::first()->value('id');
        $response = $this->delete("$this->uri/delete-payment/$price",[
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
