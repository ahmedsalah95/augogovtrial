<?php

namespace App\Http\Controllers;

use App\Instance_Attachment;
use App\Instance_Fees;
use App\Instance_Fees_Details;
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
    public function instanceAttachments(Request $request)
    {
        $i = new Instance_Attachment();
        $i->attachment_id = $request->attachment_id;
        $i->cat = $request->cat;
        $i->ORG_id = $request->ORG_id;
        $i->Archived = $request->Archived;
        $i->Received =$request->Received;
        $i->deleted = $request->deleted;
        $i->mandatory_optional = $request->mandatory_optional;
        $i->archive_document_id = $i->archive_document_id;
        $i->save();
        return response()->json(['instance attachment',"saved"],200);

    }

    public function instanceFees(Request $request)
    {
        $i = new Instance_Fees();

        $i->request_step_id = $request->request_step_id;
        $i->instance_request_id = $request->instance_request_id;
        $i->fees_id = $request->fees_id;
        $i->ORG_id = $request->ORG_id;
        $i->customer_id = $request->customer_id;
        $i->receptor_empid = $request->receptor_empid;
        $i->evaluation_date = $request->evaluation_date;
        $i->total = $request->total;
        $i->payment_date = $request->payment_date;
        $i->treasure_number = $request->treasure_number;
        $i->esal_number = $request->esal_number;
        $i-> evaluator_empid= $request->evaluator_empid;
        $i-> payed_requeststep_id= $request->payed_requeststep_id;
        $i->payed_value = $request->payed_value;
        $i->return_percentage = $request->return_percentage;
        $i->notes = $request->notes;
        $i->installment_number = $request->installment_number;
        $i->payment_type = $request->payment_type;
        $i->LUS_id = $request->LUS_id;
        $i->canceled = $request->canceled;
        $i->check_number = $request->check_number;
        $i->check_bank_id = $request->check_bank_id;
        $i->check_date = $request->check_date;
        $i->check_value = $request->check_value;
        $i->save();
        return response()->json(['instance fees',"saved"],200);





    }

    public function instanceFeesDetails(Request $request)
    {
        $i = new Instance_Fees_Details;
        $i->request_step_id = $request->request_step_id;
        $i->fees_id = $request->fees_id;
        $i->container_id = $request->container_id;
        $i->value = $request->value;
        $i->save();
        return response()->json(['instance fees details',"saved"],200);
    }

    public function instanceInspection(Request $request)
    {
        $i = new Instance_Request();
        $i->Request_Step_id = $request->Request_Step_id;
        $i->Instance_id  = $request->Instance_id;
        $i-> ORG_id = $request->ORG_id;
        $i->Employee_id  = $request->Employee_id;
        $i->Inspection_Date  = $request->Inspection_Date;
        $i->Status  = $request->Status;
        $i->Notes  = $request->Notes;
        $i-> Receiving_Date = $request->Receiving_Date;
        $i->Received_Request_Step_id  = $request->Received_Request_Step_id;
        $i->save();
        return response()->json(['instance request',"saved"],200);
    }
}
