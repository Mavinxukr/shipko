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
        $countries = [
            [
                'name' => 'NEW JERSEY',
                'short_name' => 'NJ',
                'file' => 'new_jersey.txt',
            ],
            [
                'name' => 'GEORGIA',
                'short_name' => 'GA',
                'file' => 'georgia.txt',
            ],
            [
                'name' => 'TEXAS',
                'short_name' => 'TX',
                'file' => 'texas.txt',
            ],
            [
                'name' => 'CALIFORNIA',
                'short_name' => 'LA',
                'file' => 'california.txt',
            ],
        ];

        foreach ($countries as $country){
            $model = \App\Models\Client\Country::create([
                'name'          => $country['name'],
                'short_name'    => $country['short_name'],
            ]);
            $file = file(base_path("cities/" . $country['file']),
                FILE_IGNORE_NEW_LINES);

            for ($i = 0; $i < count($file); $i = $i + 3){
                \App\Models\Client\City::create([
                    'country_id'    => $model->id,
                    'name'          => $file[$i],
                    'short_name'    => $file[$i+1],
                    'price'         => $file[$i+2],
                ]);
            }
        }
    }
}
