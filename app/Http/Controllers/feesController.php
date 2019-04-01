<?php

namespace App\Http\Controllers;

use App\Instance_Fees;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class feesController extends Controller
{

    public function createInstanceFees(Request $request)
    {
        $instanceFees = new Instance_Fees();
        $instanceFees->instance_request_id = $request->instance_request_id;
        $instanceFees->request_step_id = $request->request_step_id;
    }
}
