<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;
use Validator;
use \App\Helper\Alert;
use App\Model\Option;
use Illuminate\Http\Request;

class opsiController extends Controller
{
    //
    public function index()
    {
        # code...
        return Datatables::of(Option::query())
                ->setRowId(function(Option $option){
                    return $option->id;
                })->addColumn('soal', function(Option $option){
                    return $option->soal["title"];
                })->addColumn('icon', function(Option $option){
                    return "<img src='storage/".$option->icon."' style='150px' height='150px' />";
                })->addColumn('aksi','admin.opsi.action-button')
                ->addColumn('is_true', function(Option $option){
                    if ($option->is_true == 1) {
                        # code...
                        return "Benar";
                    }else{
                        return "Salah";
                    }
                })
                ->rawColumns(['aksi','icon'])
                ->make(true);
    }
    public function delete(Request $request){
        $validator = Validator::make($request->all(),[
            "id"=> "required|numeric|exists:option,id"
        ]);
        $response = ['ok'=>true];
        if($validator->fails()){
            $response['ok'] = false;
            $response['msg'] = "Id tidak valid";
        }else{
            Option::find($request->input('id'))->delete();
            $response['msg'] = "berhasil menghapus data";
        }
        return response()->json($response, 200);
    }
    public function store(Request $request)
    {
        # code...
        $res = ['stored'=>true];
        $validator = Validator::make($request->all(),[
            "soal" => "required",
            'opsi' => 'required|min:3',
            'icon' => 'required|image',
            'is_true' => 'required'
        ]);
        if($validator->fails()){
            $res['msg'] = Alert::errorList($validator->errors());
            $res['stored'] = false;
        }else{
            $path = $request->file('icon')->store('opsi');
            $opsi = new Option();
            $opsi->soal_id = $request->input("soal");
            $opsi->title = $request->input('opsi');
            $opsi->icon = $path;
            $opsi->is_true = $request->input('is_true');
            $opsi->save();
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
