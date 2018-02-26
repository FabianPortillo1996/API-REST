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
Route::post('login', 'Passport\PassportController@login');
Route::post('register', 'Passport\PassportController@register');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('get-details', 'Passport\PassportController@getDetails');
});

Route::apiResource('users','UserController');
Route::apiResource('restaurants','RestaurantsController');