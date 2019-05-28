<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;
use Validator;
use \App\Helper\Alert;
use App\Model\Soal;
use Illuminate\Http\Request;

class soalController extends Controller
{
    //
    public function index()
    {
        # code...
        return Datatables::of(Soal::query())
                ->setRowId(function(Soal $soal){
                    return $soal->id;
                })->addColumn('nama_topik', function(Soal $soal){
                    return $soal->topik['nama_topik'];
                })
                ->addColumn('aksi','admin.soal.action-button')
                ->rawColumns(['aksi'])
                ->make(true);
    }
    public function delete(Request $request){
        $validator = Validator::make($request->all(),[
            "id"=> "required|numeric|exists:soal,id"
        ]);
        $response = ['ok'=>true];
        if($validator->fails()){
            $response['ok'] = false;
            $response['msg'] = "Id tidak valid";
        }else{
            Soal::find($request->input('id'))->delete();
            $response['msg'] = "berhasil menghapus data";
        }
        return response()->json($response, 200);
    }
    public function store(Request $request)
    {
        # code...
        $res = ['stored'=>true];
        $validator = Validator::make($request->all(),[
            "topik" => "required",
            'soal' => 'required|min:5'
        ]);
        if($validator->fails()){
            $res['msg'] = Alert::errorList($validator->errors());
            $res['stored'] = false;
        }else{

            $soal = new Soal();
            $soal->topik_id = $request->input("topik");
            $soal->title = $request->input('soal');
            $soal->save();
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
