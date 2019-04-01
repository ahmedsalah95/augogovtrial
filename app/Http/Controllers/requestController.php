<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class requestController extends Controller
{
    public function createRequest(Request $request)
    {
        $req = new \App\Request();

        $req->request_name = $request->request_name;
        $req->request_parent =$request->request_parent;

        $req->save();
        return response()->json(['request',"saved"],200);
    }

    public function form(Request $request)
    {
        $form = new Form();
        $form->form_name = $request->form_name;

        $form->save();
        return response()->json(['form',"saved"],200);
    }

    public function requestFees(Request $request)
    {
        $RF = new Request_Fees();

        $RF->fees_id = $request->fees_id;
        $RF->request_id = $request->request_id;
        $RF->default_value= $request->default_value;

        $RF->save();
        return response()->json(['request fees',"saved"],200);
    }

    public function setSteps(Request $request)
    {
        $steps = new Request_Step();
        $steps->request_id = $request->request_id;
        $steps->form_id = $request->form_id;
        $steps->order_number = $request->order_number;
        $steps->save();
        return response()->json(['steps',"saved"],200);

    }

    public function setDocument(Request $request)
    {
        $document = new Document();
        $document->document_name = $request->document_name;
        $document->save();
        return response()->json(['documents',"saved"],200);
    }

    public function setReports(Request $request)
    {
        $reports = new App_Report();

        $reports->ORG_id = $request->ORG_id;
        $reports->reportname_ar = $request->reportname_ar;
        $reports->reportname_en = $request->reportname_en;
        $reports->type_id = $request->type_id;

        $reports->save();
        return response()->json(['reports',"saved"],200);

    }
}
