<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'v1', 'namespace' => 'API\V1'], function () {
    Route::post('login', 'UserController@login');
    Route::post('register', 'UserController@register');
    Route::get('products', 'ProductController@index');
    //category   
    Route::get('getCategory', 'CategoryController@index');
    Route::group(['middleware' => 'auth:api'], function () {
        //admin
        Route::post('createAdmin', 'UserController@createAdmin')->middleware('role:admin');

        //product    
        Route::post('product/upload', 'ProductController@store')->middleware('role:admin');
        Route::put('updateProduct/{id}', 'ProductController@update')->middleware('role:admin');
        Route::delete('deleteProduct/{id}', 'ProductController@destroy')->middleware('role:admin');
    });
});
