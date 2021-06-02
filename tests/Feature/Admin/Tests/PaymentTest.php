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

class PaymentTest extends AdminCase
{
    /** @test */

    public function create_payment_test()
    {
        $response = $this->post("$this->uri/store-payment",[
            'name'               => 'Test Payment',
            'applicable_type'    => 'group',
            'applicable_id'      => 1,
            'due_day'            => 10,
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertStatus(200);
    }

    /** @test */

    public function show_all_payment_test()
    {
        $response = $this->get("$this->uri/get-payments"
        , ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    /** @test */

    public function show_payment_test()
    {
        $response = $this->get("$this->uri/get-payment/" . $this->getTestPayment()
            , ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    /** @test */
    public function update_payment_test()
    {
        $response = $this->post("$this->uri/update-payment/" . $this->getTestPayment(),[
            'applicable_type'    => 'client',
            'applicable_id'      => 1,
            'due_day'            => 11,
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    /** @test */
    public function delete_payment_test()
    {
        $response = $this->delete("$this->uri/delete-payment/" . $this->getTestPayment(),[
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    public function getTestPayment()
    {
        return Payment::whereName('Test Payment')->first()->value('id');
    }
}
