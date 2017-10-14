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
use \App\Http\Controllers\UserController;

Route::get('home/abc','HomeController@index')->name('homeIndex');

Route::post();
Route::any();
Route::resource();
Route::group();

Route::group(['public'],function (){

    Route::group(['Users'], function () {
        Route::resource('users',"UserController");
        Route::get('test/{id?}',['as' => 'test', 'uses' => "UserController@test"]);
    });
});

Route::group(['private'],function (){

});
//$route = new Route();
Route::get('abc',['as' => 'ali', 'uses' => "HomeController@index"]);


Route::get('/', function () {
    return view('welcome');
});