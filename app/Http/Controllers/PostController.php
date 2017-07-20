<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CatagoryRequest;
use App\Http\Requests\StorePostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    public function index() {
        return view('post.create');
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
