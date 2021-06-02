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
        $autos = [
            [
                'year'          => '2014',
                'make_name'     => 'Mercedes',
                'model_name'    => 'Mercedes',
                'client_id'     => 1,
                'purchased_date'=> \Carbon\Carbon::now()->format('Y-m-d'),
            ],
            [
                'year'          => '2015',
                'make_name'     => 'Mercedes',
                'model_name'    => 'Mercedes',
                'client_id'     => 2,
                'purchased_date'=> \Carbon\Carbon::now()->format('Y-m-d'),
            ],
            [
                'year'          => '2016',
                'make_name'     => 'Mercedes',
                'model_name'    => 'Mercedes',
                'client_id'     => 3,
                'purchased_date'=> \Carbon\Carbon::now()->format('Y-m-d'),
            ]
        ];

        foreach ($autos as $auto){
            \App\Models\Auto\Auto::create($auto);
        }
    }
}
