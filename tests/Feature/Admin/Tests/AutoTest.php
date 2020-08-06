<?php

namespace Tests\Feature\Admin\Tests;

use App\Models\Auto\Auto;
use App\Models\Client\Client;
use Illuminate\Http\UploadedFile;
use Tests\Feature\Admin\AdminCase;
use Tests\TestCase;

class AutoTest extends AdminCase
{
    /** @test */

    public function create_auto_test()
    {
        $document = [];
        $document[0]['type'] = 'auction';
        $document[0]['file'] = UploadedFile::fake()->image('random.jpg');

        $response = $this->post("$this->uri/store-auto",[
            'year'                  => '2001',
            'make_name'             => 'Mercedes',
            'model_name'            => '123455HH998',
            'client_id'             => 1,
            'status'                => "dispatched",
            'auction'               => 'auction',
            'purchased_date'        => '2020-12-12',
            'offsite'               => 0,
            'ship'                  => 1,
            'tracking_id'           => '777-3333-111FJ',
            'container_id'          => '#8899-UI-00',
            'point_load_city'       => 'New York',
            'point_load_date'       => '2020-02-25',
            'point_delivery_city'   => 'Odessa',
            'point_delivery_date'   => '2020-06-25',
            'disassembly'           => 0,
            'lot'                   => 1,
            'doc_type'              => 'TIR',
            'odometer'              => '143000m',
            'highlight'             => 'highlight',
            'pri_damage'            => 'front,side',
            'sec_damage'            => 'rear',
            'ret_value'             => '26999$',
            'vin_code'              => '123455HH998',
            'sale'                  => 1,
            'location'              => 'New York',
            'grid_item'             => 'item',
            'sale_name'             => 'MetLife',
            'ret_date'              => '2020-02-25',
            'feature'               => 1,
            'body_style'            => 'sedan',
            'color'                 => 'white',
            'eng_type'              => 'front',
            'cylinder'              => '5',
            'trans'                 => 'automatic',
            'drive'                 => 'yes',
            'fuel'                  => 'gas',
            'key'                   => 'yes',
            'note'                  => 'good car',
            'document'              => $document
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertStatus(200);
    }

    /** @test */

    public function get_all_auto_test()
    {
        $response = $this->get("$this->uri/get-autos",
            ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();

    }

    /** @test */

    public function get_auto_by_id_test()
    {
        $response = $this->get("$this->uri/get-auto/" . $this->getTestAuto(),
            ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    /** @test */

    public function update_auto_test()
    {
        $response = $this->post("$this->uri/update-auto/" . $this->getTestAuto(),[
            'year'                  => '2002',
            'make_name'             => 'Mercedes',
            'client_id'             => 1,
            'status'                => 'dispatched',
            'purchased_date'        => '2020-12-12',
            'auction'               => 'auction',
            'offsite'               => 1,
            'offsite_price'         => 100,
            'ship'                  => 1,
            'tracking_id'           => '777-3333-111FJ',
            'container_id'          => '#8899-UI-00',
            'point_load_city'       => 'New York',
            'point_load_date'       => '2020-02-25',
            'point_delivery_city'   => 'Odessa',
            'point_delivery_date'   => '2020-06-25',
            'disassembly'           => 0,
            'lot'                   => 1,
            'doc_type'              => 'TIR',
            'odometer'              => '143000m',
            'highlight'             => 'highlight',
            'pri_damage'            => 'front,side',
            'sec_damage'            => 'rear',
            'ret_value'             => '26999$',
            'vin_code'              => '123455HH998',
            'sale'                  => 1,
            'location'              => 'New York',
            'grid_item'             => 'item',
            'sale_name'             => 'MetLife',
            'ret_date'              => '2020-02-25',
            'feature'               => 1,
            'body_style'            => 'sedan',
            'color'                 => 'white',
            'eng_type'              => 'front',
            'cylinder'              => '5',
            'trans'                 => 'automatic',
            'drive'                 => 'yes',
            'fuel'                  => 'gas',
            'key'                   => 'yes',
            'note'                  => 'good car',
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertStatus(200);
    }

    /** @test */

    public function restore_auto_document_test()
    {
        $document = [];
        $document[0]['type'] = 'auction';
        $document[0]['file'] = UploadedFile::fake()->image('random.jpg');
        $document[1]['type'] = 'new';
        $document[1]['file'] = UploadedFile::fake()->image('random.jpg');
        $response = $this->post("$this->uri/restore-auto-document/" . $this->getTestAuto(),[
            'document'  => $document
        ],
            ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();

    }

    /** @test */

    public function delete_auto_document_test()
    {
        $auto = Auto::findOrFail($this->getTestAuto());
        $documents =  implode(',',$auto->documents()->take(5)->pluck('id')->toArray());
        $response = $this->post("$this->uri/delete-auto-document/$auto->id",[
            'ids'  => $documents
        ],
            ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    /** @test */

    public function delete_auto_test()
    {
        $response = $this->delete("$this->uri/delete-auto/" . $this->getTestAuto(),[
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    public function getTestAuto()
    {
        return Auto::whereModelName('123455HH998')->first()->id;
    }
}
