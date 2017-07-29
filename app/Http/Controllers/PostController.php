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
        $posts = Post::all();
        $message = null;
        if($request->session()->has('message')){
            $message = $request->get('message',null);
        }
        return view('home.index', compact('posts','message'));
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
    public function store(StorePostRequest $request)
    {
        $data = $request->all();
        $fileData = isset($data['image']) && count($data['image']) > 0 ? $data['image'] : null;
        if($fileData) {
            $data['image'] = $this->uploadFile($fileData);
        }
        $this->post->savePost($data);
        return redirect()->route('home.index')->with('message','Post has been save successfully!');
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $fileData = isset($data['image']) && count($data['image']) > 0 ? $data['image'] : null;
        if($fileData) {
            $data['image'] = $this->uploadFile($fileData);
        }
        $data['id'] = $id;
        $this->post->savePost($data);
        return redirect()->route('home.index')->with('message','Post has been save successfully!');
    }

    public function category() {
        return view('home.category');
    }

    public function createCatagory(CatagoryRequest $request)
    {
        $data = $request->all();
        $response = Category::saveCategory($data);
        return View('home.category', compact('response'));

    }

    public function show($post_id) {
        $post = Post::where('id', $post_id)->first();
        return View('post.index',  ['post' => $post]);
    }

    public function delete($post_id) {
        $this->post->deletePost($post_id);
        return redirect()->route('home.index')->with('message','Post has been save successfully!');
    }

    private function uploadFile($imageData){
        $file = $imageData;
        //saving image in public/assets/images folder with its extension
        $pathToSaveImage = public_path('/assets/uploads/posts/');
        $fileOriginalNameDetailArray = pathinfo($file->getClientOriginalName());
        $fileName = time() . "_" . rand(1, 1000) . "." . $fileOriginalNameDetailArray['extension'];
        $file->move($pathToSaveImage, $fileName);

        return $fileName;
    }
}
