<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

/*  Route::get('articles', 'ArticlesController@index');
    Route::get('articles/create', 'ArticlesController@create');
    Route::get('articles/{id}', 'ArticlesController@show');
    Route::post('articles', 'ArticlesController@store');
    Route::get('articles/{id}/edit', 'ArticlesController@edit');
    Route::patch('articles/{id}', 'ArticlesController@update');
    Route::delete('articles/{id}', 'ArticlesController@destroy');
*/
    Route::get('articles', ['as' => 'articles.index', 'uses' => 'ArticlesController@index']);
    Route::get('articles/create', ['as' => 'articles.create', 'uses' => 'ArticlesController@create']);
    Route::get('articles/{id}', ['as' => 'articles.show', 'uses' => 'ArticlesController@show']);
    Route::post('articles', ['as' => 'articles.store', 'uses' => 'ArticlesController@store']);
    Route::get('articles/{id}/edit', ['as' => 'articles.edit', 'uses' => 'ArticlesController@edit']);
    Route::patch('articles/{id}', ['as' => 'articles.update', 'uses' => 'ArticlesController@update']);
    Route::delete('articles/{id}', ['as' => 'articles.destroy', 'uses' => 'ArticlesController@destroy']);

});
