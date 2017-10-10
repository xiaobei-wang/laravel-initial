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

    //  文章路由
    Route::post('/article/store/{id}', ['as' => 'api.article.store', 'uses' => 'Api\ArticleController@store']);
    Route::post('/article/update/{id}', ['as' => 'api.article.update', 'uses' => 'Api\ArticleController@update']);
    Route::post('/article/delete/{id}', ['as' => 'api.article.delete', 'uses' => 'Api\ArticleController@delete']);
    Route::post('/article/img/image-upload', ['as' => 'api.article.image-upload', 'uses' => 'Api\ArticleController@imageUpload']);

    //  用户管理路由
    Route::post('/role/user/store/{id}', ['as' => 'api.role.user.store', 'uses' => 'Api\Role\UserController@store']);
    Route::post('/role/user/update/{id}', ['as' => 'api.role.user.update', 'uses' => 'Api\Role\UserController@update']);
    Route::post('/role/user/delete/{id}', ['as' => 'api.role.user.delete', 'uses' => 'Api\Role\UserController@delete']);
});
