<?php

namespace Tests\Feature\Client\Tests;

use App\Models\Part\Part;
use Illuminate\Http\UploadedFile;
use Tests\Feature\Client\ClientCase;

class PartTest extends ClientCase
{
    /** @test */

    public function create_part_test()
    {
        $response = $this->post("$this->uri/store-part",[
            'client_id'         => '1',
            'catalog_number'    => 'new12344_99',
            'name'              => 'hello_test',
            'auto'              => 'VW',
            'status'            => 'new',
            'quality'           => '12',
            'image'             => [UploadedFile::fake()->image('random.jpg')]
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    /** @test */

    public function show_all_part_test()
    {
        $response = $this->get("$this->uri/get-parts"
        , ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    /** @test */

    public function show_part_test()
    {
        $response = $this->get("$this->uri/get-part/" . $this->getTestPart()
            , ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    /** @test */

    public function update_part_test()
    {
        $response = $this->post("$this->uri/update-part/" . $this->getTestPart(),[
            'client_id'         => '1',
            'catalog_number'    => 'new12344_99',
            'auto'              => 'VW',
            'status'            => 'new',
            'quality'           => '12',
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    /** @test */

    public function restore_part_images_test()
    {
        $response = $this->post("$this->uri/restore-part-images/" . $this->getTestPart(),[
            'image'             => [
                UploadedFile::fake()->image('random.jpg'),
                UploadedFile::fake()->image('random.jpg'),
                UploadedFile::fake()->image('random.jpg'),
            ]
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    /** @test */
    public function delete_part_images_test()
    {
        $response = $this->delete("$this->uri/delete-part-images/" . $this->getTestPart() . "?ids=1,2,3",[
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    /** @test */
    public function delete_part_test()
    {
        $response = $this->delete("$this->uri/delete-part/" . $this->getTestPart(),[
        ], ['Authorization' => $this->getToken()]);
        $this->withoutExceptionHandling();
        $response->assertOk();
    }

    public function getTestPart()
    {
        return Part::whereName('hello_test')->first()->value('id');
    }
}
