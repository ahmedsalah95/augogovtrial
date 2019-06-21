<?php

namespace App\Http\Controllers;

use App\Complain;

use App\cr;
use App\reply;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ComplainsController extends Controller
{
    /*    public function makeComplain(Request $request)
        {
            $c = new Complain();
            $c->citizen_national_id = $request->citizen_national_id;
            $c->citizen_name = $request->citizen_name;
            $c->complain_content = $request->complain_content;
            $c->isProcessed = "لم يتم الرد حتى الآن";
            $c->save();
            return response()->json($c, 200);
        }*/

    /*    public function makeReply(Request $request)
        {
            $r = new reply();
            $r->user_id = $request->user_id;
            $r->reply_content = $request->reply_content;
            $r->save();

            $cr = new cr();
            $cr->reply_id = $r->id;
            $cr->complain_id = $request->complain_id;
            $cr->save();

            $c = Complain::find($request->complain_id);
            $c->isProcessed = "تم الرد";
            $c->save();

            return response()->json($cr, 200);
        }*/

    public function fetchComplainsAndReplies(Request $request)
    {
        $arr = array();
        $complains = Complain::where('citizen_national_id', $request->citizen_national_id)->get();
        $arr[] = $complains;
        $secArr = array();
        foreach ($complains as $co) {
            $test = $co->replies()->get();
            if (!empty($test[0])) {
                //echo $test[0];
                $secArr [] = $test;
            }

        }
        $arr [] = $secArr;


        return response()->json($arr, 200);
    }

    public function getReplies(Request $request)
    {
        $crs = cr::where('complain_id', $request->complain_id)->get();
        $arr = array();

        foreach ($crs as $cr) {
            # print($cr->reply_id);
            $reply = reply::where('id', $cr->reply_id)->get();
            array_push($arr, $reply);

        }

        return response()->json($arr, 200);
    }


    public function makeComplain(Request $request)
    {

        $file = $request->file('filefield');
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            Storage::disk('local')->put($file->getFilename() . '.' . $extension, File::get($file));
        }

        $entry = new Complain();
        $entry->citizen_national_id = $request->citizen_national_id;
        $entry->complain_content = $request->complain_content;
        $entry->isProcessed = "لم يتم الرد حتى الآن";
        if ($file) {
            $entry->mime = $file->getClientMimeType();
            $entry->original_filename = $file->getClientOriginalName();
            $entry->filename = $file->getFilename() . '.' . $extension;
        }


        $entry->save();

        return response()->json(['image' => $entry]);

    }


    public function makeRep(Request $request)
    {
        $r = new reply();
        $r->user_id = $request->user_id;
        $r->reply_content = $request->reply_content;
        $file = $request->file('filefield');
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            Storage::disk('local')->put($file->getFilename() . '.' . $extension, File::get($file));
            $r->mime = $file->getClientMimeType();
            $r->original_filename = $file->getClientOriginalName();
            $r->filename = $file->getFilename() . '.' . $extension;
        }

        $r->save();

        $cr = new cr();
        $cr->reply_id = $r->id;
        $cr->complain_id = $request->complain_id;
        $cr->save();

        $c = Complain::find($request->complain_id);

        $c->isProcessed = "تم الرد";
        $c->save();
    }

    public function getImageReply($id)
    {
        // $image = Complain::find($id);
        $cr = cr::where('complain_id', $id)->first();
        $image = reply::where('id', $cr->reply_id)->first();
        $file = Storage::disk('local')->get($image->filename);

        return (new Response($file, 200))->header('Content-Type', $image->mime);


    }

    public function getComplainWithNationalId($nationalId)
    {
        $complains = Complain::where('citizen_national_id', $nationalId)->get();

        return response()->json(['success' => $complains]);
    }

    public function getComplains()
    {
        $complains = Complain::orderBy('id', 'desc')->get();
        return response()->json($complains, 200);

    }

}
