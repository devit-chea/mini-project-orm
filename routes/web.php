<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'ArticleController@allArticles');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// User List
Route::prefix('admin')->group(function () {

    Route::get('/users/create', 'User\UserController@create')->name('users/create');
    Route::get('/users/show/{id?}', 'User\UserController@show')->name('users/show');
    Route::post('/users/store/{id?}', 'User\UserController@store')->name('users/store');
    Route::get('/users/delete/{id?}', 'User\UserController@destroy')->name('users/delete');
    ////
    Route::get('/category', 'CategoryController@index')->name('category');
    Route::get('/category/create', 'CategoryController@create')->name('category/create');
    Route::get('/category/show/{id?}', 'CategoryController@show')->name('category/show');
    Route::post('/category/store/{id?}', 'CategoryController@store')->name('category/store');
    Route::get('/category/delete/{id?}', 'CategoryController@destroy')->name('category/delete');
    ////
    Route::get('/articles', 'ArticleController@index')->name('articles');
    Route::get('/articles/create', 'ArticleController@create')->name('articles/create');
    Route::get('/articles/show/{id?}', 'ArticleController@show')->name('articles/show');
    Route::post('/articles/store/{id?}', 'ArticleController@store')->name('articles/store');
    Route::get('/articles/delete/{id?}', 'ArticleController@destroy')->name('articles/delete');
    // content
});


Route::get('/all/articles', 'ArticleController@allArticles')->name('/');
Route::get('/articles/entertainment', 'ArticleController@entertainment')->name('articles/entertainment');
Route::get('/articles/sports', 'ArticleController@sports')->name('articles/sports');
Route::get('/articles/technology', 'ArticleController@technology')->name('articles/technology');
Route::get('/articles/social', 'ArticleController@social')->name('articles/social');

// view detail

Route::get('view/article/detail/{id?}', 'ArticleController@getArticle_detail')->name('view/article/detail');

