<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CatagoryRequest;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
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


    public function index(Request $request) {
        $posts = 'All post will be shown here';
        $message = null;
        if($request->session()->has('message')){
            $message = $request->get('message',null);
//            dd($message);
        }
        return view('post.index', compact('posts','message'));
    }

    public function create() {
        $post = $this->post;
        return view('post.create',compact('post'));
    }

    public function edit($id) {
        $post = Post::find($id);
        return view('post.edit',compact('post'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $this->post->savePost($data);
        return redirect()->route('posts.index')->with('message','Post has been save successfully!');
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $data['id'] = $id;
        $this->post->savePost($data);
        return redirect()->route('posts.index')->with('message','Post has been save successfully!');
    }

    public function category() {
        return view('home.category');
    }

    public function postCreatePost(StorePostRequest $request)
    {
        $data = $request->all();
        $response = Post::savePost($data);
        return View('post.create', compact('response'));

    }

    public function createCatagory(CatagoryRequest $request)
    {
        $data = $request->all();
        $response = Category::saveCategory($data);
        return View('home.category', compact('response'));

    }
}
