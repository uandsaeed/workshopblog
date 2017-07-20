<?php
/**
 * Created by PhpStorm.
 * User: mrashid
 * Date: 7/15/2017
 * Time: 9:00 PM
 */

namespace App\Http\Controllers;


use App\Post;

class HomeController extends Controller
{

    public function index(){

        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('home.index',['posts' => $posts]);


        //        $world = "Students Of Batch I";
//        return view('home.index', compact('world'));

    }


}