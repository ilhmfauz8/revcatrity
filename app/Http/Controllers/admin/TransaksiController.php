<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Hash;
use PHPUnit\Framework\MockObject\Stub\ReturnCallback;

class TransaksiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        date_default_timezone_set("Asia/Bangkok");
        $data['no'] = 1;
        $data['transaksi'] = DB::table('transaksi')->get();
        
        return view('admin.transaksi', $data);
    }

    public function getData()
    {
        $transaksi = DB::table('transaksi')->get();

        return $transaksi;
    }

    public function update_data()
    {
        $transaksi = DB::table('transaksi')->where('transaction_status','!=','settlement')->get();
        foreach($transaksi as $val){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_URL,"https://api.sandbox.midtrans.com/v2/".$val->order_id."/status");
            curl_setopt($ch, CURLOPT_USERPWD, 'SB-Mid-server-_C2oGuyG7g8wHurBbzntb27z' . ":" . '');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close ($ch);
            $result = json_decode($response, true);
            DB::table('transaksi')->where('order_id', $result['order_id'])->update([
                'status_message' => $result['status_message'],
                'transaction_status' => $result['transaction_status']
            ]);

            $dt = explode("_",$result['order_id']);
            $donasi = DB::table('master_donasi')->where('id',$dt[1])->first();
            $raised = $donasi->raised;
            $upt_raised = $raised + $result['gross_amount'];
            DB::table('master_donasi')->where('id',$dt[1])->update(['raised'=>$upt_raised]);
        }

        return 'BERHASIL';
    }

}
