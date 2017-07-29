<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::insert([

            ['id' => '1','name' => 'user','email' => 'user@gmail.com','password' => \Hash::make('123456')]

        ]);
    }
}
