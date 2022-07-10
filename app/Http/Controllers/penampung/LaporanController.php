<?php

namespace App\Http\Controllers\penampung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Mail\Laporan;
use Illuminate\Support\Facades\Mail;

class LaporanController extends Controller
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
        $data['donasi'] = DB::table('master_donasi')->orderBy('created_at','DESC')->get();
        $data['laporan'] = DB::table('laporan')->where('id_penampung',$id_users)->orderBy('created_at','ASC')->get();

        return view('penampung.laporan', $data);
    }

    public function edit(Request $request)
    {
        try{
            $laporan = DB::table('laporan')->where('id',$request->id)->first();

            // Send Mail
            $event = new \stdClass();
            $event->senderEmail = $request->email;
            $event->email = $request->email;
            $event->senderName = 'CATRITY';
            $event->subject = 'LAPORAN PROGRES PENAMPUNGAN';
            $event->message = '';
            $event->name = $request->nama;
            $event->status = ($laporan->status==1) ? 'SUDAH DIPROSES' : 'SELESAI';
            $event->pesan = $request->pesan;

            Mail::send((new Laporan($event))->delay(30));

            // Update
            DB::table('laporan')->where('id',$request->id)->update(['status'=>$request->status_data]);

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
