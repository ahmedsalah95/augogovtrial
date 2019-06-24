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

    public function fetchRequests(Request $request)
    {
        
        foreach ($request->data as $request) {
            // return $request["id"];
            if(!$request["deleted"] && !$request["new_request"] && !$request["updated"]) continue;
            if($request["deleted"]){
                $this->deleteRequest($request["id"]);
            }else{

                $new_request_id = $request["id"];
                if($request["new_request"]){$new_request_id = $this->createRequest($request);}
                else if($request["updated"]){$this->updateRequest($request);}

                $this->fetchRequestSteps($request["steps"], $new_request_id);
                $this->fetchRequestDocuments($request["documents"], $new_request_id);
                $this->fetchRequestFees($request["fees"], $new_request_id);
            }
        }

        return $request;
    }

    public function createRequest($request)
    {
        $newRequest = new \App\Request();
        $newRequest->request_name = $request["name"];
        $newRequest->request_parent =$request["parent"];
        $newRequest->save();
        return $newRequest->id;
    }

    public function deleteRequest($request_id){
        $request = \App\Request::find($request_id);

        $requestSteps = Request_Step::where("request_id", $request_id)->get();
        $requestDocuments = Request_Document::where("request_id", $request_id)->get();
        $requestFees = Request_Fees::where("request_id", $request_id)->get();

        foreach($requestSteps as $step){
            $this->deleteRequestStep($step->id);
        }
        foreach($requestDocuments as $document){
            $document->delete();
        }
        foreach($requestFees as $fee){
            $fee->delete();
        }

        $request->delete();
    }

    public function updateRequest($updatedRequest){
        $oldRequest = \App\Request::find($updatedRequest["id"]);
        $oldRequest->request_name = $updatedRequest["name"];
        $oldRequest->request_parent = $updatedRequest["parent"];
        $oldRequest->save();
    }
    
    public function fetchRequestSteps($requestSteps, $request_id)
    {
        foreach ($requestSteps as $step)
        {
            if($step["new_request_step"])
            {
                $this->insertRequestStep($step, $request_id);
            }
            else if($step["deleted"]){
                $this->deleteRequestStep($step["id"]);
            }
            else if($step["updated"]){
                $this->updateRequestStep($step);
            }
        }
    }

    public function fetchRequestDocuments($requestDocuments, $request_id)
    {
        foreach ($requestDocuments as $document)
        {
            if($document["new_document"])
            {
                $this->insertRequestDocument($document, $request_id);
            }
            else if($document["deleted"]){
                $this->deleteRequestDocument($document["id"], $request_id);
            }
        }
    }
    
    public function fetchRequestFees($requestFees, $request_id)
    {
        foreach ($requestFees as $fee)
        {
            if($fee["new_fee"])
            {
                $this->insertRequestFees($fee, $request_id);
            }
            else if ($fee["deleted"])
            {
                $this->deleteRequestFee($fee["id"], $request_id);
            }
            else if ($fee["updated"])
            {
                $this->updateRequestFees($fee, $request_id);
            }
        }
    }

    public function insertRequestStep($step, $request_id)
    {
        $new_step = new Request_Step();
        $new_step->request_id = $request_id;
        $new_step->form_id = $step["form"]["id"];
        $new_step->order_number = $step["order"];
        $new_step->save();

    }

    public function insertRequestDocument($document, $request_id)
    {
        $new_document = new Request_Document();
        $new_document->request_id = $request_id;
        $new_document->document_id = $document["id"];
        $new_document->mandatory = $document["mandatory"];
        $new_document->save();
    }

    public function insertRequestFees($fee, $request_id)
    {
        $new_fee = new Request_Fees();
        $new_fee->request_id = $request_id;
        $new_fee->fees_id = $fee["id"];
        $new_fee->default_value = $fee["value"];
        $new_fee->save();
    }

    public function updateRequestStep($step)
    {
        $new_step = Request_Step::where("id", $step["id"])->first();
        $new_step->order_number = $step["order"];
        $new_step->save();

    }
    
    public function deleteRequestStep($id)
    {
        $requestStep = Request_Step::findOrFail($id);
        $requestStep->delete();
    }

    public function deleteRequestDocument($document_id, $request_id)
    {
        $requestDocument = Request_Document::where("document_id", $document_id)
                                            ->where("request_id", $request_id)
                                            ->first();
        $requestDocument->delete();
    }

    public function deleteRequestFee($fee_id, $request_id)
    {
        $requestFee = Request_Fees::where("fees_id", $fee_id)
                                    ->where("request_id", $request_id)
                                    ->first();
        $requestFee->delete();
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

    public function fetchTransactionsSecV(Request $request)
    {

        /*$instance_id = Instance_Request::where('id', $request->Instance_id)->get(['customer_id']);
        //$instance_id = Instance_Request::where('id',$request->Instance_id)->get();
        $arr = array();
        $customer = Citizen::where('id', $instance_id[0]['customer_id'])->get();
        $arr [] = $customer[0];
        $transaction = Transaction::where('instance_id', $request->Instance_id)->get();
        $arr [] = $transaction[0];

            return response()->json($arr, 200);*/

     /*   $instance = Instance_Request::where('id', $request->Instance_id)->get()[0];
//        $instance_id = Instance_Request::all();
        //$instance_id = Instance_Request::where('id',$request->Instance_id)->get();

        if(count($instance)>0)
        {

            $instance_id = $instance->customer_id;
           //dump($instance_id);
             $customer = Citizen::where('id', $instance_id)->get();
             $arr = array();
             // $arr [] = $customer[0];
           // dump($customer);
            // $arr = $customer;
            array_push($arr,$customer);

             $transaction = Transaction::where('instance_id', $request->Instance_id)->get();
            //dump($transaction);
            // $arr = $transaction;
            array_push($arr,$transaction);
             return response()->json($arr, 200);

        }else
        {
            return response()->json([], 200);
        }*/

        $transactions = Transaction::where('Instance_id',$request->id)->get();
        if(count($transactions) > 0)
        {
            return response()->json($transactions,200);
        }else{
            return response()->json([],200);
        }

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
}
