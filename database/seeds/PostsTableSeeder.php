<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Post::truncate();
        \App\Post::insert([

            ['id' => '1','user_id' => '1','title' => 'Welcome','category' => 'Happy','photo' => '1.jpg','description' => 'Good Morning','created_at' => '2017-07-07 09:24:08',],

        ]);
    }
}
