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
Route::post('/document/insert','LookupController@fetchDocuments');
Route::post('/fees/insert','LookupController@fetchFees');
Route::post('/payment/insert','LookupController@insertPayment');
Route::post('/request/insert','LookupController@insertRequest');
Route::post('/addressItem/insert','addressStructureController@insertAddressItem');
Route::post('/addressItemInstance/insert','addressStructureController@insertAddressItemInstance');
Route::post('/addressStructure/insert','addressStructureController@insertAddressStructure');
Route::post('/requests/get','LookupController@getRequests');
Route::get('/documents/get','LookupController@getDocuments');
Route::get('/fees/get','LookupController@getFees');
Route::post('/requestById/get','LookupController@getRequestByID');
Route::post('/documentsByReqId/get','LookupController@getDocumentsByReqId');
Route::post('/feesByReqId/get','LookupController@getFeesByRequestId');
Route::post('/fees/update','LookupController@updateFees');
Route::post('/addressItems/get','addressStructureController@getAddressItems');
Route::post('/addressItemsInstance/get','addressStructureController@getAddressItemsInstance');
Route::post('/addressStructure/get','addressStructureController@getAddressStructure');

Route::post('/assignedInspector/insert','inspectionController@insertAssignedInspectors');
Route::post('/attachment/insert','LookupController@insertAttachment');
Route::post('/container/insert','LookupController@insertContainer');
Route::post('/license/insert','licenseController@insertBuildingLicense');
Route::post('/licenseRequest/insert','licenseController@insertBuildingLicenseRequest');




Route::post('/user/login','UserController@login');

Route::post('/user/registerEmployee','UserController@registerEmployee');

Route::post('/lus/add','LusController@LusAdd');


Route::post('/lus/setDecision','LusController@setDecision');


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
Route::post('/licenses','licenseController@licenses');

// transaction

Route::post('/generateTransaction','transactionController@generateTransaction');

Route::post('reportRequest','requestController@reportRequest');

// announce types

Route::post('announceType','LookupController@announceType');

// document delivery
Route::post('/documentDeliveries','documentController@documentDeliveries');

//group

Route::post('/group','LookupController@groups');
Route::post('/groupUser','LookupController@groupUser');

// inspection

Route::post('/inspections','inspectionController@inspections');
Route::post('inspectionDetermine','inspectionController@inspectionDetermine');
Route::post('instanceAttachments','instancerequest@instanceAttachments');
Route::post('instanceFees','instancerequestController@instanceFees');
Route::post('instanceFeesDetails','instancerequestController@instanceFeesDetails');
Route::post('instanceInspection','instancerequestController@instanceInspection');

// irregularities

Route::post('/irregularites','irregularitesController@irregularites');
Route::post('/irregularitesRequest','irregularitesController@irregularitesRequest');
Route::post('/irregularitesTypes','irregularitesController@irregularitesTypes');


// land

Route::post('land','landController@land');
Route::post('lus','landController@lus');
Route::post('lusDecision','landController@lusDecision');
Route::post('lusAssignation','landController@lusAssignation');