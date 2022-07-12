<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Hash;

class UserManagementContoller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        date_default_timezone_set("Asia/Bangkok");
        $data['no'] = 1;
        $data['user'] = DB::table('users')->where('status',1)->orderBy('created_at','DESC')->get();

        return view('admin.user_management', $data);
    }

    public function tambah(Request $request)
    {
        try{
            $data = [
                'name'          => $request->name,
                'email'         => $request->email,
                'password'      => Hash::make($request->password),
                'password_real' => $request->password,
                'alamat'        => $request->alamat,
                'nomorwa'       => $request->nomorwa,
                'maps'          => $request->maps,
                'syarat_ketentuan' => $request->ketentuan,
                'nama_rek'      => $request->nama_rek,
                'nama_bank'     => $request->nama_bank,
                'no_rek'        => $request->no_rek,
                'status'        => 1
            ];
            DB::table('users')->insert($data);

            return redirect()->back()->with(['success'=>'Berhasil Tambah']);
        }catch(Exception $e){
            return redirect()->back()->with(['error'=>'Gagal Tambah']);
        }
    }

    public function edit(Request $request)
    {
        try{
            $data = [
                'name'          => $request->name,
                'email'         => $request->email,
                'password'      => Hash::make($request->password),
                'password_real' => $request->password,
                'alamat'        => $request->alamat,
                'nomorwa'       => $request->nomorwa,
                'maps'          => $request->maps,
                'syarat_ketentuan' => $request->ketentuan,
                'nama_rek'      => $request->nama_rek,
                'nama_bank'     => $request->nama_bank,
                'no_rek'        => $request->no_rek,
                'status'        => 1
            ];
            DB::table('users')->where('id', $request->id)->update($data);

            return redirect()->back()->with(['success'=>'Berhasil Edit']);
        }catch(Exception $e){
            return redirect()->back()->with(['error'=>'Gagal Edit']);
        }
    }

    public function hapus($id)
    {
        try{
            // Delete Image In Folder
            $donasi = DB::table('users')->where('id', $id)->first();


            // Delete Data
            DB::table('users')->where('id', $id)->delete();

            return redirect()->back()->with(['success'=>'Berhasil Delete']);
        }catch(Exception $e){
            return redirect()->back()->with(['error'=>'Gagal'.$e]);
        }
    }

}
