<?php

namespace App\Http\Controllers;

use App\Assigned_Inspectors;
use App\Inspection;
use App\Inspection_Determine;
use Illuminate\Http\Request;

class inspectionController extends Controller
{
    public function insertAssignedInspectors(Request $request)
    {
        $inspector = new Assigned_Inspectors();
        $inspector->id = $request->id;
        $inspector->Inspection_id = $request->Inspection_id;
        $inspector->Employee_id = $request->Employee_id;
        $inspector->ORG_id = $request->ORG_id;
        $inspector->User_id = $request->User_id;
        $inspector->save();

        $authorized = Assigned_Inspectors::where('id', $request->id)->get();

        return response()->json(['success', $authorized], 200);

    }

    public function inspections(Request $request)
    {
        $i = new Inspection();
        $i->user_id = $request->user_id;
        $i->ORG_id = $request->ORG_id;
        $i->instance_id = $request->instance_id;
        $i->lus_id = $request->lus_id;
        $i->inspection_date = $request->inspection_date;
        $i->scheduled_date = $request->scheduled_date;
        $i->no_need = $request->no_need;
        $i->irregulatries = $request->irregulatries;
        $i->determine_request_step_id = $request->determine_request_step_id;
        $i->inspection_request_step_id = $request->inspection_request_step_id;
        $i->monitor_request_step_id = $request->monitor_request_step_id;
        $i->lus_area = $request->lus_area;
        $i->islus_identical = $request->islus_identical;
        $i->difference_value = $request->difference_value;
        $i->building_completed = $request->building_completed;
        $i->inspection_result = $request->inspection_result;
        $i->no_building = $request->no_building;
        $i->elec_source_exist = $request->elec_source_exist;
        $i->exec_percentage = $request->exec_percentage;
        $i->notes = $request->notes;
        $i->item_id = $request->item_id;
        $i->percentage = $request->percentage;
        $i->lus_child_id = $request->lus_child_id;
        $i->orgstructure_id = $request->orgstructure_id;
        $i->re_inspection = $request->re_inspection;
        $i->exec_item_notes = $request->exec_item_notes;
        $i->release_date = $request->release_date;
        $i->save();
        return response()->json(['inspection', 'saved'], 200);

    }

    public function inspectionDetermine(Request $request)
    {
        $i = new Inspection_Determine();
        $i->request_step_id = $request->request_step_id;
        $i->instance_id = $request->instance_id;
        $i->ORG_id = $request->ORG_id;
        $i->employee_id = $request->employee_id;
        $i->inspection_date = $request->inspection_date;
        $i->status = $request->status;
        $i->notes = $request->notes;
        $i->receiving_date = $request->receiving_date;
        $i->received_request_step_id = $request->received_request_step_id;

        $i->save();
        return response()->json(['inspection determine',"saved"],200);

    }
}
