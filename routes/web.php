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

/*Route::post();
Route::any();
Route::resource();
Route::group();*/

Route::group(['public'],function (){

    Route::group(['Error'], function () {
        Route::get('error/{code?}', 'ErrorController@error')->name('error');
    });

    Route::group(['Home'], function () {
        Route::get('/','HomeController@index');
        Route::get('home', 'HomeController@index')->name('home');
        Route::post('filterPosts', ['uses' => 'HomeController@filterPosts', 'as' => 'filterPosts']);
        Route::post('searchViaCategory', ['uses' => 'HomeController@searchViaCategory', 'as' => 'searchViaCategory' ]);
    });

    Route::group(['Users'], function () {
        Route::resource('users',"UserController");
        Route::get('test/{id?}',['as' => 'test', 'uses' => "UserController@test"]);
        Route::any('uploadProfilePic', array('as' => 'uploadProfilePic', 'uses' => 'UsersController@uploadProfilePic'));
    });

    Route::group(['Posts'], function () {
        Route::post('/results', ['uses' => 'HomeController@searchPosts', 'as' => 'results' ]);
        Route::get('/show/{post_id}', ['uses' => 'PostController@show', 'as' => 'posts.show']);
    });
});

Route::group(['private', "middleware" => 'auth'],function (){

    Route::group(['Posts'], function () {
        Route::resource('posts',"PostController");
        Route::post('/like', ['uses' => 'PostController@postLikePost', 'as' => 'like']);
        Route::get('/show/{post_id}', ['uses' => 'PostController@show', 'as' => 'show']);
    });

    Route::group(['Categories'], function () {
        Route::resource('categories',"CategoryController");
        Route::post('/createcategory', ['uses' => 'CategoryController@createCategory', 'as' => 'createcategory', ]);
        Route::get('/delete_category/{id}', ['uses' => 'CategoryController@destroy_cat', 'as' => 'delete_category']);
        Route::get('/editCategory/{id}', ['uses' => 'CategoryController@edit', 'as' => 'editCategory']);
        Route::put('/updateCategory/{id}', ['uses' => 'CategoryController@update_cat', 'as' => 'updateCategory']);
    });
});
Auth::routes();