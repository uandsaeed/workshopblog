<?php
/**
 * Created by PhpStorm.
 * User: mrashid
 * Date: 7/15/2017
 * Time: 9:00 PM
 */
namespace App\Http\Controllers;


use App\Models\Category;
use app\Http\Requests\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Post;

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
        $posts = $this->post->fetchPosts();
        return view('home.index',['posts' => $posts]);
    }

    public function searchPosts(Request $request){

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