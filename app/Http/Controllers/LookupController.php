<?php

namespace App\Http\Controllers;

use App\Address_structure;
use App\Announce_Types;
use App\Assignation_Types;
use App\Attachment;
use App\Build_License_Request;
use App\Building_license;
use App\Building_Types;
use App\Citizen;

use App\Complain;

use App\Engineer;
use App\Engineering_Office;

use App\Instance_Attachment;
use App\Instance_Fees;
use App\Instance_Fees_Details;
use App\Instance_Request;
use App\Lands;
use App\License;
use App\LUS;
use App\LUS_Decision;
use App\Transaction;
use App\User;
use App\Container;
use App\Distinction_Types;
use App\Document;
use App\Fees;
use App\Form;
use App\Group;
use App\Group_user;
use App\Irregularites_Type;
use App\Law;
use App\License_Types;
use App\Module;
use App\Organization_Structure;
use App\OwnerShip_Types;
use App\Payment_Types;
use App\Request_Document;
use App\Request_Fees;
use App\Usage_Types;
use App\Validity_Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Integer;
use PhpParser\Node\Stmt\GroupUse;

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

        return response()->json(['citizens' => $citizens], 200);
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

    public function fetchBuildingType(Request $request)
    {
        foreach ($request->data as $build)
        {
            if($build["new_type"])
            {
                $this->insertBuildingType($build);
            }
            else if($build["deleted"]){
                $this->deleteBuildingType($build["id"]);
            }
        }
    }
    public function deleteBuildingType($id)
    {
        $build = Building_Types::findOrFail($id);
        $build->delete();
    }
    public function getBuildingTypes()
    {
        $types = Building_Types::all();

        return response()->json(['Building types' => $types], 200);
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

    public function deleteDistinctionType($id)
    {
        $type = Distinction_Types::findOrFail($id);
        $type->delete();
    }
    public function fetchDistinctionTypes(Request $request)
    {
        foreach ($request->data as $type)
        {
            if($type["new_type"])
            {
                $this->insertDistinctionType($type);
            }
            else if($type["deleted"]){
                $this->deleteDistinctionType($type["id"]);
            }
        }
    }

    public function getDistinctionType()
    {
        $types = Distinction_Types::all();

        return response()->json(['Types' => $types], 200);
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

    public function deleteAssignationType($id)
    {
        $type = Assignation_Types::findOrFail($id);
        $type->delete();
    }
    public function fetchAssignationType(Request $request)
    {
        foreach ($request->data as $type)
        {
            if($type["new_type"])
            {
                $this->insertAssignationType($type);
            }
            else if($type["deleted"]){
                $this->deleteAssignationType($type["id"]);
            }
        }
    }

    public function getAssignationType()
    {
        $types = Assignation_Types::all();

        return response()->json(['Types' => $types], 200);
    }

    public function insertDocument($doc)
    {
        $document = new Document();
        $document->document_name = $doc["name"];
        $document->save();

        return response()->json(['success'],200);
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

    public function getDocuments()
    {
        $documents = Document::all();

        return response()->json(['documents' => $documents], 200);
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
        $newFees = Fees::findOrFail($fees["id"]);
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

    public function deletePaymentType($id)
    {
        $type = Payment_Types::findOrFail($id);
        $type->delete();
    }
    public function fetchPaymentTypes(Request $request)
    {
        foreach ($request->data as $type)
        {
            if($type["new_type"])
            {
                $this->insertPayment($type);
            }
            else if($type["deleted"]){
                $this->deletePaymentType($type["id"]);
            }
        }
    }

    public function getPaymentTypes()
    {
        $types = Payment_Types::all();

        return response()->json(['Types' => $types], 200);
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

        return response()->json(['requests' => $requests], 200);
    }

    public function getFees()
    {
        $fees = Fees::all();

        return response()->json(['fees' => $fees], 200);
    }

    public function getRequestByID(Request $request)
    {
        $req = \App\Request::where('id',$request->id)->get();

        return response()->json(['request' => $req], 200);

    }
    public function getDocumentsByReqId(Request $request)
    {
        $documents = Request_Document::where('request_id',$request->id)->get();
        $arr=array();
      for($i=0;$i<sizeof($documents);$i++)
      {
          $data = Document::where('id',$documents[$i]->document_id)->get();

          $arr [] = $data[0];
      }
        return response()->json($arr,200);


    }
    public function getFeesByRequestId(Request $request)
    {
        $fees = Request_Fees::where('request_id', $request->id )->get();
        for($i=0;$i<sizeof($fees);$i++)
        {
            $data = Fees::where('id',$fees[$i]->fees_id)->get();

            $arr [] = $data[0];
        }

        return response()->json($arr,200 );
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
    public function insertAnnounceType(Request $request)
    {
        $announce = new Announce_Types();
        $announce->name = $request->name;
        $announce->description =$request->description;
        $announce->role_id = $request->role_id;
        $announce->ORG_id = $request->ORG_id;
        $announce->save();
        return response()->json(['announceType','saved'],200 );

    }

    public function deleteannounceType($id)
    {
        $type = Announce_Types::findOrFail($id);
        $type->delete();
    }
    public function fetchannounceTypes(Request $request)
    {
        foreach ($request->data as $type)
        {
            if($type["new_type"])
            {
                $this->insertAnnounceType($type);
            }
            else if($type["deleted"]){
                $this->deleteannounceType($type["id"]);
            }
        }
    }
    public function getannounceTypes(){

        $types = Announce_Types::all();
        return response()->json(['types',$types], 200);
    }

    public function insertGroup($group)
    {
        $newGroup = new Group();
        $newGroup->group_name = $group['name'];
        $newGroup->save();
        return response()->json(['group' => 'saved'],200 );
    }
    public function fetchGroupUsers(Request $request)
    {

        foreach ($request->data["groups"] as $group)
        {
            if($group["new_group"])
            {
                $this->insertGroup($group);
            }
            else if($group["deleted"]){

                $allGroupUsers = Group_user::where("group_id", $group["id"])->get();
                foreach ($allGroupUsers as $groupUser)
                {
                    $groupUser->delete();
                }
                $this->deleteGroup($group["id"]);
            }
        }
        foreach ($request->data["groupUsers"] as $groupUser)
        {
            if ($groupUser["new_group_user"])
            {
                $this->insertGroupUser($groupUser);
            }
            else if ($groupUser["deleted"])
            {
                $this->deleteGroupUser($groupUser["id"]);
            }
        }
    }
    public function deleteGroupUser($id)
    {
        $groupUser = Group_user::find($id);
        if($groupUser){
            $groupUser->delete();
        }
    }
    public function deleteGroup($id)
    {
        $grp = Group::findOrFail($id);
        $grp->delete();
    }
    public function getGroups(){

        $groups = Group::all();
        return response()->json(['groups' => $groups], 200);
    }
    public function getGroupUsers(){

        $groupUsers = Group_user::all();
        $groups = Group::all();
        $users = User::all();

        $data = [
            'groupUsers' => $groupUsers,
            'groups' => $groups,
            'users' => $users
        ];

        return response()->json($data, 200);
    }


    public function insertGroupUser($groupUser)
    {

        $user = User::where("name", $groupUser["name"])->first();
        $group = Group::where("group_name", $groupUser["group"])->first();
        
        $newGroupUser = new Group_user();
        $newGroupUser->user_id = $user->id;
        $newGroupUser->group_id = $group->id;
        $newGroupUser->employee_id = $user->employee_id;
        // $newGroupUser->ORG_id = $groupUser["ORG_id"];
        // $newGroupUser->emp_orgstructure_id = $groupUser["emp_orgstructure_id"];
        // $newGroupUser->group_structure_id = $groupUser["group_structure_id"];

        $newGroupUser->save();
        // dump("insert groupUser", $newGroupUser);
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
    public function getDepartments()
    {
        $departments = Organization_Structure::all();

        return response()->json(['Departments' => $departments], 200);
    }
    public function fetchDepartments(Request $request)
    {
        foreach ($request->data as $dept)
        {
            if($dept["new_department"])
            {
                $this->insertOrganizationStructure($dept);
            }
            else if($dept["deleted"]){
                $this->deleteDepartment($dept["id"]);
            }
        }
    }
    public function deleteDepartment($id)
    {
        $dept = Organization_Structure::findOrFail($id);
        $dept->delete();

    }
    public function insertUsageType(Request $request)
    {
        $usage = new Usage_Types();
        $usage->Usage_Type = $request->Usage_Type ;
        $usage->save();
        return response()->json(['usage type','saved'],200 );
    }

    public function deleteUsageType($id)
    {
        $type = Usage_Types::findOrFail($id);
        $type->delete();
    }
    public function fetchUsageTypes(Request $request)
    {
        foreach ($request->data as $type)
        {
            if($type["new_type"])
            {
                $this->insertUsageType($type);
            }
            else if($type["deleted"]){
                $this->deleteUsageType($type["id"]);
            }
        }
    }
    public function getUsageTypes(){

        $types = Usage_Types::all();
        return response()->json(['types' => $types], 200);
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

    public function insertForm($fo)
    {
        $form = new Form();
        $form->form_name = $fo["name"];
        dump("save", $form);
        $form->save();

        $auth = Form::where('id',$form->id)->get();
        return response()->json(['success',$auth],200);
    }
    public function deleteForm($id)
    {
        $form = Form::findOrFail($id);
        dump("delete", $form);
        $form->delete();
    }
    public function fetchForms(Request $request)
    {
        dump($request->data);
        foreach ($request->data as $form)
        {
            dump($form);
            if($form["new_form"])
            {
                $this->insertForm($form);
            }
            else if($form["deleted"]){
                $this->deleteForm($form["id"]);
            }
        }
    }
    public function getForms(){

        $forms = Form::all();
        return response()->json(['forms' => $forms], 200);
    }



    public function insertLicenseType(Request $request)
    {
        $li = new License_Types();
        $li ->name = $request->name;
        $li->save();
        return response()->json(['license',"saved"],200);
    }

    public function deleteLicenseType($id)
    {
        $li = License_Types::findOrFail($id);
        $li->delete();
    }
    public function fetchLicenseTypes(Request $request)
    {
        foreach ($request->data as $li)
        {
            if($li["new_type"])
            {
                $this->insertLicenseType($li);
            }
            else if($li["deleted"]){
                $this->deleteLicenseType($li["id"]);
            }
        }
    }
    public function getLicenseTypes(){

        $types = License_Types::all();
        return response()->json(['types' => $types], 200);
    }


    public function insertOwnershipType(Request $request)
    {
        $type = new OwnerShip_Types();
        $type ->name = $request->name;
        $type->save();
        return response()->json(['owner type',"saved"],200);
    }

    public function deleteOwnershipType($id)
    {
        $type = OwnerShip_Types::findOrFail($id);
        $type->delete();
    }
    public function fetchOwnershipTypes(Request $request)
    {
        foreach ($request->data as $type)
        {
            if($type["new_type"])
            {
                $this->insertOwnershipType($type);
            }
            else if($type["deleted"]){
                $this->deleteOwnershipType($type["id"]);
            }
        }
    }
    public function getOwnershipTypes(){

        $types = OwnerShip_Types::all();
        return response()->json(['types' => $types], 200);
    }

    public function insertIrregType(Request $request)
    {
        $type = new Irregularites_Type();
        $type ->name = $request->name;
        $type ->ORG_id = $request->ORG_id;
        $type ->description = $request->description;
        $type->save();
        return response()->json(['Irreg type',"saved"],200);
    }

    public function deleteIrregType($id)
    {
        $type = Irregularites_Type::findOrFail($id);
        $type->delete();
    }
    public function fetchIrregTypes(Request $request)
    {
        foreach ($request->data as $type)
        {
            if($type["new_type"])
            {
                $this->insertIrregType($type);
            }
            else if($type["deleted"]){
                $this->deleteIrregType($type["id"]);
            }
        }
    }
    public function getIrregTypes(){

        $types = Irregularites_Type::all();
        return response()->json(['types' => $types], 200);
    }
    //21/6 قبل التسليم بيومين
    public function updateInstanceRequest(Request $request)
    {
        $id = $request->instance_id;
        $instance_request = Instance_Request::find($id);
        foreach ($request ["attributes"] as $key => $value)
        {
            $instance_request->$key = $value;
        }
    }
    public function updateTransaction(Request $request)
    {
        $id = $request->instance_id;
        $transaction = Transaction::find($id);
        foreach ($request ["attributes"] as $key => $value)
        {
            $transaction->$key = $value;
        }
    }
    public function updateBuildingLicense(Request $request)
    {
        $id = $request->instance_id;
        $buildingLicense = Building_license::find($id);
        foreach ($request ["attributes"] as $key => $value)
        {
            $buildingLicense->$key = $value;
        }
    }
    public function updateBuildingLicenseRequest(Request $request)
    {
        $id = $request->instance_id;
        $buildingLicenseRequest = Build_License_Request::find($id);
        foreach ($request ["attributes"] as $key => $value)
        {
            $buildingLicenseRequest->$key = $value;
        }
    }
    public function updateLicense(Request $request)
    {
        $id = $request->instance_id;
        $license = License::find($id);
        foreach ($request ["attributes"] as $key => $value)
        {
            $license->$key = $value;
        }
    }
    public function getEngineeringOffices()
    {
        $engOffices = Engineering_Office::all();
        return response()->json(['engineering_offices'=>$engOffices], 200);
    }
    public function getEngineers()
    {
        $engs = Engineer::all();
        return response()->json(['engineers'=>$engs], 200);
    }
    public function getLands()
    {
        $lands = Lands::all();
        return response()->json(['lands '=>$lands], 200);
    }
    public function getLusDecisions()
    {
        $decisions = LUS_Decision::all();
        return response()->json(['lus_decisions'=>$decisions], 200);
    }
    public function getValidityCertificates()
    {
        $certificates = Validity_Certificate::all();
        $citizens = [];
        $allLus   = [];
        foreach ($certificates as $certificate)
        {
            $citizen = Citizen::find($certificate->citizen_id);
            array_push($citizens, $citizen);
            $lus = LUS::find($certificate->LUS_id);
            array_push($allLus, $lus);
        }

        $data = [
            "certificates" => $certificates,
            "citizens" => $citizens,
            "all_lus" => $allLus
        ];

        return response()->json($data,200);
    }
    public function getAllLus()
    {
        $allLus = LUS::all();
        $structures = [];
        foreach ($allLus as $lus)
        {
            $structure = Address_structure::find($lus->Structure_id);
            array_push($structures, $structure);
        }

        $data = [

            "all_lus"     =>$allLus,
            "structures" =>$structures
        ];

        return response()->json($data);
    }
    public function getCitizenValidityCertificates($citizen_id)
    {
        $certificates = Validity_Certificate::where("citizen_id", $citizen_id)->get();

        $allCitizenLus = [];
        foreach ($certificates as $certificate)
        {
            $lus = LUS::where("id", $certificate->LUS_id)->get()[0];
            array_push($allCitizenLus, $lus);
        }
        $citizen = Citizen::find($citizen_id);

        $data = [
            "citizen-certificates" => $certificates,
            "citizen" => $citizen,
            "all-citizen-lus" => $allCitizenLus
        ];

        return response()->json($data);
    }
    public function getAllCitizenLus($citizen_id)
    {
        $certificates = Validity_Certificate::where("citizen_id", $citizen_id)->get();
        $allCitizenLus = [];
        $structures = [];
        foreach ($certificates as $certificate)
        {
            $lus = LUS::where("id",$certificate->LUS_id)->get()[0];
            array_push($allCitizenLus, $lus);
        }
        foreach ($allCitizenLus as $lus)
        {
            $structure = Address_structure::where("id",$lus->Structure_id)->get()[0];
            array_push($structures, $structure);
        }

        $data = [
            "all-citizen-lus"     =>$allCitizenLus,
            "structures" =>$structures
        ];

        return response()->json($data);
    }
    public function getCitizenLusDecisions($citizen_id)
    {
        $certificates = Validity_Certificate::where("citizen_id",$citizen_id)->get();
        $allCitizenLus = [];
        $allLusDecesions = [];

        foreach ($certificates as $certificate)
        {
            $lus = LUS::where("id",$certificate->LUS_id)->get()[0];
            array_push($allCitizenLus, $lus);
        }
        foreach ($allCitizenLus as $lus)
        {
            $lus_decision = LUS_Decision::where("LUS_id",$lus->id)->get()[0];
            array_push($allLusDecesions, $lus_decision);
        }

        return response()->json($allLusDecesions);
    }

    //fetch functions by abdelhameed

    public function insertInstanceFeesDetails($newDetails)
    {
        $details = new Instance_Fees_Details();
        $details->request_step_id = $newDetails["request_step_id"];
        $details->fees_id = $newDetails["fees_id"];
        $details->container_id = $newDetails["container_id"];
        $details->value = $newDetails["value"];
        $details->save();

        return response()->json(['success', $details],200);

    }
    public function deleteInstanceFeesDetails($id)
    {
        $details = Instance_Fees_Details::findOrFail($id);
        $details->delete();
    }

    public function fetchInstanceFeesDetails(Request $request)
    {
        foreach ($request->data as $details)
        {
            if($details["new_details"])
            {
                $this->insertInstanceFeesDetails($details);
            }
            else if($details["deleted"]){
                $this->deleteInstanceFeesDetails($details["id"]);
            }
        }
    }

    public function insertInstanceFees($newInstanceFees)
    {
        $instanceFees = new Instance_Fees();
        $instanceFees->instance_request_id = $newInstanceFees["instance_request_id"];
        $instanceFees->request_step_id = $newInstanceFees["request_step_id"];
        $instanceFees->fees_id = $newInstanceFees["fees_id"];
        $instanceFees->customer_id = $newInstanceFees["customer_id"];
        $instanceFees->LUS_id = $newInstanceFees["LUS_id"];
        $instanceFees->payment_type = $newInstanceFees["payment_type"];
        $instanceFees->canceled = $newInstanceFees["canceled"];
        $instanceFees->save();

        return response()->json(['success', $instanceFees],200);

    }
    public function deleteInstanceFees($id)
    {
        $instanceFees = Instance_Fees::findOrFail($id);
        $instanceFees->delete();
    }

    public function fetchInstanceFees(Request $request)
    {
        foreach ($request->data as $instanceFees)
        {
            if($instanceFees["new_instance_fees"])
            {
                $this->insertInstanceFees($instanceFees);
            }
            else if($instanceFees["deleted"]){
                $this->deleteInstanceFees($instanceFees["id"]);
            }
        }
    }

    public function insertInstanceAttachment($newInstanceAttachment)
    {
        $instanceAttachment = new Instance_Attachment();
        $instanceAttachment->attachment_id = $newInstanceAttachment["attachment_id"];
        $instanceAttachment->cat = $newInstanceAttachment["cat"];
        $instanceAttachment->ORG_id = $newInstanceAttachment["ORG_id"];
        $instanceAttachment->Archived = $newInstanceAttachment["Archived"];
        $instanceAttachment->Received = $newInstanceAttachment["Received"];
        $instanceAttachment->deleted = $newInstanceAttachment["deleted"];
        $instanceAttachment->mandatory_optional = $newInstanceAttachment["mandatory_optional"];
        $instanceAttachment->archive_document_id = $newInstanceAttachment["archive_document_id"];
        $instanceAttachment->save();

        return response()->json(['success', $instanceAttachment],200);

    }
    public function deleteInstanceAttachment($id)
    {
        $instanceAttachment = Instance_Attachment::findOrFail($id);
        $instanceAttachment->delete();
    }

    public function fetchInstanceAttachment(Request $request)
    {
        foreach ($request->data as $instanceAttachment)
        {
            if($instanceAttachment["new_instance_attachment"])
            {
                $this->insertInstanceAttachment($instanceAttachment);
            }
            else if($instanceAttachment["deleted"]){
                $this->deleteInstanceAttachment($instanceAttachment["id"]);
            }
        }
    }
}



