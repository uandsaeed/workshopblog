<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'category', 'photo', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id',
    ];

    public static $rules = [
        'title' => 'required',
        'category' => 'required',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public static function savePost($data){

        $vRules = Post::$rules;
//            $id = isset($data['id']) ? $data['id'] : '';
//            if($id != ''){
//                $posts = Post::find($id);
//            }else{
//                return $response = ['success'=>false, 'error'=> true, 'message' => ' record did not find for updation! '];
//            }

//        //*****Start Rules Validators
//        $validator = Validator::make($data, $vRules);
//        if ($validator->fails())
//        {
//            return ['success'=>false, 'error'=> true, 'validatorErrors'=>$validator->errors()];
//        }
        //*****End Rules Validators

        $posts = new Post();

        $posts->title = $data['title'];
        $posts->category      = $data['category'];
        $posts->photo  = $data['photo'];
        $posts->description   = $data['description'];


        $posts->save();


        $response = ['success'=>true, 'error'=> false, 'message'=> 'Posts has been saved successfully!'];
        return $response;
    }
}
