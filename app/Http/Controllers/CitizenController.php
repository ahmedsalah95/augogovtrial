<?php

namespace App\Http\Controllers;

use App\Citizen;
use Illuminate\Http\Request;

class CitizenController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request,[
            'citizen_name' =>'required',
            'citizen_national_id' =>'required',
            'passport_id' =>'required',
            //'city_id' =>'',
            //'state_id' =>'',
            'address' =>'required',
            //'status' =>''|'',
            //'date_of_birth' =>'required'|'date',
            //'sex' =>''|'',
            // 'religion' =>''|'',
            //'wife_name' =>''|'',
            // 'insurance_number' =>''|'',
            // 'job' =>''|''

        ]);

        $citizen = new Citizen();
        $citizen->citizen_name= $request->citizen_name;
        $citizen->citizen_national_id = $request->citizen_national_id ;
        $citizen->passport_id = $request->passport_id;
        $citizen->address = $request->address;
        $citizen->save();

        $auth = Citizen::where('id',$citizen->id)->get();

        return response()->json(['citizen',$auth],200);

    }

}
