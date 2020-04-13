<?php

namespace Tests\Feature\Admin;

use App\Models\Auto\Auto;
use App\Models\Client\Client;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AutoTest extends TestCase
{
    protected $uri =  'api-admin';

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

    /** @test */

    public function create_auto_test()
    {
        $document = [];
        $document[0]['type'] = 'auction';
        $document[0]['file'] = UploadedFile::fake()->image('random.jpg');

        $this->withoutExceptionHandling();
        $response = $this->post("$this->uri/store-auto",[
            'model_name'            => 'Mercedes',
            'client_id'             => 1,
            'status'                => "new",
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
        $response->assertStatus(201);
    }

    /** @test */

    public function get_all_auto_test()
    {
        $this->withoutExceptionHandling();
        $response = $this->get("$this->uri/get-autos",
            ['Authorization' => $this->getToken()]);
        $response->assertOk();

    }

    /** @test */

    public function get_auto_by_id_test()
    {
        $auto_id = Auto::first()->value('id');
        $this->withoutExceptionHandling();
        $response = $this->get("$this->uri/get-auto/$auto_id",
            ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }

    /** @test */

    public function update_auto_test()
    {
        $auto_id = Auto::first()->value('id');
        $this->withoutExceptionHandling();
        $response = $this->post("$this->uri/update-auto/$auto_id",[
            'model_name'            => 'Mercedes',
            'client_id'             => 1,
            'status'                => 'not_approved',
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
        $auto_id = Auto::first()->value('id');
        $this->withoutExceptionHandling();
        $response = $this->post("$this->uri/restore-auto-document/$auto_id",[
            'document'  => $document
        ],
            ['Authorization' => $this->getToken()]);
        $response->assertOk();

    }

    /** @test */

    public function delete_auto_document_test()
    {
        $auto = Auto::first();
        $documents =  implode(',',$auto->documents()->take(5)->pluck('id')->toArray());
        $this->withoutExceptionHandling();
        $response = $this->post("$this->uri/delete-auto-document/$auto->id",[
            'ids'  => $documents
        ],
            ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }

    /** @test */

    public function delete_auto_test()
    {
        $this->withoutExceptionHandling();
        $auto_id = Auto::first()->value('id');
        $response = $this->delete("$this->uri/delete-auto/$auto_id",[
        ], ['Authorization' => $this->getToken()]);
        $response->assertOk();

    }
}
