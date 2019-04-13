<?php

namespace App\Http\Controllers;

use App\Announce_Types;
use App\Assignation_Types;
use App\Attachment;
use App\Building_Types;
use App\Citizen;
use App\Container;
use App\Distinction_Types;
use App\Document;
use App\Fees;
use App\Group;
use App\Group_user;
use App\Law;
use App\Module;
use App\Organization_Structure;
use App\Payment_Types;
use App\Request_Document;
use App\Request_Fees;
use App\Usage_Types;
use App\Validity_Certificate;
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

    public function getCitizens(){
        $citizens = Citizen::all();

        return response()->json(['Citizens',$citizens], 200);
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
        $fees->default_value = $Fees["value"];

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
        // dump($fees);
        $newFees = Fees::find($fees["id"]);
        // dump($fees["id"]);
        // dump($newFees);
        $newFees->fees_name = $fees["name"];
        $newFees->default_value = $fees["value"];

        $newFees->save();

        return response()->json(['new fee',$newFees],200 );

    }
    public function fetchFees(Request $request)
    {
        foreach ($request->data as $fees)
        {
            if($fees["new_fee"])
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
        // $this->validate($request,[

        //     'request_name' => 'required',
        //     'request_parent' => 'required'

        // ]);

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
    public function announceType(Request $request)
    {
        $announce = new Announce_Types();
        $announce->name = $request->name;
        $announce->description =$request->description;
        $announce->role_id = $request->role_id;
        $announce->ORG_id = $request->ORG_id;
        $announce->save();
        return response()->json(['announceType','saved'],200 );

    }

    public function groups(Request $request)
    {
        $grp = new Group();
        $grp->group_name = $request->group_name;
        $grp->save();
        return response()->json(['group','saved'],200 );

    }


    public function groupUser(Request $request)
    {
        $gu = new Group_user();
        $gu->user_id = $request->user_id;
        $gu->group_id = $request->group_id;
        $gu->ORG_id = $request->ORG_id;
        $gu->employee_id = $request->employee_id;
        $gu->emp_orgstructure_id = $request->emp_orgstructure_id;
        $gu->group_structure_id = $request->group_structure_id;
        $gu->save();
        return response()->json(['group user','saved'],200 );

    }
    public function law()
    {
        $l = new Law();
        $l->save();
        return response()->json(['law','saved'],200 );
    }

    public function inserModule(Request $request)
    {
        $mod = new Module();
        $mod->module_name = $request->module_name;
        $mod->save();
        return response()->json(['module','saved'],200 );

    }
    public function insertOrganizationStructure(Request $request)
    {
        $org = new Organization_Structure();
        $org->department_id = $request->department_id;
        $org->department_name = $request->department_name;
        $org->department_parent = $request->department_parent;

        $org->save();
        return response()->json(['organization','saved'],200 );

    }
    public function insertUsageType(Request $request)
    {
        $usage = new Usage_Types();
        $usage->Usage_Type = $request->Usage_Type ;
        $usage->save();
        return response()->json(['usage type','saved'],200 );
    }

    public function validityCertificate(Request $request)
    {
        $val = new Validity_Certificate();
        $val->ORG_id = $request->ORG_id ;
        $val->LUS_id = $request->LUS_id;
        $val->notes = $request->notes ;
        $val->instance_id = $request->instance_id ;
        $val->usage_type_child_id = $request->usage_type_child_id ;
        $val->certificate_number = $request->certificate_number ;
        $val->citizen_id = $request->citizen_id ;
        $val->buildingdesc = $request->buildingdesc;

        $val->save();
        return response()->json(['validity','saved'],200 );

    }

}



