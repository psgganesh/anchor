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
Route::namespace('Api')->group(function () {

    /**
     * All v1 routes
     */
    Route::namespace('v1')->prefix('v1')->group(function () {

        Route::get('/', 'HomeController@index');

        Route::group(['middleware' => 'guest:api'], function () {
            Route::post('login', 'Authentication\LoginController@login')->name('apilogin');
            Route::post('register', 'Authentication\RegisterController@register');

            Route::post('password/email', 'Authentication\ForgotPasswordController@sendResetLinkEmail');
            Route::post('password/reset', 'Authentication\ResetPasswordController@reset');
        });

        Route::middleware(['auth:api'])->group(function () {
            Route::post('logout', 'Authentication\LoginController@logout');
            Route::get('user', function (Request $request) {
                return $request->user();
            });
            Route::patch('settings/profile', 'Settings\ProfileController@update');
            Route::patch('settings/password', 'Settings\PasswordController@update');
        });

    });

});