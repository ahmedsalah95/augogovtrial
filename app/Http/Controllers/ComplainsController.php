<?php

namespace App\Http\Controllers;

use App\Complain;

use App\cr;
use App\reply;
use Illuminate\Http\Request;

class ComplainsController extends Controller
{
    public function makeComplain(Request $request)
    {
        $c = new Complain();
        $c->citizen_national_id  = $request->citizen_national_id;
        $c->citizen_name  = $request->citizen_name;
        $c->complain_content = $request->complain_content;
        $c->isProcessed ="لم يتم الرد حتى الآن";
        $c->save();
        return response()->json($c,200);
    }

    public function  makeReply(Request $request)
    {
        $r = new reply();
        $r->user_id = $request->user_id;
        $r->reply_content = $request->reply_content;
        $r->save();

        $cr = new cr();
        $cr->reply_id = $r->id;
        $cr->complain_id = $request->complain_id;
        $cr->save();

        $c= Complain::find($request->complain_id);
        $c->isProcessed="تم الرد";
        $c->save();

        return response()->json($cr,200);
    }

    public function fetchComplainsAndReplies(Request $request)
    {
        $arr = array();
        $complains = Complain::where('citizen_national_id',$request->citizen_national_id)->get();
        $arr[] = $complains;
        $secArr = array();
        foreach ($complains as $co)
        {
            $test = $co->replies()->get();
            if(!empty($test[0]))
            {
                //echo $test[0];
                $secArr [] = $test;
            }

        }
        $arr [] = $secArr;




        return response()->json($arr,200);
    }

    public function getReplies(Request $request)
    {
        $crs = cr::where('complain_id',$request->complain_id)->get();
        $arr = array();

        foreach ($crs as $cr)
        {
           # print($cr->reply_id);
            $reply = reply::where('id',$cr->reply_id)->get();
            array_push($arr,$reply);

        }

        return response()->json($arr,200);
    }
}
