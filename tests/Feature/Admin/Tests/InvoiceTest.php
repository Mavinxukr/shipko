<?php

namespace Tests\Feature\Admin\Tests;

use App\Models\Auto\Auto;
use App\Models\Client\Client;
use App\Models\Invoice\Invoice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\Feature\Admin\AdminCase;
use Tests\TestCase;

class InvoiceTest extends AdminCase
{
    /** @test */

    public function create_invoice_test()
    {
        $auto_id = Auto::first()->value('id');
        $document = [];
        $document[0]['type'] = 'auction';
        $document[0]['file'] = UploadedFile::fake()->image('random.jpg');
        $response = $this->post("$this->uri/store-invoice",[
            'name_car'              => 'Mercedes',
            'auto_id'               => $auto_id,
            'status'                => 'paid',
            'total_price'           => 10000,
            'paid_price'            => 14000,
            'outstanding_price'     => 43000,
            'total_shipping_price'           => 10000,
            'paid_shipping_price'            => 14000,
            'outstanding_shipping_price'     => 43000,
            'status_shipping'       => 'paid',
            'document'              => $document
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertStatus(200);
    }

    /** @test */

    public function get_all_invoice_test()
    {
        $response = $this->get("$this->uri/get-invoices",
            ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();

    }

    /** @test */

    public function get_invoice_by_id_test()
    {
        $response = $this->get("$this->uri/get-invoice/" . $this->getTestInvoice(),
            ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }



    /** @test */
    public function update_invoice_test()
    {
        $auto_id = Auto::first()->value('id');
        $response = $this->post("$this->uri/update-invoice/" . $this->getTestInvoice(),[
            'name_car'              => 'Mercedes',
            'auto_id'               => $auto_id,
            'status'                => 'paid',
            'total_price'           => 10000,
            'paid_price'            => 14000,
            'outstanding_price'     => 43000,
            'total_shipping_price'           => 10000,
            'paid_shipping_price'            => 14000,
            'outstanding_shipping_price'     => 43000,
            'status_shipping'       => 'paid',
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertStatus(200);
    }

    /** @test */

    public function restore_invoice_document_test()
    {
        $document = [];
        $document[0]['type'] = 'auction';
        $document[0]['file'] = UploadedFile::fake()->image('random.jpg');
        $document[1]['type'] = 'new';
        $document[1]['file'] = UploadedFile::fake()->image('random.jpg');
        $response = $this->post("$this->uri/restore-invoice-document/" . $this->getTestInvoice(),[
            'document'  => $document
        ],
            ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();

    }

    /** @test */
    public function delete_invoice_document_test()
    {
        $invoice = Invoice::find($this->getTestInvoice());
        $documents =  implode(',',$invoice->documents()->take(5)->pluck('id')->toArray());
        $response = $this->post("$this->uri/delete-invoice-document/$invoice->id",[
            'ids'  => $documents
        ],
            ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }


    /** @test */
    public function delete_invoice_test()
    {
        $response = $this->delete("$this->uri/delete-invoice/" . $this->getTestInvoice(),[
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();

    }

    public function getTestInvoice()
    {
        return Invoice::where('name_car', 'Mercedes')->first()->id;
    }
}
