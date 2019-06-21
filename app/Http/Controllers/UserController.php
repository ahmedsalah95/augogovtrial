<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Http\Request;

use App\Customer;
use App\Employee;
use App\User;
use App\Citizen;
use App\Organization_Structure;

use Carbon\Carbon;


class UserController extends Controller
{

    public $successStatus = 200;


  /*  public function login(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',

        ]);
        $userID = 0;
        $username = "";
        $password = "";
        $users = User::all();
        foreach ($users as $user) {
            if ($user->name == $request->name){
                $userID = $user->id;
                $username = $user->name;
                $password = $user->password;
                break;
            }
        }

        if ($this && $username && $password) {

            $authorizedUser = User::where('id', $userID)->get();
            return response()->json($authorizedUser, $this->successStatus);
        } else {
            return response()->json([], 401);
        }

    }*/

    public function login(Request $request)
    {
        $user = User::where('name', $request->name)->first();

        if (!$user) {

            return response()->json([]);
        }
        if (Hash::check($request->password, $user->password)) {
            return response()->json([$user]);
        }

        return response()->json([]);
    }


    public function fetchEmployees(Request $request)
    {

        foreach ($request->data["citizens"] as $newCitizen) {
            $citizen = new Citizen();
            $citizen->citizen_name = $newCitizen["name"];
            $citizen->citizen_national_id = $newCitizen["national_id"];
            $citizen->save();
        }

        foreach ($request->data["employees"] as $newEmployee) {
            $employee = new Employee();
            $employee->employee_name = $newEmployee["citizen"]["name"];
            $employee->department_id = $newEmployee["department"]["id"];
            $employee->citizen_national_id = $newEmployee["citizen"]["national_id"];
            $employee->save();
        }

        return response()->json(['success' => 'true'], $this->successStatus);

    }

    public function getEmployees()
    {
        $employees = Employee::all();

        $data = array();

        foreach ($employees as $employee) {
            $citizen = Citizen::where("citizen_national_id", "=", $employee->citizen_national_id)->get()[0];
            $department = Organization_Structure::where("id", "=", $employee->department_id)->get()[0];
            $item = array(
                'employee' => $employee,
                'citizen' => $citizen,
                'department' => $department
            );
            array_push($data, $item);

        }

        return response()->json($data, 200);
    }

    public function addCustomer(Request $request)
    {
        $cu = new Customer();
        $cu->citizen_national_id = $request->citizen_national_id;
        $cu->customer_name = $request->customer_name;
        $cu->save();
        return response()->json(['success' => 'true'], $this->successStatus);
    }

    public function getCustomers()
    {

        $customers = Customer::all();
        return response()->json(['customers' => $customers]);

    }

    public function fetchUsers(Request $request)
    {

        dump(Carbon::now()->toDateTimeString());

        foreach ($request->data as $newUser) {

            $user = new User();
            $user->name = $newUser["username"];
            $user->email = "email@email.com" . Carbon::now()->timestamp; //just adding the timestamp to mock the email field
            $user->password = $newUser["password"];
            $user->employee_id = $newUser["employee"]["id"];
            $user->citizen_national_id = $newUser["employee"]["citizen"]["national_id"];
            $user->save();

        }

        return response()->json(['success' => 'true'], $this->successStatus);
    }

    public function getUsers(Request $request)
    {

        $users = User::all();

        $data = array(
            'users' => $users
        );

        return response()->json($data, 200);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',

            'password' => 'required',

            'citizen_national_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $user = new User();
        $user->name = $request->name;
        // $user->email = $request->email;
        $user->email = "email@email.com" . Carbon::now()->timestamp;
        $user->password = bcrypt($request->password);
        //$user->employee_id = $request->employee_id;
        $user->citizen_national_id = $request->citizen_national_id;
        $user->save();

        $citizen = Citizen::where('citizen_national_id',$request->citizen_national_id)->first();
        if($citizen)
        {

            return response()->json('updated successfully', 200);
        }else
        {
            $newCitizen = new Citizen();
            $newCitizen->citizen_national_id = $request->citizen_national_id;
            //$newCitizen->address = $request->address;
           // $newCitizen->date_of_birth = $request->date_of_birth;
           // $newCitizen->sex = $request->sex;
            $newCitizen->save();


            return response()->json('updated successfully', 200);
        }

       // return response()->json(['status' => 'success'], 200);

    }

    // added by ahmed salah

    public function getUserByNationalId($nationalId)
    {
        $user = User::where('citizen_national_id', $nationalId)->first();
        return response()->json($user, 200);

    }

    public function getCitizenByNationalId(Request $request)
    {
        $Citizen = Citizen::where('citizen_national_id', $request->citizen_national_id)->first();
        if($Citizen)
        {
            return response()->json([$Citizen], 200);
        }else{
            return response()->json([], 200);
        }



    }

    public function updateUserAndCitizen(Request $request)
    {
        $citizen = Citizen::where('citizen_national_id', $request->citizen_national_id)->first();

        $citizen->citizen_name = $request->citizen_name;
        $citizen->address = $request->address;
        $citizen->date_of_birth = $request->date_of_birth;
        $citizen->sex = $request->sex;
        $citizen->save();


        return response()->json('updated successfully', 200);


    }


}
