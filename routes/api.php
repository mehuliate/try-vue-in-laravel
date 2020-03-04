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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/login', 'Auth\LoginController@login');

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/logout', 'Auth\LoginController@logout');
    Route::resource('/outlets', 'API\OutletController')->except(['show']);
    // Route::post('/couriers/{id}', 'API\UserController')->name('couriers.update');
    Route::resource('/couriers', 'API\UserController')->except(['create', 'show', 'update']);
});