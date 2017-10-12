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

//登录相关
Route::get('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('/login', ['as' => 'post.login', 'uses' => 'Auth\LoginController@login']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);
    Route::get('/home', ['as' => 'home.index', 'uses' => 'HomeController@index']);

    //用户管理
    Route::get('/role/user/index', ['as' => 'role.user.index', 'uses' => 'Role\UserController@index']);
    Route::get('/role/user/edit/{id}', ['as' => 'role.user.edit', 'uses' => 'Role\UserController@edit']);
    Route::get('/role/user/set-password/{id}', ['as' => 'role.user.set-password', 'uses' => 'Role\UserController@setPassword']);

    //角色管理
    Route::get('/role/role/index', ['as' => 'role.role.index', 'uses' => 'Role\RoleController@index']);
    Route::get('/role/role/edit/{id}', ['as' => 'role.role.edit', 'uses' => 'Role\RoleController@edit']);

    //文章管理
    Route::get('/article/index', ['as' => 'article.index', 'uses' => 'ArticleController@index']);
    Route::get('/article/edit/{id}', ['as' => 'article.edit', 'uses' => 'ArticleController@edit']);
});
