<?php

namespace App\Http\Controllers;

use App\Irregularite;
use App\Irregularites_Request;
use App\Irregularites_Type;
use Illuminate\Http\Request;

class irregularitesController extends Controller
{
    public function irregularites(Request $request)
    {
        $r = new Irregularite();
        $r->ORG_id = $request->ORG_id;
        $r->inspection_id = $request->inspection_id;
        $r->employee_id = $request->employee_id;
        $r->user_id = $request->user_id;
        $r->lus_id = $request->lus_id;
        $r->c_instanceid = $request->c_instanceid;
        $r->description = $request->description;
        $r->irreg_date = $request->irreg_date;
        $r->commette_report = $request->commette_report;
        $r->penalty_value = $request->penalty_value;
        $r->modify_drawing = $request->modify_drawing;
        $r->modification_description = $request->modification_description;
        $r->elimination = $request->elimination;
        $r->elimination_description = $request->elimination_description;
        $r->irreg_corrected = $request->irreg_corrected;
        $r->policies = $request->policies;
        $r->notes = $request->notes;
        $r->penalty_date = $request->penalty_date;
        $r->penality_isal_number = $request->penality_isal_number;

        $r->save();
        return response()->json(['irregularites',"saved"],200);


    }
    public function irregularitesRequest(Request $request)
    {
        $r = new Irregularites_Request();
        $r->irreg_id = $request->irreg_id;
        $r->lus_id = $request->lus_id;
        $r->ORG_id = $request->ORG_id;
        $r->user_id = $request->user_id;
        $r->penality_value = $request->penality_value;
        $r->description = $request->description;
        $r->save();
        return response()->json(['irregularites request',"saved"],200);
    }

    public function irregularitesTypes(Request $request)
    {
        $r = new Irregularites_Type();
        $r->irreg_name = $request->irreg_name;
        $r->irreg_description = $request->irreg_description;
        $r->ORG_id = $request->ORG_id;
        $r->save();
        return response()->json(['irregularites types',"saved"],200);

    }
    // we still need to build another irregularitites types function for the other model

}
