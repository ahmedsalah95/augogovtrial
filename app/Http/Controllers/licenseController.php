<?php

namespace App\Http\Controllers;

use App\Build_License_Request;
use App\Building_license;
use App\License;
use App\License_Cost_Item;
use App\License_Reports;
use App\License_Types;
use App\Validity_Certificate;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Support\facades\Schema;
use Illuminate\Http\Request;

class licenseController extends Controller
{
    public function licenseType(Request $request)
    {
        $li = new License_Types();
        $li->save();
        return response()->json(['license',"saved"],200);


    }

    public function licenseReport(Request $request)
    {
        $li = new License_Reports();
        $li->ORG_id = $request->ORG_id;
        $li->ReportName_EN = $request->ReportName_EN;
        $li->ReportName_AR = $request->ReportName_AR;

        $li->save();
        return response()->json(['license',"saved"],200);

    }
    public function insertLicense(Request $request)
    {
        $requestInstanceID = $request->data["request_instance_id"];
        $transactionID = $request->data["transaction_id"];
        $lusID = $request->data["lus_id"];

        $license = new License();
        $license->License_Year = strval(Carbon::now()->year);
        $license->Instance_id = $requestInstanceID;
        $license->Transaction_id = $transactionID;
        $license->LUS_id = $lusID;
        $license->save();
        $license->License_Number = $license->id;
        $license->save();

        $transaction = Transaction::find($transactionID);
        $transaction->License_Id = $license->id;
        $transaction->save();
        
        return response()->json(['license'=>$license]);

    }
    public function insertBuildingLicense(Request $request)
    {
        
        $licenseID = $request->data["license_id"];

        $buildingLicense = new Building_license();
        $buildingLicense->license_id = $licenseID;
        // $license->User_ID = $request->User_ID;

        $buildingLicense->save();

        $license = License::find($licenseID);

        $buildingLicenseRequest = $this->insertBuildingLicenseRequest($buildingLicense->id, $license->Instance_id);

        $data = [
            "license" =>$license,
            "building_license" =>$buildingLicense,
            "building_license_request" =>$buildingLicenseRequest
        ];

        return response()->json($data);

    }

    public function insertBuildingLicenseRequest($buildingLicenseId, $requestInstanceID)
    {
        $licensereq = new Build_License_Request();
        $licensereq->Build_License_id = $buildingLicenseId;
        $licensereq->Instance_id = $requestInstanceID;
        $licensereq->save();

        return $licensereq;
    }

    public function AssignBuildingCost(Request $request)
    {
        $li = new License_Cost_Item();
        $li->building_cost_id = $request->building_cost_id;
        $li->item_id = $request->item_id;
        $li->ORG_id = $request->ORG_id;
        $li->item_name = $request->item_name;
        $li->unit_price = $request->unit_price;
        $li->discountprecent = $request->discountprecent;

        $li->save();
        return response()->json(['AssignBuildingCost',"saved"],200);

    }

    public function updateBuildingLicense(Request $request)
    {
        $buildingLicenseId = $request->data["building_license_id"];
        $attributes = $request->data["attributes"];
        $tableColumns = Schema::getColumnListing('building_licenses');

        $buildingLicense = Building_license::find($buildingLicenseId);
        foreach ($attributes as $key => $value)
        {
            if(in_array($key, $tableColumns)){
                if($value){
                    $buildingLicense[$key] = $value;
                }else{//will enter the else only when we want to return values from table
                    $attributes[$key] = $buildingLicense[$key];
                }
            }
        }
        $buildingLicense->save();

        $data = [
            'building_license'=>$buildingLicense,
            'attributes'=>$attributes
        ];

        return response()->json($data);
    }

    public function getBuildingLicense($id)
    {
        $buildingLicense = Building_license::find($id);
        return response()->json(['building_license'=>$buildingLicense]);
    }

    public function getBuildingLicenseByLicenseId($licenseId)
    {
        $buildingLicense = Building_license::where("license_id", $licenseId)->first();
        return response()->json(['building_license'=>$buildingLicense]);
    }

    // public function getBuildingLicenseKeysByLicenseId(Request $request, $licenseId)
    // {
    //     $buildingLicense = Building_license::where("license_id", $licenseId)->first();
    //     return response()->json(['building_license'=>$buildingLicense]);
    // }

    public function updateBuildingLicenseRequest(Request $request)
    {
        $requestInstanceId = $request->data["request_instance_id"];
        $attributes = $request->data["attributes"];
        $tableColumns = Schema::getColumnListing('build__license__requests');

        $buildingLicenseRequest = Build_License_Request::where("Instance_id", $requestInstanceId)->first();
        foreach ($attributes as $key => $value)
        {
            if(in_array($key, $tableColumns)){
                if($value){
                    $buildingLicenseRequest[$key] = $value;
                }else{//will enter the else only when we want to return values from table
                    $attributes[$key] = $buildingLicenseRequest[$key];
                }
            }
        }
        $buildingLicenseRequest->save();

        $data = [
            'building_license_request'=>$buildingLicenseRequest,
            'attributes'=>$attributes
        ];

        return response()->json($data);
    }

    public function getBuildingLicenseRequestByRequestInstanceId($request_instance_id)
    {
        $buildingLicenseRequest = Build_License_Request::where("Instance_id", $request_instance_id)->first();
        return response()->json(['building_license_request'=>$buildingLicenseRequest]);
    }

    public function updateLicense(Request $request)
    {
        $id = $request->instance_id;
        $license = License::find($id);
        foreach ($request ["attributes"] as $key => $value)
        {
            $license->$key = $value;
        }
    }
}
