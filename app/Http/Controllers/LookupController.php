<?php

namespace App\Http\Controllers;

use App\Assignation_Types;
use App\Building_Types;
use App\Citizen;
use App\Distinction_Types;
use App\Document;
use App\Payment_Types;
use Illuminate\Http\Request;

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

    public function insertDocument(Request $request)
    {
        $this->validate($request,[

            'document_name'=>'required'

        ]);

        $document = new Document();
        $document->document_name = $request->document_name;
        $document->save();

        $auth = Document::where('id',$document->id)->get();

        return response()->json(['document',$auth],200);
    }

    public function insertFees(Request $request)
    {
        $this->validate($request,[

            'fees_name' =>'required',
            'default_value' => 'required'

        ]);

        $fees = new Fee();
        $fees->fees_name = $request->fees_name;
        $fees->default_value = $request->default_value;

        $fees->save();

        $authorized = Fees::where('id', $fees->id)->get();

        return response()->json(['fees',$authorized], 200);
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
}
