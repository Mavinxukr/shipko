<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = [
            0 => [
                'name'              => 'client_seed',
                'username'          => 'client_name_seed',
                'password'          => bcrypt('111111'),
                'phone'             => '380000000123',
                'email'             =>'client12@gmail.com' ,
                'card_number'       => '1200-1234-1234-1234',

            ],
            1 => [
                'name'              => 'client_seed_2',
                'username'          => 'client_name_seed_2',
                'password'          => bcrypt('111111'),
                'phone'             => '380000002123',
                'email'             =>'client13@gmail.com' ,
                'card_number'       => '1200-1234-1234-1234',

            ],
            2 => [
                'name'              => 'client_seed_3',
                'username'          => 'client_name_seed_3',
                'password'          => bcrypt('111111'),
                'phone'             => '380000003123',
                'email'             =>'client14@gmail.com' ,
                'card_number'       => '1200-1234-1234-1234',

            ]
        ];
        foreach ($clients as $client){
            \App\Models\Client\Client::create([
                'name'              => $client['name'],
                'username'          => $client['username'],
                'password'          => $client['password'],
                'phone'             => $client['phone'],
                'email'             => $client['email'] ,
                'card_number'       => $client['card_number'],
            ]);
        }
    }
}
