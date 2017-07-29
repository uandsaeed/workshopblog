<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        Category::insert([

            ['name' => 'Happy'],
            ['name' => 'Sad'],
            ['name' => 'Traveling'],
            ['name' => 'Tired'],
            ['name' => 'Romantic'],
        ]);

    }
}
