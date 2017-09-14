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

Route::Auth();

// 首页
Route::get('/', function () {
    return view('welcome');
});

Route::get('logout','Auth\LoginController@logout'); //登出

//登录界面
Route::get('login',function() {
	return view('auth.login');
});


// Api 接口
Route::group(['prefix' => 'api', 'namespace' => 'Api'], function() {

	/******* 后台 *********/
	Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
	// Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function() {
		Route::resource('user', 'UserController');
		Route::resource('system', 'SystemController');
		Route::resource('category', 'CategoryController');
		Route::resource('comment', 'CommentController');
		Route::resource('product', 'ProductController');
		Route::resource('turn', 'TurnController');
	});

	/******* 前台 *********/
	Route::group(['prefix' => 'home', 'namespace' => 'Home'], function() {
		Route::resource('user', 'UserController');
		Route::resource('system', 'SystemController');
		Route::resource('category', 'CategoryController');
		Route::resource('comment', 'CommentController');
		Route::resource('product', 'ProductController');
		Route::resource('turn', 'TurnController');
	});
});


