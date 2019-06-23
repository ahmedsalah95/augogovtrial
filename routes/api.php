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


// add customer added here to be able to make a new instance
Route::post('customer','UserController@addCustomer');
Route::get('customers/get','UserController@getCustomers');
Route::post('/getuser','UserController@getuser'); // added by ahmed salah

//Building types
Route::post('/buildingType/insert','LookupController@insertBuildingType');
Route::post('/buildingType/fetch','LookupController@fetchBuildingType');
Route::get('/buildingType/get','LookupController@getBuildingTypes');

//Assignation types
Route::post('/assignationType/fetch','LookupController@fetchDistinctionTypes');
Route::get('/assignationType/get','LookupController@getDistinctionType');

//distinction types
Route::post('/distinctionsTypes/fetch','LookupController@fetchAssignationType');
Route::get('/distinctionsTypes/get','LookupController@getAssignationType');

//Payment types
Route::post('/paymentTypes/fetch','LookupController@fetchPaymentTypes');
Route::get('/paymentTypes/get','LookupController@getPaymentTypes');

//Ownership types
Route::post('/ownershipTypes/fetch','LookupController@fetchOwnershipTypes');
Route::get('/ownershipTypes/get','LookupController@getOwnershipTypes');

//Usage types
Route::post('/usageTypes/fetch','LookupController@fetchUsageTypes');
Route::get('/usageTypes/get','LookupController@getUsageTypes');

//Irreg types
Route::post('/irregTypes/fetch','LookupController@fetchIrregTypes');
Route::get('/irregTypes/get','LookupController@getIrregTypes');

//Documents
Route::post('/documents/fetch','LookupController@fetchDocuments');
Route::get('/documents/get','LookupController@getDocuments');
Route::post('/documentsByReqId/get','LookupController@getDocumentsByReqId');

//Fees
Route::post('/fees/fetch','LookupController@fetchFees');
Route::get('/fees/get','LookupController@getFees');

//Addresses Structures
Route::post('/address-items/fetch','addressStructureController@fetchAddressItems');
Route::post('/address-items-instances/fetch','addressStructureController@fetchAddressItemsInstances');
Route::post('/address-structures/fetch','addressStructureController@fetchAddressStructures');
Route::get('/address-items/get','addressStructureController@getAddressItems');
Route::get('/address-items-instances/get','addressStructureController@getAddressItemsInstances');
Route::get('/address-structures/get','addressStructureController@getAddressStructures');


Route::post('/assignedInspector/insert','inspectionController@insertAssignedInspectors');
Route::post('/attachment/insert','LookupController@insertAttachment');
Route::post('/container/insert','LookupController@insertContainer');

//Modules
Route::post('/insert/module','LookupController@inserModule');

//Departments
Route::post('/orgStructure/fetch','LookupController@fetchDepartments');
Route::get('/orgStructures/get','LookupController@getDepartments');

//Validity Certificate
Route::post('/insert/validityCertificate','LookupController@validityCertificate');

//Authentication
Route::post('/user/login','UserController@login');
Route::post('/user/register','UserController@register');

//Citizens
Route::post('/citizen/insert','LookupController@insertCitizen');
Route::get('/citizens/get','LookupController@getCitizens');

//Employees
Route::post('/employees/fetch','UserController@fetchEmployees');
Route::get('/employees/get','UserController@getEmployees');

//Users
Route::post('/users/fetch','UserController@fetchUsers');
Route::get('/users/get','UserController@getUsers');

// added by ahmed salah 9:59

Route::get('/user/getUserByNationalId/{id}','UserController@getUserByNationalId');
Route::post('/user/getCitizenByNationalId','UserController@getCitizenByNationalId');


Route::post('/user/updateUserAndCitizen','UserController@updateUserAndCitizen');

//Requests
Route::post('/requests/fetch','requestController@fetchRequests');
Route::post('/generateTransaction','transactionController@generateTransaction');

//Used in Ionic App
//Another version of fetchTransactions function
Route::post('/transactions/fetchSec','requestController@fetchTransactionsSecV');

//Transactions
Route::post('instanceRequest/fetch','instancerequestController@instanceRequestFetch');
Route::post('request/insert','LookupController@insertRequest');
Route::post('transaction/insert','transactionController@insertTransaction');
Route::get('request-instance/get/{id}','instancerequestController@getRequestInstance');
Route::get('requests-instances/get','instancerequestController@getRequestsInstances');
Route::get('transaction/get','instancerequestController@getTransaction');
Route::get('transactions/get','instancerequestController@getTransactions'); 
Route::get('requests/get','LookupController@getRequests');
Route::get('requestById/get','LookupController@getRequestByID');
Route::post('feesByReqId/get','LookupController@getFeesByRequestId');
Route::post('reportRequest','requestController@reportRequest');

//License
Route::post('/licenseReport','licenseController@licenseReport');
Route::post('/licenses','licenseController@licenses');
Route::post('license/insert','licenseController@insertLicense');
Route::post('building-license/insert','licenseController@insertBuildingLicense');
Route::post('/licenseRequest/insert','licenseController@insertBuildingLicenseRequest');
Route::get('/licenseType','licenseController@licenseType');

