<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function getRegister()
    {
         return view('template.front_login.register');
    }

    public function create(Request $request)
    {
        try{
            if($request->hasFile('foto')){
                $file = $request->file('foto');
                $destination = 'assets_frontend/img/users';
                $name_file = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($destination,$name_file);
            }else{
                $name_file = null;
            }

            $data = [
                'name'          => $request->nama,
                'telpon'        => $request->telpon,
                'email'         => strtolower($request->email),
                'jenis_kelamin' => $request->jenis_kelamin,
                'password'      => Hash::make($request->pw),
                'password_real' => $request->pw,
                'status'        => 1,
                'foto'          => $name_file,
                'created_at'    => date('Y-m-d H:i:s'),
            ];

            User::insert($data);
            return redirect()->back()->with(['success'=>'Data Simpan']);
        }catch(Exception $e){
            return redirect()->back()->with(['error'=>'Data Gagal'.$e]);
        }
    }

}
