<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use \App\Http\Controllers\HomeController;

Route::group(['public'],function (){

    /*Route::group(['Users'], function () {
        Route::resourse('users',HomeController::class);
    });*/
});

Route::group(['private'],function (){

});
//$route = new Route();
Route::get('abc',['as' => 'ali', 'uses' => "HomeController@index"]);


Route::get('/', function () {
    return view('welcome');
});