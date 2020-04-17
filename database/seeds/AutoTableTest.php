<?php

use Illuminate\Database\Seeder;

class AutoTableTest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Auto\Auto::create([
            'year'          => '2014',
            'make_name'     => 'Mercedes',
            'model_name'    => 'Mercedes',
            'client_id'     => 1
        ]);
    }
}
