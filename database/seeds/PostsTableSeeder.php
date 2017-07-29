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
        \Illuminate\Support\Facades\DB::table('categories_posts')->truncate();
        \App\Models\Post::truncate();

        $catIds = array(1,2,);
        $posts = \App\Models\Post::create([
            'user_id' => '1',
            'title' => 'Welcome',
            'photo' => '1.jpg',
            'description' => 'This is our first Post for testing'
        ]);
        $posts->categories()->sync($catIds);

        $catIds = array(3,4);
        $posts = \App\Models\Post::create([
            'user_id' => '1',
            'title' => 'Welcome 2',
            'photo' => '1.jpg',
            'description' => 'hjfl hsf lsdjhf sdfldldhf sdflhsdfsdhfldslkf hdslfsd'
        ]);
        $posts->categories()->sync($catIds);


        $catIds = array(1,2,3,4);
        $posts = \App\Models\Post::create([
            'user_id' => '1',
            'title' => 'Welcome 3',
            'photo' => '1.jpg',
            'description' => 'dassafsdfdsdfljsdf lsjd dhsf sdlfhoisd foshdfsdlif odsfohsdfli dsfhpsd fip dsfijsd'
        ]);
        $posts->categories()->sync($catIds);
    }
}
