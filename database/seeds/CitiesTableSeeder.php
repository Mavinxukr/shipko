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
        $file = file(base_path("cities/cities.txt"),
            FILE_IGNORE_NEW_LINES);

        for ($i = 0; $i < count($file); $i = $i + 3){
            \App\Models\Client\City::create([
                'name'          => $file[$i],
                'state'    => $file[$i+1],
                'price'         => $file[$i+2],
            ]);
        }
    }
}
