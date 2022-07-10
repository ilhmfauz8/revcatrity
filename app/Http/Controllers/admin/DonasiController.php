<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DonasiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        date_default_timezone_set("Asia/Bangkok");
        if(Auth::guard('admin')->check()){
            $id_users = Auth::guard('admin')->user()->id;
            $data['donasi'] = DB::table('master_donasi')->orderBy('created_at','DESC')->get();
        }elseif(Auth::guard('penampung')->check()){
            $id_users = Auth::guard('penampung')->user()->id;
            $data['donasi'] = DB::table('master_donasi')->where('created_by',$id_users)->orderBy('created_at','DESC')->get();
        }
        $data['no'] = 1;

        return view('admin.donasi', $data);
    }

    public function tambah(Request $request)
    {
        try{
            if(Auth::guard('admin')->check()){
                $id_users = Auth::guard('admin')->user()->id;
            }elseif(Auth::guard('penampung')->check()){
                $id_users = Auth::guard('penampung')->user()->id;
            }

            // Image
            if($request->hasFile('image')){
                $file = $request->file('image');
                $destination = 'upload/donasi';
                $name_file = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($destination,$name_file);
            }else{
                $name_file = null;
            }
            // Image Detail Satu
            if($request->hasFile('image_satu')){
                $file = $request->file('image_satu');
                $destination = 'upload/donasi';
                $name_file_satu = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($destination,$name_file_satu);
            }else{
                $name_file_satu = null;
            }
            // Image Detail Dua
            if($request->hasFile('image_dua')){
                $file = $request->file('image_dua');
                $destination = 'upload/donasi';
                $name_file_dua = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($destination,$name_file_dua);
            }else{
                $name_file_dua = null;
            }

            $data = [
                'judul'         => $request->judul,
                'deskripsi'     => $request->deskripsi,
                'image'         => $name_file,
                'image_satu'    => $name_file_satu,
                'image_dua'     => $name_file_dua,
                'raised'        => str_replace(',','.',$request->raised),
                'goal'          => str_replace(',','.',$request->goal),
                'created_by'    => $id_users,
                'created_at'    => date("Y-m-d H:i:s"),
                'end_date'      => $request->end_date,
                'status'        => $request->status_data
            ];
            DB::table('master_donasi')->insert($data);

            return redirect()->back()->with(['success'=>'Berhasil Tambah']);
        }catch(Exception $e){
            return redirect()->back()->with(['error'=>'Gagal Tambah']);
        }
    }

    public function edit(Request $request)
    {
        try{
            $donasi = DB::table('master_donasi')->where('id', $request->id)->first();
            // Image
            if($request->hasFile('image')){
                $file = $request->file('image');
                $destination = 'upload/donasi';
                $name_file = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($destination,$name_file);

                // Delete Image In Folder
                $path = public_path()."/upload/donasi/".$donasi->image;
                if(is_file($path)){
                    @unlink($path);
                }

            }else{
                $name_file = $donasi->image;
            }
            // Image Detail Satu
            if($request->hasFile('image_satu')){
                $file = $request->file('image_satu');
                $destination = 'upload/donasi';
                $name_file_satu = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($destination,$name_file_satu);

                // Delete Image In Folder
                $path = public_path()."/upload/donasi/".$donasi->image_satu;
                if(is_file($path)){
                    @unlink($path);
                }

            }else{
                $name_file_satu = $donasi->image_satu;
            }
            // Image Detail Dua
            if($request->hasFile('image_dua')){
                $file = $request->file('image_dua');
                $destination = 'upload/donasi';
                $name_file_dua = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($destination,$name_file_dua);

                // Delete Image In Folder
                $path = public_path()."/upload/donasi/".$donasi->image_dua;
                if(is_file($path)){
                    @unlink($path);
                }

            }else{
                $name_file_dua = $donasi->image_dua;
            }

            $data = [
                'judul'         => $request->judul,
                'deskripsi'     => $request->deskripsi,
                'image'         => $name_file,
                'image_satu'    => $name_file_satu,
                'image_dua'     => $name_file_dua,
                'raised'        => str_replace(',','.',$request->raised),
                'goal'          => str_replace(',','.',$request->goal),
                'created_at'    => date("Y-m-d H:i:s"),
                'end_date'      => $request->end_date,
                'status'        => $request->status_data
            ];
            DB::table('master_donasi')->where('id', $request->id)->update($data);

            return redirect()->back()->with(['success'=>'Berhasil Edit']);
        }catch(Exception $e){
            return redirect()->back()->with(['error'=>'Gagal Edit']);
        }
    }

    public function hapus($id)
    {
        try{
            // Delete Image In Folder
            $donasi = DB::table('master_donasi')->where('id', $id)->first();
            $path = public_path()."/upload/donasi/".$donasi->image;
            if(is_file($path)){
                @unlink($path);
            }

            // Delete Data
            DB::table('master_donasi')->where('id', $id)->delete();

            return redirect()->back()->with(['success'=>'Berhasil Delete']);
        }catch(Exception $e){
            return redirect()->back()->with(['error'=>'Gagal'.$e]);
        }
    }

}
