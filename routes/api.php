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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('pijian') -> group(function(){
    Route::post('completion','PijianController@completion');//实验答题
    Route::get('pdf','PijianController@pdf');//实验pdf
    Route::post('student','PijianController@student');//学生信息
});
Route::prefix('admin')->group(function () {
    Route::post('login', 'AdminController@dologin'); //admin登录
    Route::post('register', 'AdminController@register'); //admin注册
    Route::post('login1', 'UserController@dologin'); //user登录
    Route::post('register1', 'UserController@register'); //user注册
});
