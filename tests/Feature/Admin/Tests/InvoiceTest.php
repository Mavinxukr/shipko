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

    /*public function create_invoice_test()
    {
        $auto_id = Auto::first()->value('id');
        $document = [];
        $document[0]['type'] = 'auction';
        $document[0]['file'] = UploadedFile::fake()->image('random.jpg');
        $response = $this->post("$this->uri/store-invoice",[
            'name_car'              => 'Mercedes',
            'auto_id'               => $auto_id,
            'status'                => 'new',
            'total_price'           => 10000,
            'paid_price'            => 14000,
            'outstanding_price'     => 43000,
            'total_shipping_price'           => 10000,
            'paid_shipping_price'            => 14000,
            'outstanding_shipping_price'     => 43000,
            'status_shipping'       => 'unpaid',
            'document'              => $document
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertStatus(200);
    }*/

    /** @test */

    public function get_all_invoice_test()
    {

        $response = $this->get("$this->uri/get-invoices",
            ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();

    }

    /** @test */

    /*public function get_invoice_by_id_test()
    {
        $invoice_id = Invoice::first()->value('id');
        $this->withoutExceptionHandling();
        $response = $this->get("$this->uri/get-invoice/$invoice_id",
            ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }*/



    /** @test */
    /*public function update_invoice_test()
    {
        $auto_id = Auto::first()->value('id');
        $invoice_id = Invoice::first()->value('id');
        $this->withoutExceptionHandling();
        $response = $this->post("$this->uri/update-invoice/$invoice_id",[
            'name_car'              => 'Mercedes',
            'auto_id'               => $auto_id,
            'status'                => 'new',
            'total_price'           => 10000,
            'paid_price'            => 14000,
            'outstanding_price'     => 43000,
            'total_shipping_price'           => 10000,
            'paid_shipping_price'            => 14000,
            'outstanding_shipping_price'     => 43000,
            'status_shipping'       => 'unpaid',
        ], ['Authorization' => $this->getToken()]);
        $response->assertStatus(200);
    }*/

    /** @test */

    /*public function restore_invoice_document_test()
    {
        $document = [];
        $document[0]['type'] = 'auction';
        $document[0]['file'] = UploadedFile::fake()->image('random.jpg');
        $document[1]['type'] = 'new';
        $document[1]['file'] = UploadedFile::fake()->image('random.jpg');
        $invoice_id = Invoice::first()->value('id');
        $this->withoutExceptionHandling();
        $response = $this->post("$this->uri/restore-invoice-document/$invoice_id",[
            'document'  => $document
        ],
            ['Authorization' => $this->getToken()]);
        $response->assertOk();

    }*/

    /** @test */
    /*public function delete_invoice_document_test()
    {
        $invoice = Invoice::first();
        $documents =  implode(',',$invoice->documents()->take(5)->pluck('id')->toArray());
        $this->withoutExceptionHandling();
        $response = $this->post("$this->uri/delete-invoice-document/$invoice->id",[
            'ids'  => $documents
        ],
            ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }*/


    /** @test */
    /*public function delete_invoice_test()
    {
        $this->withoutExceptionHandling();
        $invoice_id = Invoice::first()->value('id');
        $response = $this->delete("$this->uri/delete-invoice/$invoice_id",[
        ], ['Authorization' => $this->getToken()]);
        $response->assertOk();

    }*/
}
