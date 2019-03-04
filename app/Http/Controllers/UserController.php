<?php

namespace App\Http\Controllers;

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
        $username="";
        $password="";
        $users = User::all();
        foreach ($users as $user)
        {
            if ($user->name ==$request->name)
            {
                $userID = $user->id;
                $username = $user->name;
                $password = $user->password;
                break;
            }
        }

        if ($this && $username && $password) {

            $authorizedUser = User::where('id',$userID)->get();
            return response()->json(['user' => $authorizedUser], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }

    }

}
