<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([], function () {
//    用户模块
//    注册行为
    Route::post('/register', ['as' => 'api.register', 'uses' => 'Api\RegisterController@register']);
//    登录行为
    Route::post('/login', ['as' => 'api.login', 'uses' => 'Api\LoginController@login']);
//    登出行为
    Route::get('/logout', ['as' => 'api.logout', 'uses' => 'Api\LoginController@logout']);
//    个人设置操作
    Route::post('/personal/user/setting', ['as' => 'api.personal.user.setting', 'uses' => 'Api\Personal\UserController@settingStore']);

//  文章路由
    Route::post('/article/store/{id}', ['as' => 'api.article.store', 'uses' => 'Api\ArticleController@store']);
    Route::post('/article/update/{id}', ['as' => 'api.article.update', 'uses' => 'Api\ArticleController@update']);
    Route::post('/article/delete/{id}', ['as' => 'api.article.delete', 'uses' => 'Api\ArticleController@delete']);
    Route::post('/article/img/image-upload', ['as' => 'api.article.image-upload', 'uses' => 'Api\ArticleController@imageUpload']);
});