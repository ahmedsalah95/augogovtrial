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
Route::get('/citizens/get','LookupController@getCitizens');
Route::post('/buildingType/insert','LookupController@insertBuildingType');
Route::post('/distinctionType/insert','LookupController@insertDistinctionType');
Route::post('/assignationType/insert','LookupController@insertAssignationType');
Route::post('/documents/fetch','LookupController@fetchDocuments');
Route::post('/fees/fetch','LookupController@fetchFees');
Route::post('/payment/insert','LookupController@insertPayment');
Route::post('/request/insert','LookupController@insertRequest');
Route::post('/addressItem/insert','addressStructureController@insertAddressItem');
Route::post('/addressItemInstance/insert','addressStructureController@insertAddressItemInstance');
Route::post('/addressStructure/insert','addressStructureController@insertAddressStructure');
Route::post('/requests/get','LookupController@getRequests');

Route::post('/requestById/get','LookupController@getRequestByID');
Route::post('/documentsByReqId/get','LookupController@getDocumentsByReqId');
Route::post('/feesByReqId/get','LookupController@getFeesByRequestId');
Route::post('/fees/update','LookupController@updateFees');
Route::post('/addressItems/get','addressStructureController@getAddressItems');
Route::post('/addressItemsInstance/get','addressStructureController@getAddressItemsInstance');
Route::post('/addressStructure/get','addressStructureController@getAddressStructure');

Route::get('/documents/get','LookupController@getDocuments');
Route::get('/fees/get','LookupController@getFees');

Route::post('/user/login','UserController@login');

Route::post('/employees/fetch','UserController@fetchEmployees');
Route::get('/employees/get','UserController@getEmployees');

Route::post('/users/fetch','UserController@fetchUsers');
Route::post('/users/get','UserController@getUsers');

Route::post('/lus/add','LusController@LusAdd');


Route::post('/lus/setDecision','LusController@setDecision');


Route::post('/transactions/fetch','requestController@fetchTransactions');
Route::post('/createReq','requestController@createRequest');
Route::post('/reqFees','requestController@requestFees');
Route::post('/reqFees','requestController@form');
Route::post('/setSteps','requestController@setSteps');
Route::post('/documents','requestController@setDocument');
Route::post('/reports','requestController@setReports');

//

//Route::post('/attachedDoc','documentController@attachedDoc');

// add customer added here to be able to make a new instance

Route::post('/customer','UserController@addCustomer');

Route::post('/createInstanceRequest','instancerequestController@createInstanceRequest');


// licenses
Route::get('/licenseType','licenseController@licgitenseType');
Route::post('/licenseReport','licenseController@licenseReport');
Route::post('/assignBuildingCost','licenseController@AssignBuildingCost');


// transaction

Route::post('/generateTransaction','transactionController@generateTransaction');

Route::post('reportRequest','requestController@reportRequest');

// announce types

Route::post('announceType','LookupController@announceType');

// document delivery
Route::post('/documentDeliveries','documentController@documentDeliveries');

//group

Route::post('/group','LookupController@groups');