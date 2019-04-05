<?php

namespace App\Http\Controllers;

use App\Lands;
use Illuminate\Http\Request;

class landController extends Controller
{
    public function land(Request $request)
    {
        $l = new Lands();
        $l->LUS_id = $request->LUS_id;
        $l->LUS_ORG_id = $request->LUS_ORG_id;
        $l->User_id = $request->User_id;
        $l->ORG_id = $request->ORG_id;
        $l->Stage = $request->Stage;
        $l->Virtual = $request->Virtual;
        $l->Merged = $request->Merged;
        $l->Divided = $request->Divided;
        $l->Mortgage = $request->Mortgage;
        $l->Zero_Base = $request->Zero_Base;
        $l->General_Conditions = $request->General_Conditions;
        $l->Max_altitude = $request->Max_altitude;
        $l->North_RODOD = $request->North_RODOD;
        $l->South_RODOD = $request->South_RODOD;
        $l->West_RODOD = $request->West_RODOD;
        $l->East_RODOD = $request->East_RODOD;
        $l->Building_Percentage = $request->Building_Percentage;
        $l->P_East = $request->P_East;
        $l->P_West = $request->P_West;
        $l->P_South = $request->P_South;
        $l->P_North = $request->P_North;
        $l->Image_Path = $request->Image_Path;
        $l->BUiLD_DeNSITY = $request->BUiLD_DeNSITY;
        $l->save();
        return response()->json(['land',"saved"],200);

    }
}
