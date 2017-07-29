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

    Route::group(['Home'], function () {
        Route::resource('home',"HomeController");
    });

    Route::group(['Users'], function () {
        Route::resource('users',"UserController");
        Route::get('test/{id?}',['as' => 'test', 'uses' => "UserController@test"]);
        Route::any('uploadProfilePic', array('as' => 'uploadProfilePic', 'uses' => 'UsersController@uploadProfilePic'));
    });

    Route::group(['Posts'], function () {
        Route::resource('posts',"PostController");
        Route::post('/results', ['uses' => 'HomeController@searchPosts', 'as' => 'results' ]);
        Route::get('/create', ['uses' => 'PostController@create', 'as' => 'create', ]);
        Route::get('/delete/{post_id}', ['uses' => 'PostController@delete', 'as' => 'delete']);
        Route::get('/edit/{post_id}', ['uses' => 'PostController@edit', 'as' => 'edit']);
        Route::post('/like', ['uses' => 'PostController@postLikePost', 'as' => 'like']);
        Route::get('/show/{post_id}', ['uses' => 'PostController@show', 'as' => 'show']);


    });

    Route::group(['Categories'], function () {

        Route::get('/category', ['uses' => 'CategoryController@index', 'as' => 'category', ]);
        Route::post('/createcategory', ['uses' => 'CategoryController@createCategory', 'as' => 'createcategory', ]);
        Route::get('/delete_category/{id}', ['uses' => 'CategoryController@destroy_cat', 'as' => 'delete_category']);
        Route::get('/editCategory/{id}', ['uses' => 'CategoryController@edit', 'as' => 'editCategory']);
        Route::put('/updateCategory/{id}', ['uses' => 'CategoryController@update_cat', 'as' => 'updateCategory']);
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

