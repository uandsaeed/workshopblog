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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * @param $data
     * @return array
     */
    public static function savePost($data){
        $post = null;
        if(isset($data['id'])){
            /** @var TYPE_NAME $this */
            $post = self::find($data['id']);
        }else{
            $posts = new Post();
        }
        $posts->title = $data['title'];
        $posts->category = $data['category'];
        $posts->photo = $data['photo'];
        $posts->description = $data['description'];
        $posts->save();
        $response = ['success'=>true, 'error'=> false, 'message'=> 'Posts has been saved successfully!','Post'=>$posts];
        return $response;
    }
}
