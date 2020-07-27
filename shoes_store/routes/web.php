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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::prefix('auth')->group(base_path('routes/auth.php'));
    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
        Route::resource('size', 'SizeController');
        Route::resource('color', 'ColorController');
        Route::resource('category', 'CategoryController');
        Route::resource('shoes', 'ShoesController'); 
    });
});