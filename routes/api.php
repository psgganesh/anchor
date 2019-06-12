<?php

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

/**
 * API Version 1 routes
 */

Route::get('/api', 'BaseController@status');

Route::get('/api/v1/', 'Api\v1\HomeController@index')->middleware('guest');

// Guest routes
Route::group(['middleware' => 'guest:api'], function () {
    Route::namespace('Api\v1')->prefix('api/v1')->group(function () {
        Route::post('login', 'Authentication\LoginController@login')->name('apilogin');
        Route::post('register', 'Authentication\RegisterController@register');
        Route::post('password/email', 'Authentication\ForgotPasswordController@sendResetLinkEmail');
        Route::post('password/reset', 'Authentication\ResetPasswordController@reset');
    });
});

// Authenticated routes - api / v1
Route::middleware(['auth:api'])->group(function () {
    Route::namespace('Api\v1')->prefix('api/v1')->group(function () {
        Route::apiResource('users', 'Authorization\UserController');
        Route::apiResource('roles', 'Authorization\RoleController');
        Route::apiResource('permissions', 'Authorization\PermissionController');
        Route::post('logout', 'Authentication\LoginController@logout');
        Route::get('user', 'HomeController@user');
        Route::patch('settings/profile', 'Settings\ProfileController@update');
        Route::patch('settings/password', 'Settings\PasswordController@update');
    });
});
