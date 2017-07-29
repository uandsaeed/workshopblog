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
        $message = null;
        /*if($request->session()->has('message')){
            $message = $request->get('message',null);
        }*/
        return view('home.index', compact('posts','message'));
    }
}
