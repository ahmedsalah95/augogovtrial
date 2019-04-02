<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class transactionController extends Controller
{
    public function generateTransaction(Request $request)
    {
        $tr = new Transaction();
        $tr->Request_Step_id = $request->Request_Step_id;
        $tr->ORG_id = $request->ORG_id;
        $tr->Request_id = $request->Request_id;
        $tr->Instance_id = $request->Instance_id;
        $tr->Comit_id = $request->Comit_id;
        $tr->User_id = $request->User_id;
        $tr->LUS_id= $request->LUS_id;
        $tr->License_Id= $request->License_Id;
        $tr->POND_id = $request->POND_id;
        $tr->Transaction_Date = $request->Transaction_Date;
        $tr->Notes = $request->Notes;
        $tr->Canceled = $request->Canceled;
        $tr->Assign_Number = $request->Assign_Number;
        $tr->Activity_Stop_Date = $request->Activity_Stop_Date;
        $tr->Return_Amount = $request->Return_Amount;
        $tr->Mortagage_Transaction_id = $request->Mortagage_Transaction_id;
        $tr->Bond_Agency_id= $request->Bond_Agency_id;
        $tr->Elam_Werasah = $request->Elam_Werasah;
        $tr->Return_Date = $request->Return_Date;
        $tr->Cancel_Type = $request->Cancel_Type;
        $tr->Stop_Reasons = $request->Stop_Reasons;
        $tr->Stop_type_id = $request->LUS_Stop;
        $tr->License_Stop = $request->License_Stop;
        $tr->Stop_Number = $request->Stop_Number;
        $tr->Return_Number = $request->Return_Number;
        $tr->ORGStructure_id = $request->ORGStructure_id;
        $tr->Contr_PayDate = $request->Contr_PayDate;
        $tr->Contr_LitterDate = $request->Contr_LitterDate;
        $tr->Contr_StartDate = $request->Contr_StartDate;
        $tr->Land_Tenure = $request->Land_Tenure;
        $tr->Abdonamal_Type = $request->Abdonamal_Type;
        $tr->AD_Inherit_Number = $request->AD_Inherit_Number;
        $tr->AD_Inherit_Date = $request->AD_Inherit_Date;
        $tr->AD_Inherit_Notes = $request->AD_Inherit_Notes;
        $tr->ABD_Board_Trust_Value = $request->ABD_Board_Trust_Value;
        $tr->ABD_Administrator_Value = $request->ABD_Administrator_Value;
        $tr->ABD_ISAL_Number = $request->ABD_ISAL_Number;
        $tr->ABD_Payed_Date = $request->ABD_Payed_Date;
        $tr->Resumption_Date = $request->Resumption_Date;
        $tr->Daily_Pently = $request->Daily_Pently;
        $tr->Contract_Number = $request->Contract_Number;
        $tr->save();

        return response()->json(['transaction',"saved"],200);

    }
}
