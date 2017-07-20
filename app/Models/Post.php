<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const LIMIT = 50;
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
        $posts->user_id = $data['user_id'];
        $posts->title = $data['title'];
        $posts->category = $data['category'];
        $posts->photo = $data['photo'];
        $posts->description = $data['description'];
        $posts->save();
        $response = ['success'=>true, 'error'=> false, 'message'=> 'Posts has been saved successfully!','Post'=>$posts];
        return $response;
    }

    /**
     * @param array $params
     */
    function fetchPosts($params =array()){
        $limit = isset($params['limit']) ? $params['limit'] : self::LIMIT;

        $qry = self::select('id','title','user_id','photo','description','created_at');
        if(isset($params['searchKey'])){
            $qry->where('title','LIKE' , '%'.$params['searchKey'].'%');
        }
        $qry->orderBy('created_at', 'desc');
//        dd($qry->toSql());
        return $qry->paginate($limit);
    }
}
