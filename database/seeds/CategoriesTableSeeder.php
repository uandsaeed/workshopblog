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
        \App\Models\Category::truncate();
        \App\Models\Category::insert([
            ['name' => 'Happy',],
            ['name' => 'Sad',],
            ['name' => 'Traveling',],
            ['name' => 'Tired',],
            ['name' => 'Romantic',],
        ]);

    }
}
