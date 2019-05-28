<?php

namespace App\Http\Controllers;
use App\User;

use Yajra\Datatables\Datatables;
use Validator;
use \App\Helper\Alert;

use Illuminate\Http\Request;

class userController extends Controller
{
    //
    public function index()
    {
        # code...
        return Datatables::of(User::query())
                ->setRowId(function(User $user){
                    return $user->id;
                })->addColumn('role',function(User $user){
                    $array = [];
                    foreach ($user->role as $key) {
                        # code...
                       
                       $array[] = "<span class='badge badge-primary'>".$key->role."</span>";
                    }
                    return  implode(' ',$array);

                })->addColumn('role_id',function(User $user){
                    $ret = [];
                    foreach($user->role as $role){
                        $ret[] = $role->id;
                    }
                    return json_encode($ret);
                })
                ->addColumn('aksi','admin.user.action-button-user')
                ->rawColumns(['aksi','role'])
                ->make(true);
    }
    public function delete(Request $request){
        $validator = Validator::make($request->all(),[
            "id"=> "required|numeric|exists:users,id"
        ]);
        $response = ['ok'=>true];
        if($validator->fails()){
            $response['ok'] = false;
            $response['msg'] = "Id tidak valid";
        }else{
            User::find($request->input('id'))->delete();
            $response['msg'] = "berhasil menghapus data";
        }
        return response()->json($response, 200);
    }
    public function store(Request $request)
    {
        # code...
        $res = ['stored'=>true];
        $validator = Validator::make($request->all(),[
            "name" => "required|min:3",
            'email' => 'required|email|max:60|unique:users,email',
            'password' => 'required|max:60|min:6|confirmed',
            'role' => 'required'
        ]);
        if($validator->fails()){
            $res['msg'] = Alert::errorList($validator->errors());
            $res['stored'] = false;
        }else{
            $user = new User();
            $user->name = $request->input("name");
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->save();
            $user->role()->attach($request->input('role'));
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
