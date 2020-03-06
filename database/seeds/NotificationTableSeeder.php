<?php

use Illuminate\Database\Seeder;

class NotificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'client_id' => 1,
                'type'      => 'auto',
                'body'      => 'Notification for type Auto #1',
                'created_at'=> \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now(),
            ],
            [
                'client_id' => 1,
                'type'      => 'auto',
                'body'      => 'Notification for type Auto #2',
                'created_at'=> \Carbon\Carbon::now()->addDays(1),
                'updated_at'=> \Carbon\Carbon::now()->addDays(1),
            ],
            [
                'client_id' => 1,
                'type'      => 'shipping',
                'body'      => 'Notification for type Shipping #1',
                'created_at'=> \Carbon\Carbon::now()->addDays(10),
                'updated_at'=> \Carbon\Carbon::now()->addDays(10),
            ],
            [
                'client_id' => 1,
                'type'      => 'shipping',
                'body'      => 'Notification for type Shipping #2',
                'created_at'=> \Carbon\Carbon::now()->addDays(25),
                'updated_at'=> \Carbon\Carbon::now()->addDays(25),
            ],
        ];

        \App\Models\Notification\Notification::insert($data);
    }
}
