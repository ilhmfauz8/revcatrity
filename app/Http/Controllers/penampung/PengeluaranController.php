<?php

namespace App\Http\Controllers\penampung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Mail\Laporan;
use Illuminate\Support\Facades\Mail;

class PengeluaranController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        date_default_timezone_set("Asia/Bangkok");
        $id_users = Auth::guard('penampung')->user()->id;

        $data['no'] = 1;
        $data['pengeluaran'] = DB::table('transaksi_pengeluaran_penampung')->where('id_penampung', $id_users)->orderBy('tanggal','DESC')->get();

        return view('penampung.pengeluaran', $data);
    }

    public function tambah(Request $request)
    {
        try{
            $id_users = Auth::guard('penampung')->user()->id;
            if($request->hasFile('bukti')){
                $file = $request->file('bukti');
                $destination = 'upload/bukti';
                $name_file = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($destination,$name_file);
            }else{
                $name_file = null;
            }

            $data = [
                'tanggal'       => $request->tanggal,
                'deskripsi'     => $request->keterangan,
                'bukti'         => $name_file,
                'total'         => str_replace(',','.',$request->total),
                'id_penampung'       => $id_users
            ];
            DB::table('transaksi_pengeluaran_penampung')->insert($data);

            return redirect()->back()->with(['success'=>'Berhasil Update']);
        }catch(Exception $e){
            return redirect()->back()->with(['error'=>'Gagal'.$e]);
        }
    }

    public function edit(Request $request)
    {
        try{
            $id_users = Auth::guard('penampung')->user()->id;
            $pengeluaran = DB::table('transaksi_pengeluaran_penampung')->where('id', $request->id)->first();
            if($request->hasFile('bukti')){
                $file = $request->file('bukti');
                $destination = 'upload/bukti';
                $name_file = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($destination,$name_file);
            }else{
                $name_file = $pengeluaran->bukti;
            }

            $data = [
                'tanggal'       => $request->tanggal,
                'deskripsi'     => $request->keterangan,
                'bukti'         => $name_file,
                'total'         => str_replace(',','.',$request->total),
                'id_penampung'  => $id_users
            ];
            DB::table('transaksi_pengeluaran_penampung')->where('id', $request->id)->update($data);

            return redirect()->back()->with(['success'=>'Berhasil Update']);
        }catch(Exception $e){
            return redirect()->back()->with(['error'=>'Gagal'.$e]);
        }
    }

    public function hapus($id)
    {
        try{
            // Delete Data
            DB::table('laporan')->where('id', $id)->delete();

            return redirect()->back()->with(['success'=>'Berhasil Delete']);
        }catch(Exception $e){
            return redirect()->back()->with(['error'=>'Gagal'.$e]);
        }
    }

}
