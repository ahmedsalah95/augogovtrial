<?php

namespace App\Http\Controllers;

use App\Address_item;
use App\Address_item_instance;
use App\Address_structure;
use App\Request_Fees;
use Illuminate\Http\Request;

class addressStructureController extends Controller
{

    public function fetchAddressItems(Request $request){

        dump($request->data);

        foreach ($request->data as $addressItem)
        {
            if($addressItem["new_address_item"])
            {
                $this->insertAddressItem($addressItem);
            }
            else if($addressItem["deleted"]){
                $this->deleteAddressItem($addressItem["id"]);
            }
        }

    }

    public function insertAddressItem($addressItem)
    {

        $add = new Address_item();
        $add->name = $addressItem["name"];
        $add->code = $addressItem["code"];
        $add->digit = $addressItem["digit"];

        $add->save();

    }

    public function getAddressItems()
    {
        $addressItems = Address_item::all();
        return response()->json(['address_items' => $addressItems],200);
    }

    public function deleteAddressItem($id){
        $addressItem = Address_item::findOrFail($id);
        $addressItem->delete();
    }

    public function fetchAddressItemsInstances(Request $request){
        dump($request->data);

        foreach ($request->data as $addressItemInstance)
        {
            if($addressItemInstance["new_address_item_instance"])
            {
                $this->insertAddressItemInstance($addressItemInstance);
            }
            else if($addressItemInstance["deleted"]){
                $this->deleteAddressItemInstance($addressItemInstance["id"]);
            }
        }
    }

    public function insertAddressItemInstance($addressItemInstance)
    {

        $add = new Address_item_instance();
        $add->address_item_id = $addressItemInstance["address_item"]["id"];
        $add->name = $addressItemInstance["name"];
        $add->code = $addressItemInstance["address_item"]["code"];

        $add->save();

    }

    public function getAddressItemsInstances()
    {
        $addressItemsInstances = Address_item_instance::all();
        return response()->json(['address_items_instances' => $addressItemsInstances],200);
    }

    public function deleteAddressItemInstance($id){
        $addressItemInstance = Address_item_instance::findOrFail($id);
        $addressItemInstance->delete();
    }

    public function fetchAddressStructures(Request $request){
        dump($request->data);

        foreach ($request->data as $addressStructure)
        {
            if($addressStructure["new_address_structure"])
            {
                $this->insertAddressStructure($addressStructure);
            }
            else if($addressStructure["deleted"]){
                $this->deleteAddressStructure($addressStructure["id"]);
            }
        }
    }

    public function insertAddressStructure($addressStructure)
    {

        $newAddressStructure = new Address_structure();
        $newAddressStructure->address_item_instance_id = $addressStructure["address_item_instance"]["id"];
        $newAddressStructure->parent_id = $addressStructure["parent"]["id"];
        $newAddressStructure->acc_code = $addressStructure["accumulated_code"];
        $newAddressStructure->acc_address = $addressStructure["accumulated_address"];

        $newAddressStructure->save();

    }

    public function getAddressStructures()
    {
        $addressStructures = Address_structure::all();

        return response()->json(['address_structures' => $addressStructures],200);
    }

    public function deleteAddressStructure($id){
        $addressStructure = Address_structure::findOrFail($id);
        $addressStructure->delete();
    }

}
