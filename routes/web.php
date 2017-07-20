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

Route::group(['public'],function (){

    Route::group(['Users'], function () {
        Route::resource('users',"UserController");
        Route::get('test/{id?}',['as' => 'test', 'uses' => "UserController@test"]);
    });
    Route::group(['Posts'], function () {
        Route::resource('posts',"PostController");
        Route::get('/create', ['uses' => 'PostController@index', 'as' => 'create', ]);
        Route::post('/createpost', ['uses' => 'PostController@postCreatePost', 'as' => 'createpost', ]);
        Route::post('/delete-post/{post_id}', ['uses' => 'PostController@getDeletePost', 'as' => 'post.delete']);
        Route::post('/edit', ['uses' => 'PostController@postEditPost', 'as' => 'edit']);
        Route::post('/like', ['uses' => 'PostController@postLikePost', 'as' => 'like']);
    });
});

Route::group(['private'],function (){

});
//$route = new Route();
//Route::get('/',['as' => '/', 'uses' => "HomeController@index"]);

Route::get('/','HomeController@index');
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('post', function () {
    return view('home.Post');
});
//Route::get('/', function () {
//    return view('home.index');
//});

