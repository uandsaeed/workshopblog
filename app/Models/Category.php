<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public static function saveCategory($data){
        $category = null;
        if(isset($data['id'])){
            /** @var TYPE_NAME $this */
            $category = self::find($data['id']);
        }else{
            $category = new Category();
        }
        $category->name = $data['name'];

        $category->save();
        $response = ['success'=>true, 'error'=> false, 'message'=> 'Posts has been saved successfully!','Post'=>$category];
        return $response;
    }
}
