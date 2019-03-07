<?php

namespace App\Http\Controllers;

use App\Address_structure;
use App\LUS;
use App\LUS_Decision;
use Illuminate\Http\Request;

class LusController extends Controller
{

    public function LusAdd(Request $request)
    {
        $this->validate($request, [


            'LUS_Type_id' => 'required',
            'OwnerShip_Type_id'=>'required',
            'D_West' => 'required',
            'D_East' => 'required',
            'D_South' => 'required',
            'D_North' => 'required',
            'P_West' => 'required',
            'P_East' => 'required',
            'P_South' => 'required',
            'P_North' => 'required',

            'Address_desc'=>'required'

        ]);

        $lus = new LUS();
        $lus->user_id = $request->user_id;
        $lus->Structure_id = $request->Structure_id;
        $lus->Payment_Type_id=$request->Payment_Type_id;
        $lus->Law_id = $request->Law_id;
        $lus->Structure_id = $request->Structure_id;
        $lus->LUS_Type_id = $request->LUS_Type_id;
        $lus->OwnerShip_Type_id = $request->OwnerShip_Type_id;
        $lus->D_West = $request->D_West;
        $lus->D_East = $request->D_East;
        $lus->D_South = $request->D_South;
        $lus->D_North = $request->D_North;
        $lus->P_West = $request->P_West;
        $lus->P_South = $request->P_South;
        $lus->P_North = $request->P_North;

        $lus->Address_desc = $request->Address_desc;

        $lus->save();

        return response()->json(['success',"success"],200);





    }

    public function setDecision(Request $request)
    {
        $this->validate($request,[
            'ORG_id'=>'required',
            'LUS_id'=>'required',
            'Decision_Number'=>'required',
            'Decision_Date'=>'required',
            'Notes'=>'required',
            'External_ORG'=>'required'
        ]);

        $decision = New LUS_Decision();
        $decision->ORG_id = $request->ORG_id;
        $decision->LUS_id = $request->LUS_id;
        $decision->Decision_Number=$request->Decision_Number;
        $decision->Decision_Date = $request->Decision_Date;
        $decision->Notes = $request->Notes;
        $decision->External_ORG=$request->External_ORG;

        $decision->save();
        return response()->json(['success',"success"],200);


    }
}
