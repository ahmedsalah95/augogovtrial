<?php

namespace App\Http\Controllers;

use Illuminate\Support\facades\Schema;
use App\Transaction;
use App\Instance_Fees;
use Illuminate\Http\Request;

class transactionController extends Controller
{
    // $transaction, $request_instance_id
    public function insertTransaction(Request $request){

        $transaction = $request->data["transaction"];
        $request_instance_id = $request->data["request_instance_id"];

        $newTransaction = new Transaction();
        $newTransaction->Instance_id = $request_instance_id;
        $newTransaction->Request_Step_id = 0;
        $newTransaction->Bond_Agency_id = $transaction["agency"]["id"];
        $newTransaction->LUS_id = $transaction["lus"]["id"];
        $newTransaction->save();

        $instanceFees = new Instance_Fees();
        $instanceFees->instance_request_id = $request_instance_id;
        $instanceFees->save();

        return response()->json(["transaction"=>$newTransaction]);

    }

    public function updateTransaction(Request $request)
    {
        $transactionId = $request->data["transaction_id"];
        $attributes = $request->data["attributes"];
        $tableColumns = Schema::getColumnListing('transactions');

        $transaction = Transaction::find($transactionId);
        foreach ($attributes as $key => $value)
        {
            if(in_array($key, $tableColumns)){
                if($value){
                    $transaction[$key] = $value;
                }else{
                    $attributes[$key] = $transaction[$key];
                }
            }
        }
        $transaction->save();

        $data = [
            'transaction'=>$transaction,
            'attributes'=>$attributes
        ];
        
        return response()->json($data);
    }
}
