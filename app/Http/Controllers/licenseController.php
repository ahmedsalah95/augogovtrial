<?php

namespace App\Http\Controllers;

use App\License_Cost_Item;
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
}
