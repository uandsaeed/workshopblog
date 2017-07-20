<?php
/**
 * Created by PhpStorm.
 * User: mrashid
 * Date: 7/15/2017
 * Time: 9:00 PM
 */
namespace App\Http\Controllers;


<<<<<<< HEAD
use App\Category;
use app\Http\Requests\Request;
=======
//use App\Http\Requests\Request;
use Illuminate\Http\Request;
>>>>>>> e044e6d50e1abd4fd014e6f46d5650ed74789ba4
use App\Post;
class HomeController extends Controller
{

    private $post;

    /**
     * HomeController constructor.
     * @param $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $categories= Category::all();
        $posts = $this->post->fetchPosts();
        return view('home.index',['posts' => $posts,'categories' => $categories]);
    }

    public function searchPosts(Request $request){

        $searchKey = $request->get('searchKey',null);
        $posts = null;
        $params['searchKey'] = $searchKey;
        $posts = $this->post->fetchPosts($params);
        return view('home.index',['posts' => $posts]);
    }


}