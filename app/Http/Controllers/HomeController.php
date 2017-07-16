<?php
/**
 * Created by PhpStorm.
 * User: mrashid
 * Date: 7/15/2017
 * Time: 9:00 PM
 */

namespace App\Http\Controllers;


class HomeController extends Controller
{

    public function index(){
        $world = "Students Of Batch I";
        return view('home.index', compact('world'));
    }
}