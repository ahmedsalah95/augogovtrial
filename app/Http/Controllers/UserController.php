<?php

namespace App\Http\Controllers;

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

    public function login(Request $request)
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
            if ($user->name == $request->name) {
                $userID = $user->id;
                $username = $user->name;
                $password = $user->password;
                break;
            }
        }

        if ($this && $username && $password) {

            $authorizedUser = User::where('id', $userID)->get();
            return response()->json(['user' => $authorizedUser], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }

    }

    public function fetchEmployees(Request $request)
    {
        
        foreach($request->data["citizens"] as $newCitizen){
            $citizen = new Citizen();
            $citizen->citizen_name = $newCitizen["name"];
            $citizen->citizen_national_id = $newCitizen["national_id"];
            $citizen->save();
        }

        foreach($request->data["employees"] as $newEmployee){
            $employee = new Employee();
            $employee->employee_name = $newEmployee["citizen"]["citizen_name"];
            $employee->department_id = $newEmployee["department"]["id"];
            $employee->citizen_national_id = $newEmployee["citizen"]["national_id"];
            $employee->save();
        }

        return response()->json(['success'=>'true'],$this->successStatus);

    }

    public function getEmployees(){
        $employees = Employee::all();

        $data = array();

        foreach($employees as $employee){
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
        return response()->json(['success'=>'true'],$this->successStatus);
    }

    public function fetchUsers(Request $request){

        dump(Carbon::now()->toDateTimeString());

        foreach($request->data as $newUser){

            $user = new User();
            $user->name = $newUser["username"];
            $user->email = "email@email.com".Carbon::now()->timestamp; //just adding the timestamp to mock the email field
            $user->password = $newUser["password"];
            $user->employee_id = $newUser["employee"]["id"];
            $user->citizen_national_id = $newUser["employee"]["citizen"]["national_id"];
            $user->save();

        }

        return response()->json(['success'=>'true'],$this->successStatus);
    }

    public function getUsers(Request $request){

        $users = User::all();

        $data = array(
            'users' => $users
        );

        return response()->json($data, 200);
    }

}
