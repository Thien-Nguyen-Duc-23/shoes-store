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
// Route::pattern('apiVersion1', 'v[1]');
// Route::prefix('{apiVersion1}')->namespace('V1')->middleware('api')->name('api.')->group(function () {
// // Route::middleware('auth:api')->get('/user', function (Request $request) {
    
//     Route::post('/vote/step/user', 'StepUser')->name('step_user');
// });


Route::pattern('apiVersion1', 'v[1]');
Route::group(['prefix' => '{apiVersion1}', 'namespace' => 'Api\V1'], function () {
    Route::group(['prefix' => 'product', 'namespace' => 'Product'], function () {
        Route::get('/index', 'Index');
    });
});
