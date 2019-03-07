<?php

namespace App\Http\Controllers;

use App\Address_structure;
use App\LUS;
use Illuminate\Http\Request;

class LusController extends Controller
{

    public function LusAdd(Request $request)
    {
        $this->validate($request, [

            'Structure_id' => 'required',
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
            'Structure_id'=>'required',
            'Address_desc'=>'required'

        ]);

        $lus = new LUS();

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
        $lus->Structure_id = $request->Structure_id;
        $lus->Address_desc = $request->Address_desc;

        $lus->save();

        return response()->json(['success',"success"],200);





    }
}
