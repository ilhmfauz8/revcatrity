<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Hash;
use PHPUnit\Framework\MockObject\Stub\ReturnCallback;

class PendonasiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        date_default_timezone_set("Asia/Bangkok");
        $data['no'] = 1;
        // $data['pendonasi'] = DB::select('SELECT transaksi.order_id , pendonasi.nama_pendonasi , pendonasi.telepon_pendonasi , pendonasi.email_pendonasi , transaksi.payment_type , 
        // transaksi.status_message , transaksi.transaction_status , transaksi.transaction_time , transaksi.gross_amount 
        // FROM transaksi
        // INNER JOIN pendonasi on transaksi.order_id = pendonasi.order_id');
        
        return view('admin.pendonasi', $data);
    }

    public function getData()
    {
        // $a = '1112590378_12';
        $pendonasi = DB::select("SELECT transaksi.order_id , pendonasi.nama_pendonasi , pendonasi.telepon_pendonasi , pendonasi.email_pendonasi ,
        transaksi.payment_type , transaksi.status_message , transaksi.transaction_status , transaksi.transaction_time , transaksi.gross_amount 
        FROM transaksi
        LEFT JOIN pendonasi on transaksi.order_id = pendonasi.order_id 
        -- WHERE transaksi.order_id = '' 
        ORDER BY transaction_time DESC");
        // var_dump($pendonasi);
        // die;
        return $pendonasi;
    }

    

    

}
