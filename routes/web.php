<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() { return view('welcome'); });
Route::get('/login', 'NuxtController@serveFrontend')->name('login');
Route::get('/register', 'NuxtController@serveFrontend')->name('register');
Route::any('{all}', 'NuxtController@serveFrontend')->where('all', '^(?!api).*$');