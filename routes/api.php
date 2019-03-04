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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

*/
Route::post('/citizen/store','CitizenController@store');
Route::post('/fees/store','FeesController@store');
Route::post('/document/store','DocumentController@store');
Route::post('/request/store','RequestController@store');
Route::post('/BuildingType/store','BuildingTypeController@store');


Route::post('/user/login','UserController@login');

