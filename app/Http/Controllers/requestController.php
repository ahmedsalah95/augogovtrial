<?php

namespace App\Http\Controllers;

use App\App_Reports_Request;
use App\Citizen;
use App\Instance_Request;
use App\Request_Document;
use App\Request_Fees;
use App\Request_Step;
use App\Module;
use App\Form;
use App\Group;
use App\Mfp;

use App\Transaction;
use Illuminate\Http\Request;

class requestController extends Controller
{

    public function fetchTransactions(Request $request)
    {

        // dump($request->data[0]["steps"][0]["form"]["id"]);

        foreach ($request->data as $transaction) {
            $new_request = $this->createRequest($transaction);
            // dump($transaction["documents"]);
            $this->setRequestDocuments($transaction["documents"], $new_request->id);
            // dump($transaction["fees"]);
            $this->setRequestFees($transaction["fees"], $new_request->id);
            // dump($transaction["steps"]);
            $this->setRequestSteps($transaction["steps"], $new_request->id);
        }

        return $request;
    }

    public function fetchTransactionsSecV(Request $request)
    {

        $instance_id = Instance_Request::where('id', $request->Instance_id)->get(['customer_id']);
        //$instance_id = Instance_Request::where('id',$request->Instance_id)->get();

        $customer = Citizen::where('id', $instance_id[0]['customer_id'])->get();
        $arr [] = $customer[0];
        $transaction = Transaction::where('instance_id', $request->Instance_id)->get();
        $arr [] = $transaction[0];

        return response()->json($arr, 200);

    }

    public function createRequest($request)
    {
        $req = new \App\Request();

        $req->request_name = $request["name"];
        $req->request_parent =$request["parent"];

        $req->save();


        return $req;
    }

    public function form(Request $request)
    {
        $form = new Form();
        $form->form_name = $request->form_name;

        $form->save();
        return response()->json(['form', "saved"], 200);
    }

    public function setRequestFees($fees, $request_id)
    {

        foreach ($fees as $fee) {
            $RF = new Request_Fees();
            $RF->fees_id = $fee["id"];
            $RF->request_id = $request_id;
            $RF->default_value = $fee["value"];

            $RF->save();
        }


        // return response()->json(['request fees',"saved"],200);
    }

    public function setRequestSteps($steps, $request_id)
    {

        foreach ($steps as $step) {
            $new_step = new Request_Step();
            $new_step->request_id = $request_id;
            $new_step->form_id = $step["form"]["id"];
            $new_step->order_number = $step["order"];
            $new_step->save();
        }

        // return response()->json(['steps',"saved"],200);

    }

    public function setRequestDocuments($documents, $request_id)
    {

        foreach ($documents as $document) {
            $new_document = new Request_Document();
            $new_document->document_id = $document["id"];
            $new_document->request_id = $request_id;
            $new_document->mandatory = $document["mandatory"];
            $new_document->save();
        }

        // return response()->json(['documents',"saved"],200);
    }

    public function setReports(Request $request)
    {
        $reports = new App_Report();

        $reports->ORG_id = $request->ORG_id;
        $reports->reportname_ar = $request->reportname_ar;
        $reports->reportname_en = $request->reportname_en;
        $reports->type_id = $request->type_id;

        $reports->save();
        return response()->json(['reports', "saved"], 200);

    }

    public function reportRequest(Request $request)
    {
        $rr = new App_Reports_Request();
        $rr->report_id = $request->report_id;
        $rr->ORG_id = $request->ORG_id;
        $rr->request_id = $request->request_id;

        $rr->save();
        return response()->json(['report request', "saved"], 200);

    }

    public function getPrivileges(){

        $privileges = Mfp::all();
        $module = Module::all();
        $forms = Form::all();
        $groups = Group::all();

        $data = [
            "privileges" => $privileges,
            "modules" => $module,
            "forms" => $forms,
            "groups" => $groups
        ];

        return response()->json($data, 200);
    }

    public function fetchPrivileges(Request $request)
    {

        dump($request->data);

        foreach ($request->data as $privilege) {
            if ($privilege["new_privilege"])
            {
                $this->insertPrivilege($privilege);
            }
            else if ($privilege["deleted"])
            {
                $this->deletePrivilege($privilege["id"]);
            }
        }

    }

    public function insertPrivilege($privilege){

        $newPrivilege = new Mfp();

        $newPrivilege->module_id = $privilege["module"]["id"];
        $newPrivilege->form_id = $privilege["form"]["id"];
        $newPrivilege->group_id = $privilege["group"]["id"];
        $newPrivilege->name = $privilege["name"];
        $newPrivilege->insert = $privilege["insert_operations"];
        $newPrivilege->update = $privilege["update_operations"];
        $newPrivilege->delete = $privilege["delete_operations"];

        $newPrivilege->save();
        dump($newPrivilege);

        return response()->json(['success'],200);
    }

    public function deletePrivilege($id){
        $privilege = Mfp::findOrFail($id);
        dump($privilege);
        $privilege->delete();
    }
}
