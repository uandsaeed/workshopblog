<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

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
        $posts = $this->post->fetchPosts();
        return view('home.index',compact('message'))->nest('postList','home.partials._postList',compact('posts'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function filterPosts(Request $request){
        $data = $request->all();
        $posts = $this->post->fetchPosts($data);
        return view('home.partials._postList',compact('posts'));
    }
}
