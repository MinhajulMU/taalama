<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;
use Validator;
use \App\Helper\Alert;
use App\Model\Materi;
use Illuminate\Http\Request;

class materiController extends Controller
{
    //
    public function index()
    {
        # code...
        return Datatables::of(Materi::query())
                ->setRowId(function(Materi $materi){
                    return $materi->id;
                })->addColumn('nama_topik', function(Materi $materi){
                    return $materi->topik['nama_topik'];
                })->addColumn('content', function(Materi $materi){
                    return substr(strip_tags($materi->content),0,160);
                })->addColumn('aksi','admin.materi.action-button')
                ->rawColumns(['aksi'])
                ->make(true);
    }
    public function delete(Request $request){
        $validator = Validator::make($request->all(),[
            "id"=> "required|numeric|exists:materi,id"
        ]);
        $response = ['ok'=>true];
        if($validator->fails()){
            $response['ok'] = false;
            $response['msg'] = "Id tidak valid";
        }else{
            Materi::find($request->input('id'))->delete();
            $response['msg'] = "berhasil menghapus data";
        }
        return response()->json($response, 200);
    }
    public function store(Request $request)
    {
        # code...
        $res = ['stored'=>true];
        $validator = Validator::make($request->all(),[
            "title" => "required|min:3",
            'content' => 'required|min:3',
            'slug' => 'required'
        ]);
        if($validator->fails()){
            $res['msg'] = Alert::errorList($validator->errors());
            $res['stored'] = false;
        }else{
            $materi = new Materi();
            $materi->title = $request->input("title");
            $materi->content = $request->input('content');
            $materi->topik_id = $request->input('topik');
            $materi->slug = $request->input('slug');
            $materi->save();
            $res['msg'] = Alert::success("Berhasil Menambahkan Data");
        }

        return response()->json($res, 200);
    }
    public function update(Request $request)
    {
        # code...
        $validator = Validator::make($request->all(),[
            "name" => "required|min:3",
            'email' => 'required|email|max:60',
            'role' => 'required'
        ]);

        $response = ["stored"=>true];
        
        if($validator->fails()){
            $response['stored'] = false;
            $response['msg']    = Alert::errorList($validator->errors());
        }else{
            $user = User::find($request->input('id'));
            if($user){

                
                $user->name = $request->input("name");
                $user->email = $request->input('email');
                $user->save();
                $user->role()->sync($request->input('role'));
                $response['msg'] = Alert::success("Berhasil Memperbarui Data Portofolio");
            }else{
                $response['stored'] = false;
                $response['msg']    = Alert::errorList("Data tidak ditemukan");
            }
        }
        return response()->json($response, 200);
    }
}
