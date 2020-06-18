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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify'=>true]);

Route::get('/','front\HomeController@index')->name('index');
Route::post('/front/message/store','front\HomeController@store')->name('front.message.store');
Route::prefix('/admin/messages')->middleware('CheckRole')->group(function (){
    Route::get('/','back\MessageController@index')->name('admin.messages');
    Route::get('/delete/{message}','back\MessageController@destroy')->name('admin.messages.delete');
});

Route::prefix('/profile')->group(function (){
    Route::get('/{user}','UserController@index')->name('ProfileUser')->middleware(['auth','verified']);
    Route::get('/edit/{user}','UserController@edit')->name('ProfileEdit')->middleware(['auth','verified']);
    Route::post('update/{user}','UserController@update')->name('profileUser.update');
});

//Route::get('/profile/edit/{user}','UserController@edit')->name('ProfileUser');
//Route::post('/profile/update/{user}','UserController@update')->name('profileUser.update');

#####Admin Routes
Route::prefix('/admin/users')->middleware('CheckRole')->group(function (){
    Route::get('/','back\UserController@index')->name('admin.users');
    Route::get('/status/{user}','back\UserController@updateUser')->name('admin.users.updateStatus');
    Route::get('/delete/{user}','back\UserController@destroy')->name('admin.users.destroy');
});
Route::prefix('/admin/profile')->middleware('CheckRole')->group(function (){
    Route::get('/edit/{user}','back\UserController@edit')->name('admin.profile.edit');
    Route::post('/update/{user}','back\UserController@update')->name('admin.profile.update');
});

Route::prefix('/admin/categories')->middleware('CheckRole')->group(function (){
    Route::get('/','back\CategoryController@index')->name('admin.categories');
    Route::get('/create','back\CategoryController@create')->name('admin.categories.create');
    Route::post('/store','back\CategoryController@store')->name('admin.categories.store');
    Route::get('/edit/{category}','back\CategoryController@edit')->name('admin.categories.edit');
    Route::post('/update/{category}','back\CategoryController@update')->name('admin.categories.update');
    Route::get('/destroy/{category}','back\CategoryController@destroy')->name('admin.categories.destroy');
});

Route::prefix('/admin/articles/')->middleware('CheckRole')->group(function (){
    Route::get('/','back\ArticleController@index')->name('admin.articles');
    Route::get('/create','back\ArticleController@create')->name('admin.articles.create');
    Route::post('/store','back\ArticleController@store')->name('admin.articles.store');
    Route::get('/edit/{article}','back\ArticleController@edit')->name('admin.articles.edit');
    Route::post('/update/{article}','back\ArticleController@update')->name('admin.articles.update');
    Route::get('/destroy/{article}','back\ArticleController@destroy')->name('admin.articles.destroy');
    Route::get('/updateStatus/{article}','back\ArticleController@updateStatus')->name('admin.status.update');
});

Route::prefix('/front/')->group(function (){
    Route::get('/articles','front\ArticleController@index')->name('front.articles');
    Route::get('/article/{article}','front\ArticleController@show')->name('front.article');
});

Route::prefix('/admin/comments/')->middleware('CheckRole')->group(function (){
    Route::get('/','back\CommentController@index')->name('admin.comments');
    Route::get('/edit/{comment}','back\CommentController@edit')->name('admin.comment.edit');
    Route::post('/update/{comment}','back\CommentController@update')->name('admin.comment.update');
    Route::get('/updateStatus/{comment}','back\CommentController@updateStatus')->name('admin.comment.updateStatus');
    Route::get('/destroy/{comment}','back\CommentController@destroy')->name('admin.comment.destroy');
});

Route::post('/comment/{article}','front\CommentController@store')->name('comment.store');

Route::prefix('/admin/portfolios')->middleware('CheckRole')->group(function (){
    Route::get('/','back\PortfolioController@index')->name('admin.portfolios');
    Route::get('/create','back\PortfolioController@create')->name('admin.portfolio.create');
    Route::post('/store','back\PortfolioController@store')->name('admin.portfolio.store');
    Route::get('/edit/{portfolio}','back\PortfolioController@edit')->name('admin.portfolio.edit');
    Route::post('/update/{portfolio}','back\PortfolioController@update')->name('admin.portfolio.update');
    Route::get('/destroy/{portfolio}','back\PortfolioController@destroy')->name('admin.portfolio.destroy');
});

