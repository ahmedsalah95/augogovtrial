<?php

namespace App\Http\Controllers;

use App\Instance_Request;
use Illuminate\Http\Request;

class instancerequestController extends Controller
{
    public function createInstanceRequest(Request $request)
    {
        $requestInstance =  new Instance_Request();
        $requestInstance->request_id = $request->request_id;
        $requestInstance->structure_id = $request->structure_id;
        $requestInstance->customer_id = $request->customer_id;

        $requestInstance->save();
        return response()->json(['instance',"saved"],200);
    }

    public function selectAddressStructure()
    {


    }

    public function checkTheApplication()
    {

    }
}
