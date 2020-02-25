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
            'model_name'    => 'Mercedes',
            'client_id'        => 1
        ]);
    }
}
