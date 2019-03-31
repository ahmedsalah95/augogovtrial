<?php

namespace App\Http\Controllers;

use App\Address_item;
use App\Address_item_instance;
use App\Address_structure;
use App\Request_Fees;
use Illuminate\Http\Request;

class addressStructureController extends Controller
{


    public function insertAddressItem(Request $request)
    {
        $this->validate($request,[

            'item_name' =>'required',
            'item_cost'=>'required',
            'item_digit'=>'required'

        ]);

        $add = new Address_item();
        $add->item_name = $request->item_name;
        $add->item_cost = $request->item_cost;
        $add->item_digit = $request->item_digit;

        $add->save();

        $authorized = Address_item::where('id',$add->id)->get();
        return response()->json(['address item',$authorized],200);

    }

    public function insertAddressItemInstance(Request $request)
    {
        $this->validate($request,[

            'item_id' =>'required',
            'instance_name'=>'required',
            'instance_code'=>'required'

        ]);

        $add = new Address_item_instance();
        $add->item_id = $request->item_id;
        $add->instance_name = $request->instance_name;
        $add->instance_code = $request->instance_code;

        $add->save();

        $authorized = Address_item_instance::where('id',$add->id)->get();
        return response()->json(['address item instance',$authorized],200);

    }

    public function insertAddressStructure(Request $request)
    {
        $this->validate($request,[

            'instance_id' =>'required',
            'structure_id_parent'=>'required',
            'acc_code'=>'required',
            'acc_address'=>'required'

        ]);

        $add = new Address_structure();
        $add->instance_id = $request->instance_id;
        $add->structure_id_parent = $request->structure_id_parent;
        $add->acc_code = $request->acc_code;
        $add->acc_address = $request->acc_address;

        $add->save();


        $authorized = Address_structure::where('id',$add->id)->get();
        return response()->json(['address Structure',$authorized],200);

    }

    public function getAddressItems(Request $request)
    {
        $items = Address_item::where('id',$request->id)->get();

        return response()->json(['address items', $items],200);
    }
    public function getAddressItemsInstance(Request $request)
    {
        $instance = Address_item_instance::where('id',$request->id)->get();

        return response()->json(['address items instance', $instance],200);
    }
    public function getAddressStructure(Request $request)
    {
        $address = Address_structure::where('id',$request->id)->get();

        return response()->json(['address structure', $address],200);
    }

}
