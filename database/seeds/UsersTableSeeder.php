<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::truncate();
        \App\Models\User::insert([

            ['id' => '1','name' => 'user','email' => 'user@gmail.com','password' => '123456'],

        ]);
    }
}
