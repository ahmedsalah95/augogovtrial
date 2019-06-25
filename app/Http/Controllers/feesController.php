<?php

namespace App\Http\Controllers;

use App\Instance_Fees;
use App\Instance_Fees_Details;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;
use Illuminate\Support\facades\Schema;

class feesController extends Controller
{

    public function updateInstanceFees(Request $request)
    {
        $instance_request_id = $request->data["instance_request_id"];
        $attributes = $request->data["attributes"];
        $tableColumns = Schema::getColumnListing('instance__fees');

        $instanceFees = Instance_Fees::where("instance_request_id", $instance_request_id)->first();
        foreach ($attributes as $key => $value)
        {
            if(in_array($key, $tableColumns)){
                if($value){
                    $instanceFees[$key] = $value;
                }else{
                    $attributes[$key] = $instanceFees[$key];
                }
            }
        }
        $instanceFees->save();

        $data = [
            'instance_fees'=>$instanceFees,
            'attributes'=>$attributes
        ];
        
        return response()->json($data);

    }
    
    public function fetchInstanceFeesDetails(Request $request)
    {
        $instance_request_id = $request->data["instance_request_id"];
        $request_step_id = $request->data["request_step_id"];

        $fees_details = [];
        foreach ($request->data["fees_details"] as $feeDetail)
        {
            $newFeeDetail = new Instance_Fees_Details();
            $newFeeDetail->fees_id = $feeDetail["id"];
            $newFeeDetail->value = $feeDetail["value"];
            $newFeeDetail->instance_request_id = $instance_request_id;
            $newFeeDetail->request_step_id = $request_step_id;
            $newFeeDetail->save();
            array_push($fees_details, $newFeeDetail);
        }
        return response()->json(["fees_details"=>$fees_details]);

    }
}
