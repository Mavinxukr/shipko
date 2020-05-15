<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            ['name' => 'Dnepr'],
            ['name' => 'Kiev'],
            ['name' => 'London'],
            ['name' => 'Paris'],
        ];

        \App\Models\Client\City::insert($cities);
    }
}
