<?php

namespace App\Http\Controllers;

use App\Assignation_Types;
use App\Attachment;
use App\Building_Types;
use App\Citizen;
use App\Container;
use App\Distinction_Types;
use App\Document;
use App\Fees;
use App\Payment_Types;
use App\Request_Document;
use App\Request_Fees;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class LookupController extends Controller
{

    public function insertCitizen(Request $request)
    {
        $this->validate($request,[
            'citizen_name' =>'required',
            'citizen_national_id' =>'required',
            'city_id' =>'required',
            'address' =>'required',
            'status' =>'required',
            'date_of_birth' =>'required',
            'sex' =>'required',

        ]);

        $citizen = new Citizen();
        $citizen->citizen_name = $request->citizen_name;
        $citizen->citizen_national_id = $request->citizen_national_id;
        $citizen->city_id = $request->city_id;
        $citizen->address = $request->address;
        $citizen->status = $request->status;
        $citizen->date_of_birth = $request->date_of_birth;
        $citizen->sex = $request->sex;

        $citizen->save();

        $auth = Citizen::where('id',$citizen->id)->get();

        return response()->json(['citizen',$auth],200);
    }
    public function insertBuildingType(Request $request)
    {
        $this->validate($request,[

            'ORG_id'=>'required',
            'Type_Name'=>'required'

        ]);

        $build = new Building_Types();
        $build->ORG_id = $request->ORG_id;
        $build->Type_Name = $request->Type_Name;
        $build->save();

        $auth = Building_Types::where('id',$build->id)->get();

        return response()->json(['buidingTypes',$auth],200);
    }

    public function insertDistinctionType(Request $request)
    {
        $this->validate($request,[

            'Type_Name'=>'required'

        ]);

        $type = new Distinction_Types();
        $type->Type_Name = $request->Type_Name;
        $type->save();

        $auth = Distinction_Types::where('id',$type->id)->get();

        return response()->json(['buidingTypes',$auth],200);
    }

    public function insertAssignationType(Request $request)
    {
        $this->validate($request,[

            'Type_Name'=>'required'

        ]);

        $type = new Assignation_Types();
        $type->Type_Name = $request->Type_Name;
        $type->save();


        $auth = Assignation_Types::where('id',$type->id)->get();

        return response()->json(['AssignationTypes',$auth],200);
    }

    public function insertDocument($doc)
    {
        $document = new Document();
        $document->document_name = $doc["name"];
        $document->save();

        $auth = Document::where('id',$document->id)->get();
        return response()->json(['success',$auth],200);
    }
    public function deleteDocument($id)
    {
        $document = Document::findOrFail($id);
        $document->delete();
    }
    public function fetchDocuments(Request $request)
    {
        //dump($request);
        foreach ($request->data as $doc)
        {
            if($doc["new_document"])
            {
                $this->insertDocument($doc);
            }
            else if($doc["deleted"]){
                $this->deleteDocument($doc["id"]);
            }
        }
    }

    public function insertFees($Fees)
    {
        $fees = new Fees();
        $fees->fees_name = $Fees["name"];
        $fees->default_value = $Fees["default_value"];

        $fees->save();

        $authorized = Fees::where('id', $fees->id)->get();

        return response()->json(['fees',$authorized], 200);
    }
    public function deleteFees($id)
    {
        $fees = Fees::findOrFail($id);
        $fees->delete();
    }
    public function updateFees($fees)
    {
        dump($fees);
        $newFees = Fees::find($fees["id"]);
        dump($fees["id"]);
        dump($newFees);
        $newFees->fees_name = $fees["name"];
        $newFees->default_value = $fees["default_value"];

        $newFees->save();

        return response()->json(['new fees',$newFees],200 );

    }
    public function fetchFees(Request $request)
    {
        foreach ($request->data as $fees)
        {
            if($fees["new_fees"])
            {
                $this->insertFees($fees);
            }
            elseif ($fees["deleted"])
            {
                $this->deleteFees($fees["id"]);
            }
            elseif ($fees["updated"])
            {
                dump("hello," ,$fees);
                $this->updateFees($fees);
            }
        }
    }

    public function insertPayment(Request $request)
    {
        $this->validate($request,[

            'Payment_Name' => 'required'

        ]);

        $payment = new Payment_Types();
        $payment->Payment_Name = $request->Payment_Name;
        $payment->save();

        $authorized = Payment_Types::where('id', $payment->id)->get();

        return response()->json(['paymentType',$authorized], 200);
    }

    public function insertRequest(Request $request)
    {
        $this->validate($request,[

            'request_name' => 'required',
            'request_parent' => 'required'

        ]);

        $req = new \App\Request();
        $req->request_name = $request->request_name;
        $req->request_parent = $request->request_parent;
        $req->save();

        $authorized = \App\Request::where('id', $req->id)->get();

        return response()->json(['req',$authorized], 200);
    }

    public function getRequests()
    {
        $requests = \App\Request::all();

        return response()->json(['requests',$requests], 200);
    }
    public function getDocuments()
    {
        $documents = Document::all();

        return response()->json(['Documents',$documents], 200);
    }
    public function getFees()
    {
        $fees = Fees::all();

        return response()->json(['fees',$fees], 200);
    }

    public function getRequestByID(Request $request)
    {
        $req = \App\Request::where('id',$request->id)->get();

        return response()->json(['request',$req], 200);

    }
    public function getDocumentsByReqId(Request $request)
    {
        $documents = Request_Document::where('request_id',$request->id)->get();

        return response()->json(['documents',$documents],200);
    }
    public function getFeesByRequestId(Request $request)
    {
        $fees = Request_Fees::where('request_id', $request->id )->get();

        return response()->json(['fees',$fees],200 );
    }

    public function insertAttachment(Request $request)
    {
        $attachment = new Attachment();
        $attachment->id = $request->id;
        $attachment->save();

        $authorized = Attachment::where('id', $request->id)->get();

        return response()->json(['success',$authorized], 200);
    }
    public function insertContainer(Request $request)
    {
        $cont = new Container();
        $cont->id = $request->id;
        $cont->save();

        $authorized = Container::where('id', $request->id)->get();

        return response()->json(['success',$authorized], 200);
    }
}
