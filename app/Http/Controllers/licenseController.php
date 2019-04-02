<?php

namespace App\Http\Controllers;

use App\Build_License_Request;
use App\Building_license;
use App\License_Reports;
use App\License_Types;
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
    public function insertBuildingLicense(Request $request)
    {
        $license = new Building_license();
        $license->ORG_id = $request->ORG_id;
        $license->Buliding_Type_id = $request->Buliding_Type_id;
        $license->Ref_license = $request->Ref_license;
        $license->Postal_Address = $request->Postal_Address;
        $license->Supervisor_Eng_id = $request->Supervisor_Eng_id;
        $license->Designer_Eng_id = $request->Designer_Eng_id;
        $license->License_Type = $request->License_Type;
        $license->Working_Area = $request->Working_Area;
        $license->TotalCost = $request->TotalCost;
        $license->User_ID = $request->User_ID;

        $license->save();

        return response()->json(['license',"saved"],200);

    }

    public function insertBuildingLicenseRequest(Request $request)
    {
        $licensereq = new Build_License_Request();
        $licensereq->Build_License_id = $request->Build_License_id;
        $licensereq->License_Type = $request->License_Type;
        $licensereq->Supervisor_Eng_id = $request->Supervisor_Eng_id;
        $licensereq->Designer_Eng_id = $request->Designer_Eng_id;
        $licensereq->License_Type = $request->License_Type;
        $licensereq->Working_Area = $request->Working_Area;
        $licensereq->Building_Type = $request->Building_Type;

        $licensereq->save();

        return response()->json(['license request',"saved"],200);

    }
}
