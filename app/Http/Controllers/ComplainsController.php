<?php

namespace App\Http\Controllers;

use App\Complain;
use App\complain_reply;
use App\reply;
use Illuminate\Http\Request;

class ComplainsController extends Controller
{
    public function makeComplain(Request $request)
    {
        $c = new Complain();
        $c->citizen_national_id  = $request->citizen_national_id;
        $c->complain_content = $request->complain_content;
        $c->save();
        return response()->json($c,200);
    }

    public function  makeReply(Request $request)
    {
        $r = new reply();
        $r->user_id = $request->user_id;
        $r->reply_content = $request->reply_content;
        $r->save();

        $cr = new complain_reply();
        $cr->reply_id = $r->id;
        $cr->complain_id = $request->complain_id;
        $cr->save();
        return response()->json($cr,200);
    }
}
