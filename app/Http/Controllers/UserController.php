<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;
use Illuminate\Http\Request;

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

    public function registerEmployee(Request $request)
    {
        $this->validate($request, [
            'citizen_national_id'=>'required',
            'employee_name'=>'required',
            'department_id'=>'required',
            'ORG_id'=>'required',
            'status'=>'required',
        ]);

        $employee = new Employee();
      /*  $employee->citizen_national_id = $request->citizen_national_id;
        $employee->employee_name = $request->employee_name;
        $employee->department_id = $request->department_id;
        $employee->ORG_id = $request->ORG_id;
        $employee->status = $request->status; */

        $employee->save($request->all());

        return response()->json(['success'=>'true'],$this->successStatus);


    }

}
