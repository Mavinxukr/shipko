<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RolesTableSeeder::class);
         $this->call(UserTableSeeder::class);
         $this->call(ClientTableSeeder::class);
         $this->call(NotificationTableSeeder::class);
         $this->call(AutoTableTest::class);
         $this->call(CitiesTableSeeder::class);
    }
}
