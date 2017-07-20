<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::truncate();
        \App\Category::insert([

            ['name' => 'Happy',],
            ['name' => 'Sad',],
            ['name' => 'Traveling',],
            ['name' => 'Tired',],
            ['name' => 'Romantic',],

        ]);

    }
}
