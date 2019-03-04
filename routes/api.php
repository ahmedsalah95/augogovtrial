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
Route::post('/citizen/insert','LookupController@insertCitizen');
Route::post('/buildingType/insert','LookupController@insertBuildingType');
Route::post('/distinctionType/insert','LookupController@insertDistinctionType');
Route::post('/assignationType/insert','LookupController@insertAssignationType');
Route::post('/document/insert','LookupController@insertDocument');
Route::post('/fees/insert','LookupController@insertFees');
Route::post('/payment/insert','LookupController@insertPayment');
Route::post('/request/insert','LookupController@insertRequest');











/*Route::post('/fees/store','FeesController@store');
Route::post('/document/store','DocumentController@store');
Route::post('/request/store','RequestController@store');
Route::post('/BuildingType/store','BuildingTypeController@store');
Route::post('/PaymentType/store','PaymentTypeController@store');
Route::post('/DistinctionType/insertType','BuildingTypeController@insertDistinctionType');
Route::post('/insertAssignationType/insertType','BuildingTypeController@insertAssignationType');*/



Route::post('/user/login','UserController@login');

