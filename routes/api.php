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
    'prefix' => 'customer',
], function ($router) {
    //  Customer Log
    Route::post('login', 'Api\AuthController@login');
    Route::post('logout', 'Api\AuthController@logout');
    Route::post('register', 'Api\AuthController@register');
    Route::post('refresh', 'Api\AuthController@refresh');
    Route::post('profile', 'Api\AuthController@profile');

    // halls route
    Route::post('store/order', 'Api\ApiController@StoreOrder');
    Route::post('get/orders', 'Api\ApiController@getorders');
    Route::post('get/order', 'Api\ApiController@getorder');
    Route::post('tender', 'Api\ApiController@tender');

    Route::post('halls', 'Api\ApiController@halls');
    Route::post('hall', 'Api\ApiController@hall');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'dealer',
], function ($router) {
    //  Customer Log
    Route::post('login', 'Api\AuthController@login');
    Route::post('logout', 'Api\AuthController@logout');
    Route::post('register', 'Api\AuthController@register');
    Route::post('refresh', 'Api\AuthController@refresh');
    Route::post('profile', 'Api\AuthController@profile');

    // halls route
    
});
