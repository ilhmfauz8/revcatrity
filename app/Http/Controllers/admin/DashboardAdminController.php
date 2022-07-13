<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        date_default_timezone_set("Asia/Bangkok");
        $data['user'] = Auth::user();

        $data['now'] = date('Y');
        $data['start'] = date('Y') - 5;
        $data['end'] = date('Y') + 5;
        $data['total_transaksi_donasi'] = DB::table('transaksi')->where('transaction_status', 'settlement')->sum('gross_amount');
        $data['total_pengeluaran_penampung'] = DB::table('transaksi_pengeluaran_penampung')->sum('total');
        $data['total_pengeluaran_admin'] = DB::table('transaksi_pengeluaran_donasi')->sum('total');
        
        return view('admin.dashboard', $data);
    }

    public function jumlah_transaksi()
    {
        $tahun = $_GET['tahun'];
        $series = [];
        $seriesData = [];
        $category = [];
        $tempCategory = [];

        $data = array("01"=>"Januari", "02"=>"Februari", "03"=>"Maret", "04"=>"April", "05"=>"Mei", "06"=>"Juni", "07"=>"Juli", "08"=>"Agustus", "09"=>"September", "10"=>"Oktober", "11"=>"November", "12"=>"Desember");
        foreach($data as $key => $val){
            $category[] = $val;
            $tempCategory[] = $key;
        }

        $seriesData['showInLegend'] = false;
        foreach($tempCategory as $val){
            $data = DB::table('transaksi')->whereYear('transaction_time', $tahun)->whereMonth('transaction_time', $val)->count();
            $seriesData['name'] = 'Total';
            $seriesData['data'][] = (int)$data;
        }
        $series = $seriesData;
        $seriesData = [];

        echo json_encode([
            'series' => $series,
            'category' => $category
        ]); 
    }

    public function total_lapor()
    {
        $tahun = $_GET['tahun'];
        $series = [];
        $seriesData = [];
        $category = [];
        $tempCategory = [];

        $data = array("01"=>"Januari", "02"=>"Februari", "03"=>"Maret", "04"=>"April", "05"=>"Mei", "06"=>"Juni", "07"=>"Juli", "08"=>"Agustus", "09"=>"September", "10"=>"Oktober", "11"=>"November", "12"=>"Desember");
        foreach($data as $key => $val){
            $category[] = $val;
            $tempCategory[] = $key;
        }

        $seriesData['showInLegend'] = false;
        foreach($tempCategory as $val){
            $data = DB::table('laporan')->whereYear('created_at', $tahun)->whereMonth('created_at', $val)->count();
            $seriesData['name'] = 'Total';
            $seriesData['data'][] = (int)$data;
        }
        $series = $seriesData;
        $seriesData = [];

        echo json_encode([
            'series' => $series,
            'category' => $category
        ]); 
    }

}
