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

Route::group(['middleware' => 'auth:api'], function ($router) {
    
});

Route::group([
    'middleware' => 'api',
], function ($router) {
    //  Customer Log
    Route::post('customer/login', 'Api\AuthController@login');
    Route::post('customer/logout', 'Api\AuthController@logout');
    Route::post('customer/register', 'Api\AuthController@register');
    Route::post('customer/refresh', 'Api\AuthController@refresh');

    // halls route
    Route::post('customer/halls', 'Api\ApiController@halls');
    Route::post('customer/hall', 'Api\ApiController@hall');
    Route::post('customer/order', 'Api\ApiController@order');
});
