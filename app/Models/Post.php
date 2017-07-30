<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const LIMIT = 50;
    protected $fillable = [
        'title', 'category', 'photo', 'description', 'user_id'  //@todo category column should be removed
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
    public function savePost(array $data)
    {
        $post = null;
        if (isset($data['id'])) {
            /** @var TYPE_NAME $this */
            $post = self::find($data['id']);
        } else {
            $post = new Post();
        }
        $post->user_id = $data['user_id'];
        $post->title = $data['title'];
        $post->photo = $data['image'];
        $post->description = $data['description'];
        $post->save();

        $categoriesIds = isset($data['category']) ? $data['category'] : '';
        if($categoriesIds != ''){
            foreach($categoriesIds as $qId){
                $post->categories()->attach($qId);
            }
        }

        $response = ['success' => true, 'error' => false, 'message' => 'Posts has been saved successfully!', 'Post' => $post];
        return $response;
    }

    public static function deletePost($data)
    {
        $post = Post::find($data);
        $post->delete();
        $response = ['success' => true, 'error' => false, 'message' => 'Posts has been saved successfully!'];
    }

    /**
     * @param array $params
     */
    function fetchPosts($params = array())
    {
        $limit = isset($params['limit']) ? $params['limit'] : self::LIMIT;

        $qry = self::select('id', 'title', 'user_id', 'photo', 'description', 'created_at');
        if (isset($params['searchKey'])) {
            $qry->where('title', 'LIKE', '%' . $params['searchKey'] . '%');
        }
        $qry->orderBy('created_at', 'desc');
//        dd($qry->toSql());
        return $qry->paginate($limit);
    }

    public function categories()
    {
//        return $this->belongsToMany(Category::class);
        return $this->belongsToMany(Category::class,'categories_posts');
    }
}
