<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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


Route::middleware('refresh.token')->prefix('admin')->group(function () {
    Route::get('a', 'UsersController@a'); //admin登录
});

        Route::post('login', 'UsersController@login'); //admin登录

    Route::post('register', 'UsersController@registered'); //admin注册


