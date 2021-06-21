<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController')->name('dashboard.index');
    Route::get('/home', 'DashboardController')->name('dashboard.index');
    Route::resource('users', 'UserController');
    Route::put('profile', 'UserController@profile')->name('users.profile');
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('orders', 'OrderController');
    Route::resource('dealers', 'DealerController');
    Route::resource('halls', 'HallController');

    //notifications 
    Route::get('notifications', 'NotificationController@index');
});

Auth::routes(['register' => false]);
