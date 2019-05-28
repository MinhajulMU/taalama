<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;
use Validator;
use \App\Helper\Alert;
use App\Model\Topik;
use Illuminate\Http\Request;

class topikController extends Controller
{
    //
    public function index()
    {
        # code...
        return Datatables::of(Topik::query())
                ->setRowId(function(Topik $topik){
                    return $topik->id;
                })->addColumn('icon', function(Topik $topik){
                    return "<img src='storage/".$topik->icon."' style='150px' height='150px' />";
                })
                ->addColumn('aksi','admin.topik.action-button')
                ->rawColumns(['aksi','icon'])
                ->make(true);
    }
    public function delete(Request $request){
        $validator = Validator::make($request->all(),[
            "id"=> "required|numeric|exists:topik,id"
        ]);
        $response = ['ok'=>true];
        if($validator->fails()){
            $response['ok'] = false;
            $response['msg'] = "Id tidak valid";
        }else{
            Topik::find($request->input('id'))->delete();
            $response['msg'] = "berhasil menghapus data";
        }
        return response()->json($response, 200);
    }
    public function store(Request $request)
    {
        # code...
        $res = ['stored'=>true];
        $validator = Validator::make($request->all(),[
            "nama_topik" => "required|min:3",
            'icon' => 'required|image',
            'deskripsi' => 'required|min:4'
        ]);
        if($validator->fails()){
            $res['msg'] = Alert::errorList($validator->errors());
            $res['stored'] = false;
        }else{
            $path = $request->file('icon')->store('topik');
            $topik = new Topik();
            $topik->nama_topik = $request->input("nama_topik");
            $topik->icon = $path;
            $topik->deskripsi = $request->input('deskripsi');
            $topik->save();
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
