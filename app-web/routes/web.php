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
//登录注册
Route::get('/register', ['as' => 'register', 'uses' => 'RegisterController@index']);
//登录页面
Route::get('/login', ['as' => 'login', 'uses' => 'LoginController@index']);
//个人设置页面
Route::get('/personal/user/setting', ['as' => 'personal.user.setting', 'uses' => 'Personal\UserController@index']);

//文章路由
Route::get('/', ['as' => 'article.index', 'uses' => 'ArticleController@index']);
Route::get('/article/index', ['as' => 'article.index', 'uses' => 'ArticleController@index']);
Route::get('/article/detail/{id}', ['as' => 'article.detail', 'uses' => 'ArticleController@detail']);

//增
Route::get('/article/edit/{id}', ['as' => 'article.edit', 'uses' => 'ArticleController@edit']);
//删
Route::post('/article/deleta/{id}', ['as' => 'article.delete', 'uses' => 'ArticleController@delete']);