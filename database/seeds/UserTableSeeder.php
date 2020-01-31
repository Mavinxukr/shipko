<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
                0 => [
                    'name'          => 'admin',
                    'email'         => 'admin@gmail.com',
                    'password'      => bcrypt('111111'),
                    'role_id'       => 1
                ]
        ];
        foreach ($users as $user){;
            \App\User::create([
                'name'          => $user['name'],
                'email'         => $user['email'],
                'password'      => $user['password'],
                'role_id'       => $user['role_id']
            ]);
        }
    }
}
