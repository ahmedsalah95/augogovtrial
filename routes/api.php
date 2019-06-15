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

Route::post('/register','UserController@register');

Route::post('/citizen/insert','LookupController@insertCitizen');
Route::get('/citizens/get','LookupController@getCitizens');

//license
Route::post('/licenseType/insert','LookupController@insertLicenseType');
Route::post('/licenseType/fetch','LookupController@fetchLicenseTypes');
Route::get('/licenseType/get','LookupController@getLicenseTypes');

//building types
Route::post('/buildingType/insert','LookupController@insertBuildingType');
Route::post('/buildingType/fetch','LookupController@fetchBuildingType');
Route::get('/buildingType/get','LookupController@getBuildingTypes');

//assignation types
Route::post('/assignationType/insert','LookupController@insertDistinctionType');
Route::post('/assignationType/fetch','LookupController@fetchDistinctionTypes');
Route::get('/assignationType/get','LookupController@getDistinctionType');

//distinction types
Route::post('/distinctionsTypes/insert','LookupController@insertAssignationType');
Route::post('/distinctionsTypes/fetch','LookupController@fetchAssignationType');
Route::get('/distinctionsTypes/get','LookupController@getAssignationType');

//payment types
Route::post('/paymentTypes/insert','LookupController@insertPayment');
Route::post('/paymentTypes/fetch','LookupController@fetchPaymentTypes');
Route::get('/paymentTypes/get','LookupController@getPaymentTypes');

//ownership types
Route::post('/ownershipTypes/insert','LookupController@insertOwnershipType');
Route::post('/ownershipTypes/fetch','LookupController@fetchOwnershipTypes');
Route::get('/ownershipTypes/get','LookupController@getOwnershipTypes');

//Usage types
Route::post('/usageTypes/insert','LookupController@insertUsageType');
Route::post('/usageTypes/fetch','LookupController@fetchUsageTypes');
Route::get('/usageTypes/get','LookupController@getUsageTypes');

//Irreg types
Route::post('/irregTypes/insert','LookupController@insertIrregType');
Route::post('/irregTypes/fetch','LookupController@fetchIrregTypes');
Route::get('/irregTypes/get','LookupController@getIrregTypes');

Route::post('/documents/fetch','LookupController@fetchDocuments');
Route::post('/fees/fetch','LookupController@fetchFees');
Route::post('/request/insert','LookupController@insertRequest');
Route::post('/addressItem/insert','addressStructureController@insertAddressItem');
Route::post('/addressItemInstance/insert','addressStructureController@insertAddressItemInstance');
Route::post('/addressStructure/insert','addressStructureController@insertAddressStructure');
Route::get('/requests/get','LookupController@getRequests');

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


Route::post('/insert/module','LookupController@inserModule');
Route::post('/insert/orgStructure','LookupController@insertOrganizationStructure');
Route::get('/orgStructure/get','LookupController@getDepartments');
Route::post('/orgStructure/fetch','LookupController@fetchDepartments');
Route::post('/insert/usageType','LookupController@insertUsageType');
Route::post('/insert/validityCertificate','LookupController@validityCertificate');


Route::get('/documents/get','LookupController@getDocuments');
Route::get('/fees/get','LookupController@getFees');


Route::post('/user/login','UserController@login');
Route::post('/user/register','UserController@register');

Route::post('/employees/fetch','UserController@fetchEmployees');
Route::get('/employees/get','UserController@getEmployees');

Route::post('/users/fetch','UserController@fetchUsers');
Route::post('/users/get','UserController@getUsers');

Route::post('/lus/add','LusController@LusAdd');


Route::post('/lus/setDecision','LusController@setDecision');


Route::post('/transactions/fetch','requestController@fetchTransactions');

// another version if fetchTransactions function
Route::post('/transactions/fetchSec','requestController@fetchTransactionsSecV');

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

Route::post('/getInstanceRequest','instancerequestController@getInstanceRequest'); //  added by ahmed salah 12/6/2019

// licenses

Route::get('/licenseType','licenseController@licgitenseType');
Route::post('/licenseReport','licenseController@licenseReport');
Route::post('/assignBuildingCost','licenseController@AssignBuildingCost');
Route::post('/licenses','licenseController@licenses');


// transaction

Route::post('/generateTransaction','transactionController@generateTransaction');

Route::post('reportRequest','requestController@reportRequest');

// announce types
Route::post('announceType/insert','LookupController@insertAnnounceType');
Route::post('announceType/fetch','LookupController@fetchannounceTypes');
Route::get('announceType/get','LookupController@getannounceTypes');

// document delivery
Route::post('/documentDeliveries','documentController@documentDeliveries');

//group

Route::post('/group','LookupController@groups');
Route::post('/groupUser','LookupController@groupUser');

Route::post('/groupUsers/fetch','LookupController@fetchGroups');

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

// complain and replies

Route::post('makeComplain','ComplainsController@makeComplain');

Route::post('makeReply','ComplainsController@makeReply');

Route::post('fetchComplainsAndReplies','ComplainsController@fetchComplainsAndReplies');

Route::post('getReplies','ComplainsController@getReplies');


//forms

Route::post('forms/fetch', 'LookupController@fetchForms');
Route::post('forms/insert', 'LookupController@insertForm');
Route::get('forms/get', 'LookupController@getForms');


