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

Route::group([
    'middleware' => 'api',
    'prefix' => 'v1',
    'namespace' => 'App\Http\Controllers\Client\Api\Auth',
], function () {
    //auth user
    Route::post('/login', 'AuthController@login');
    Route::post('/email-exist', 'AuthController@checkEmailExist');
    Route::post('/register', 'AuthController@register');
    Route::post('/logout', 'AuthController@logout');
    Route::post('/refresh', 'AuthController@refresh');
    Route::get('/user-profile', 'AuthController@userProfile');
});


Route::group([
    'middleware' => 'api',
    'prefix' => 'v1/manager',
    'namespace' => '\App\Http\Controllers\Admin\Api\Auth',
], function () {
    //auth admin
//    Route::post('/login', 'AuthController@login');
//    Route::post('/logout', 'AuthController@logout');
//    Route::post('/refresh', 'AuthController@refresh');
//    Route::get('/user-profile', 'AuthController@userProfile');
});


Route::group([
    'middleware' => 'api',
    'prefix' => 'v1',
    'namespace' => 'App\Http\Controllers\Client\Api',
], function () {

    Route::get('/foods', 'FoodController@index');
    Route::get('/stores', 'StoreController@index');
    Route::get('/stores/{store}', 'StoreController@show');
    Route::get('/food-promotions', 'FoodController@promotions');

    Route::get('/listed', 'OtherController@getDataSectionListed');

    Route::get('/address', 'OtherController@address');
    Route::get('/districts', 'OtherController@districts');
    Route::get('/wards', 'OtherController@wards');
});

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'v1',
    'namespace' => 'App\Http\Controllers\Client\Api',
], function () {

    Route::get('/carts', 'CartController@index');
    Route::post('/carts', 'CartController@update');
    Route::delete('/carts', 'CartController@destroy');

    Route::post('/order', 'OrderController@store');
    Route::post('/rate', 'RateController@store');

    Route::get('/like', 'LikeController@index');
    Route::post('/like', 'LikeController@update');

    Route::post('/comment', 'CommentController@store');
});
