<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class transactionController extends Controller
{
    // $transaction, $request_instance_id
    public function insertTransaction(Request $request){

        $transaction = $request->data["transaction"];
        $request_instance_id = $request->data["request_instance_id"];

        $newTransaction = new Transaction();
        $newTransaction->Instance_id = $request_instance_id;
        $newTransaction->Request_Step_id = 1;
        $newTransaction->Bond_Agency_id = $transaction["agency"]["id"];
        $newTransaction->LUS_id = $transaction["lus"]["id"];
        $newTransaction->save();

        return response()->json(["transaction"=>$newTransaction]);

    }
}
