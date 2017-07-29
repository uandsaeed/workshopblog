<?php

namespace App\Http\Controllers;
use App\Models\Category;
use app\Http\Requests\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Post;

class HomeController extends Controller
{
    private $post;
    /**
     * PostController constructor.
     * @param $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('home');
        $posts = $this->post->fetchPosts();
        $message = null;
        /*if($request->session()->has('message')){
            $message = $request->get('message',null);
        }*/
        return view('home.index', compact('posts','message'));
    }

    public function searchPosts(CategoryRequest $request){

        $searchKey = $request->get('searchKey',null);
        $posts = null;
        $params['searchKey'] = $searchKey;
        $posts = $this->post->fetchPosts($params);
        return view('home.index',['posts' => $posts]);
    }


    public function searchViaCategory(CategoryRequest $request,$category_ids=null)
    {
//       $searchKey = $request->get('searchKey',null);
        if(isset($request['category_ids'])){
        $params['category_ids'] = $request->get('category_ids');
        }
        if(isset($category_ids)){
            $params['category_ids'] = $category_ids;
        }
        $posts = $this->post->fetchPosts($params);
        return view('home.index', ['posts' => $posts,'params'=>$params]);
    }

}
