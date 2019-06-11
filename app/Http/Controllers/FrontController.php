<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function question($id)
    {
        # code...
        $data['question'] = \App\Model\Soal::where('topik_id',$id)->inRandomOrder()->limit(5)->get();
        foreach ($data['question'] as $key) {
             foreach ($key->option as $keys) {
                # code...
            }
     }

        return view('front.question',$data);
    }
}
