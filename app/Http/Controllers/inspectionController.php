<?php

namespace App\Http\Controllers;

use App\Assigned_Inspectors;
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

        return response()->json(['success',$authorized], 200);

    }
}
