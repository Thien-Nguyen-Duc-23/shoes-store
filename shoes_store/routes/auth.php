<?php

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::get('login', 'AuthController@login')->name('auth.login');
Route::post('login', 'AuthController@loginAdmin')->name('auth.loginAdmin');
Route::get('logout', 'AuthController@logout')->name('auth.logout');
