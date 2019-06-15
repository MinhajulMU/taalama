<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use \App\Helper\Alert;
use App\Model\trackUser;
class FrontController extends Controller
{
    //
    public function question($id)
    {
        # code...
        $data['question'] = \App\Model\Soal::where('topik_id',$id)->inRandomOrder()->limit(5)->get();
        $data['topik'] = $id;
        foreach ($data['question'] as $key) {
             foreach ($key->option as $keys) {
                # code...
            }
     }

        return view('front.question',$data);
    }public function submit(Request $request)
    {
        # code...
        
        $track = new trackUser();
        $track->topik_id = $request->input("topik_id");
        $track->user_id = $request->input("user_id");
        $track->score = $request->input("nilai");
        $track->save();
        $data['id'] = $track->id;
        return response()->json($data, 200);
    }
}
