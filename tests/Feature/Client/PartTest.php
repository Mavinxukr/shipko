<?php

namespace Tests\Feature\Client;

use App\Models\Client\Client;
use App\Models\Part\Part;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\Feature\TokenContract\TokenContract;
use Tests\TestCase;

class PartTest extends TestCase implements TokenContract
{
    protected $uri =  'api-client';

    /** @test */

    public function create_part_test()
    {
        $this->withoutExceptionHandling();
        $response = $this->post("$this->uri/store-part",[
            'client_id'         => '12345',
            'catalog_number'    => 'new12344_99',
            'name'              => 'hello_test',
            'make'              => 'VW',
            'vin'               => '74749393',
            'quality'           => '12',
            'container'         => '#23232',
            'image'             => [UploadedFile::fake()->image('random.jpg')]
        ], ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }

    /** @test */

    public function show_all_part_test()
    {
        $this->withoutExceptionHandling();
        $response = $this->get("$this->uri/get-parts"
        , ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }

    /** @test */

    public function show_part_test()
    {
        $this->withoutExceptionHandling();
        $part = Part::first()->value('id');
        $response = $this->get("$this->uri/get-part/$part"
            , ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }

    /** @test */
    public function update_part_test()
    {
        $this->withoutExceptionHandling();
        $part = Part::first()->value('id');
        $response = $this->post("$this->uri/update-part/$part",[
            'client_id'             => '12345',
            'catalog_number'        => 'new12344_99',
            'name'                  => 'hello_test',
            'make'                  => 'VW',
            'vin'                   => '74749393',
            'quality'               => 12,
            'container'             => '#23232',
        ], ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }



    /** @test */

    public function restore_part_images_test()
    {
        $this->withoutExceptionHandling();
        $part = Part::first()->value('id');
        $response = $this->post("$this->uri/restore-part-images/$part",[
            'image'             => [
                UploadedFile::fake()->image('random.jpg'),
                UploadedFile::fake()->image('random.jpg'),
                UploadedFile::fake()->image('random.jpg'),
            ]
        ], ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }

    /** @test */
    public function delete_part_images_test()
    {
        $this->withoutExceptionHandling();
        $part = Part::first()->value('id');
        $response = $this->delete("$this->uri/delete-part-images/$part?ids=1,2,3",[
        ], ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }

    /** @test */
    public function delete_part_test()
    {
        $this->withoutExceptionHandling();
        $part = Part::first()->value('id');
        $response = $this->delete("$this->uri/delete-part/$part",[
        ], ['Authorization' => $this->getToken()]);
        $response->assertOk();
    }

    public function getToken(): string
    {
        $user =  [
            'email'     => 'client12@gmail.com',
            'password'  => '111111'
        ];
        $responseLogin = $this->post("$this->uri/login",
            $user)->decodeResponseJson();
        return $responseLogin['data']['auth']['token'];
    }
}
