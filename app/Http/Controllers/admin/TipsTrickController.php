<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Hash;

class TipsTrickController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        date_default_timezone_set("Asia/Bangkok");
        $data['no'] = 1;
        $data['tipstrick'] = DB::table('tips_trick')->orderBy('created_at','ASC')->get();

        return view('admin.tips_trick', $data);
    }

    public function tambah(Request $request)
    {
        try{
            $id_users = Auth::guard('admin')->user()->id;
            if($request->hasFile('image')){
                $file = $request->file('image');
                $destination = 'upload/tipstrick';
                $name_file = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($destination,$name_file);
            }else{
                $name_file = null;
            }
            if(is_countable($request->deskripsi) && count($request->deskripsi) > 0){
                $deskripsi = implode("<br>",$request->deskripsi);
            }else{
                $deskripsi = NULL;
            }
            $data = [
                'judul'          => $request->judul,
                'deskripsi'      => $deskripsi,
                'link'           => $request->link,
                'image'          => $name_file,
                'created_by'     => $id_users,
                'created_at'     => date("Y-m-d H:i:s"),
                'status'         => $request->status
            ];
            DB::table('tips_trick')->insert($data);

            return redirect()->back()->with(['success'=>'Berhasil Tambah']);
        }catch(Exception $e){
            return redirect()->back()->with(['error'=>'Gagal Tambah']);
        }
    }

    public function edit(Request $request)
    {
        try{
            $tipstrick = DB::table('tips_trick')->where('id', $request->id)->first();
            if($request->hasFile('image')){
                $file = $request->file('image');
                $destination = 'upload/tipstrick';
                $name_file = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($destination,$name_file);

                // Delete Image In Folder
                $path = public_path()."/upload/tipstrick/".$tipstrick->image;
                if(is_file($path)){
                    @unlink($path);
                }

            }else{
                $name_file = $tipstrick->image;
            }
            if(is_countable($request->deskripsi) && count($request->deskripsi) > 0){
                $deskripsi = implode("<br>",$request->deskripsi);
            }else{
                $deskripsi = NULL;
            }
            $data = [
                'judul'          => $request->judul,
                'link'           => $request->link,
                'deskripsi'      => $deskripsi,
                'image'          => $name_file,
                'created_at'     => date("Y-m-d H:i:s"),
                'status'         => $request->status
            ];
            DB::table('tips_trick')->where('id', $request->id)->update($data);

            return redirect()->back()->with(['success'=>'Berhasil Edit']);
        }catch(Exception $e){
            return redirect()->back()->with(['error'=>'Gagal Edit']);
        }
    }

    public function hapus($id)
    {
        try{
            // Delete Image In Folder
            $donasi = DB::table('tips_trick')->where('id', $id)->first();
            $path = public_path()."/upload/tipstrick/".$donasi->image;
            if(is_file($path)){
                @unlink($path);
            }

            // Delete Data
            DB::table('tips_trick')->where('id', $id)->delete();

            return redirect()->back()->with(['success'=>'Berhasil Delete']);
        }catch(Exception $e){
            return redirect()->back()->with(['error'=>'Gagal'.$e]);
        }
    }

}
