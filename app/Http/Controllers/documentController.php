<?php

namespace App\Http\Controllers;

use App\App_Report;
use App\Document;
use App\Document_Delivery;
use App\Form;
use App\Request_Fees;
use App\Request_Step;
use Illuminate\Http\Request;

class documentController extends Controller
{

    public function attachedDoc(Request $request)
    {

    }

    public function documentDeliveries(Request $request)
    {
        $doc = new Document_Delivery();
        $doc->instance_id = $request->instance_id;
        $doc->notes = $request->notes;
        $doc->request_step_id = $request->request_step_id;
        $doc->deliver_data = $request->deliver_data;
        $doc->ORG_id = $request->ORG_id;

        $doc->save();
        return response()->json(['document deliveries',"saved"],200);

    }



}