//License Types
Route::post('/licenseType/insert','LookupController@insertLicenseType');
Route::post('/licenseType/fetch','LookupController@fetchLicenseTypes');
Route::get('/licenseType/get','LookupController@getLicenseTypes');

//BuildingCost
Route::post('/assignBuildingCost','licenseController@AssignBuildingCost');

//Announce types
Route::post('announceType/insert','LookupController@insertAnnounceType');
Route::post('announceType/fetch','LookupController@fetchannounceTypes');
Route::get('announceType/get','LookupController@getannounceTypes');

//Document delivery
Route::post('/documentDeliveries','documentController@documentDeliveries');

//Groups
Route::post('/group/insert','LookupController@insertGroup');
Route::post('/groupUsers/fetch','LookupController@fetchGroupUsers');
Route::get('/groups/get', 'LookupController@getGroups');
Route::get('/groupUsers/get', 'LookupController@getGroupUsers');

//Inspections
Route::post('/inspections','inspectionController@inspections');
Route::post('inspectionDetermine','inspectionController@inspectionDetermine');
Route::post('instanceAttachments','instancerequest@instanceAttachments');
Route::post('instanceFees','instancerequestController@instanceFees');
Route::post('instanceFeesDetails','instancerequestController@instanceFeesDetails');
Route::post('instanceInspection','instancerequestController@instanceInspection');

//Irregularities
Route::post('/irregularites','irregularitesController@irregularites');
Route::post('/irregularitesRequest','irregularitesController@irregularitesRequest');
Route::post('/irregularitesTypes','irregularitesController@irregularitesTypes');

//Land
Route::post('land','landController@land');
Route::post('lus','landController@lus');
Route::post('lusDecision','landController@lusDecision');
Route::post('lusAssignation','landController@lusAssignation');
Route::post('/lus/add','LusController@LusAdd');
Route::post('/lus/setDecision','LusController@setDecision');

//Complain and Replies
Route::post('makeComplain','ComplainsController@makeComplain');
Route::post('makeReply','ComplainsController@makeReply');
Route::post('fetchComplainsAndReplies','ComplainsController@fetchComplainsAndReplies');
Route::post('getReplies','ComplainsController@getReplies');
//complains added by ahmed salah
Route::post('makeComplain','ComplainsController@makeComplain');
//Route::get('getImageComplain/{id}','ComplainsController@getImageComplain');
// replies added by ahmedsalah
Route::post('makeRep','ComplainsController@makeRep');
Route::get('getImageReply/{id}','ComplainsController@getImageReply');

// get all complains by national id

Route::get('getComplainWithNationalId/{natId}','ComplainsController@getComplainWithNationalId');

// get all complains
Route::get('getComplains','ComplainsController@getComplains');


//forms
Route::post('forms/fetch', 'LookupController@fetchForms');
Route::post('forms/insert', 'LookupController@insertForm');
Route::get('forms/get', 'LookupController@getForms');

//Privileges
Route::post('privileges/fetch', 'requestController@fetchPrivileges');
Route::get('privileges/get', 'requestController@getPrivileges');

//engineering office getEngineeringOffice
Route::get('engineering-office/get', 'LookupController@getEngineeringOffice');


//update instances's routes by abdelhameed needed by shaaer

Route::post('instance-request/update', 'LookupController@updateInstanceRequest');
Route::post('transaction/update', 'LookupController@updateTransaction');
Route::post('building-license/update', 'LookupController@updateBuildingLicense');
Route::post('building-license-request/update', 'LookupController@updateBuildingLicenseRequest');
Route::post('license/update', 'LookupController@updateLicense');

//gets functions by abdelhameed needed by shaaer
Route::get('engineering-offices/get','LookupController@getEngineeringOffices');
Route::get('engineers/get','LookupController@getEngineers');
Route::get('lands/get','LookupController@getLands');
Route::get('lus-decisions/get','LookupController@getLusDecisions');
Route::get('validity-certificates/get','LookupController@getValidityCertificates');
Route::get('all-lus/get','LookupController@getAllLus');

Route::get('validity-certificates/get/{citizen_id}','LookupController@getCitizenValidityCertificates');
Route::get('validity-certificate/get/{citizen_id}/{lus_id}','LookupController@getCitizenValidityCertificate');

Route::get('all-citizen-lus/get/{citizen_id}','LookupController@getAllCitizenLus');
Route::get('citizen-lus/get/{citizen_id}/{lus_id}','LookupController@getCitizenLus');

Route::get('citizen-lus-decisions/get/{citizen_id}','LookupController@getCitizenLusDecisions');
Route::get('citizen-lus-decision/get/{citizen_id}/{lus_id}','LookupController@getCitizenLusDecision');


Route::post('test/update','licenseController@testLicenseUpdate');


// transactions by ahmed salah

Route::post('getTransactionData','instancerequestController@getTransactionData');
