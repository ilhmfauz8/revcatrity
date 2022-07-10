<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Midtrans\Config as MidtransConfig;
use Midtrans\Snap as MidtransSnap;
use App\Mail\Laporan;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class FrontController extends Controller
{
    public function home()
    {
        $datenow = date('Y-m-d H:i:s');
        $data['donasi'] = DB::table('master_donasi')
        ->where('status',2)
        ->where('end_date','>=',$datenow)
        ->orderBy('created_at','DESC')
        ->paginate(3);
        // ->toSql();
        // dd($data['donasi']);
        
        $data['tips_trick'] = DB::table('tips_trick')->where('status', 2)->get();
        $data['delay'] = 2;

        return view('landing.home', $data);
    }

    public function about()
    {
        return view('landing.about');
    }

    public function causes()
    {
        date_default_timezone_set("Asia/Bangkok");

        $tomorrow = Carbon::tomorrow();
        $datenow = date('Y-m-d H:i:s');
        // $datenow->modify('+1 day');
        $data['donasi'] = DB::table('master_donasi')
                        ->where('status',2)
                        ->where('end_date','>=',$datenow)
                        ->orderBy('created_at','DESC')
                        ->paginate(8);
                        // ->toSql();
                        // dd($data['donasi']);
        $data['delay'] = 2;

        return view('landing.causes', $data);
    }

    // public function causes1(){

    //  $data = DB::table("master_donasi")
    //  ->select("date_part ('day', '$created_at'::timestamp - '$end_date'::timestamp)")
    //  ->where("status", "=", 2)
    //  ->get();
    // if($data > '0'){
    //     return
    // }
    // }

    public function causes_detail($id)
    {
        $data['donasi'] = DB::table('master_donasi')->where('id',$id)->first();

        return view('landing.causes_detail', $data);
    }

    public function payment(Request $request){
        MidtransConfig::$serverKey = 'SB-Mid-server-_C2oGuyG7g8wHurBbzntb27z';
        MidtransConfig::$isProduction = false;
        MidtransConfig::$isSanitized = true;
        MidtransConfig::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand().'_'.$request->get('id'),
                'gross_amount' => $request->get('jumlah'),
            ),
            "item_details"=> array(
                  [
                    "id"=> $request->get('id'),
                    "price"=> $request->get('jumlah'),
                    "quantity"=> 1,
                    "name"=> $request->get('judul'),
                  ]
            ),
            'customer_details' => array(
                'first_name' => $request->get('nama'),
                'last_name' => '',
                'email' => $request->get('email'),
                'phone' => $request->get('telepon'),
            ),
        );

        $data = [
            'nama_pendonasi'     => $request->get('nama'),
            'telepon_pendonasi'  => $request->get('telepon'),
            'email_pendonasi'    => $request->get('email'),

        ];


    //     $data = \Validator::make($request->all(),[
    //     'nama_pendonasi' => 'required',
    //     'telepon_pendonasi'  => 'required',
    //     'email_pendonasi' => 'required',
    // ]);

    // if ($data->fails())

    // {

    //     return response()->json(['errors'=>$data->errors()->all()]);

    // }
        // $order_id = isset($_GET['id']) ? $_GET['id'] : NULL;
        // $nama_pendonasi = isset($_GET['nama']) ? $_GET['nama'] : NULL;
        // $telepon_pendonasi = isset($_GET['telepon']) ? $_GET['telepon'] : NULL;
        // $jumlah_pendonasi = isset($_GET['jumlah']) ? $_GET['jumlah'] : NULL;
        // $email_pendonasi = isset($_GET['email']) ? $_GET['email'] : NULL;

        // $data = [
        //     // 'order_id'                            => $order_id,
        //     'order_id'                            => rand().'_'.$request->get('id'),
        //     'nama_pendonasi'               => $nama_pendonasi,
        //     'telepon_pendonasi'               => $telepon_pendonasi,
        //     'jumlah_pendonasi'               => $jumlah_pendonasi,
        //     'email_pendonasi'               => $email_pendonasi,

        // ];
        // DB::table('pendonasi')->insert($data);
        // echo var_dump($data);exit;

        $snapToken = MidtransSnap::getSnapToken($params);

        // return $snapToken;
        return [
            'midtrans' => $snapToken,
            'data' => $data
        ];
    }

    public function payment_save(Request $request){
        $order_id = isset($request->order_id) ? $request->order_id : NULL;
        $payment_type = isset($request->payment_type) ? $request->payment_type : NULL;
        $pdf_url = isset($request->pdf_url) ? $request->pdf_url : NULL;
        $status_code = isset($request->status_code) ? $request->status_code : NULL;
        $status_message = isset($request->status_message) ? $request->status_message : NULL;
        $transaction_id = isset($request->transaction_id) ? $request->transaction_id : NULL;
        $transaction_status = isset($request->transaction_status) ? $request->transaction_status : NULL;
        $transaction_time = isset($request->transaction_time) ? $request->transaction_time : NULL;
        $gross_amount = isset($request->gross_amount) ? $request->gross_amount : NULL;

        $nama_pendonasi = isset($request->nama_pendonasi) ? $request->nama_pendonasi : NULL;
        $email_pendonasi = isset($request->email_pendonasi) ? $request->email_pendonasi : NULL;
        $telepon_pendonasi = isset($request->telepon_pendonasi) ? $request->telepon_pendonasi : NULL;

        $data = [
            'order_id'              => $order_id,
            'payment_type'          => $payment_type,
            'pdf_url'               => $pdf_url,
            'status_code'           => $status_code,
            'status_message'        => $status_message,
            'transaction_id'        => $transaction_id,
            'transaction_status'    => $transaction_status,
            'transaction_time'      => $transaction_time,
            'gross_amount'          => $gross_amount
        ];
        DB::table('transaksi')->insert($data);

        $datapendonasi = [
            'order_id'                            => $order_id,
            // 'order_id'                            => rand().'_'.$request->get('id'),
            'nama_pendonasi'               => $nama_pendonasi,
            'telepon_pendonasi'               => $telepon_pendonasi,
            'jumlah_pendonasi'               => $gross_amount,
            'email_pendonasi'               => $email_pendonasi,

        ];
        DB::table('pendonasi')->insert($datapendonasi);
        // echo var_dump($data);exit;

        if($transaction_status == 'settlement'){
            $dt = explode("_",$order_id);
            $donasi = DB::table('master_donasi')->where('id',$dt[1])->first();
            $raised = $donasi->raised;
            $upt_raised = $raised + $gross_amount;
            DB::table('master_donasi')->where('id',$dt[1])->update(['raised'=>$upt_raised]);
        }

        return $data;
    }

    public function event()
    {
        return view('landing.event');
    }

    public function event_detail()
    {
        return view('landing.event_detail');
    }

    public function tipstrick()
    {
        $data['delay'] = 2;
        $data['tips_trick'] = DB::table('tips_trick')->where('status', 2)->paginate(12);

        return view('landing.tipstrick', $data);
    }

    public function tipstrick_detail($id)
    {
        $data['tips_trick'] = DB::table('tips_trick')->where('id', $id)->first();

        return view('landing.tipstrick_detail', $data);
    }

    public function lapor()
    {
        $data['penampung'] = DB::table('users')->where('status', 1)->get();

        return view('landing.lapor', $data);
    }

    public function lapor_kirim(Request $request)
    {
        try{
            date_default_timezone_set("Asia/Bangkok");
            if($request->hasFile('foto')){
                $file = $request->file('foto');
                $destination = 'upload/laporan';
                $name_file = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($destination,$name_file);
            }else{
                $name_file = null;
            }

            $data = [
                'nama'              => $request->nama,
                'email'             => $request->email,
                'telpon'            => $request->phone,
                'alamat'            => $request->address,
                'id_penampung'      => $request->id_penampung,
                'jenis_kucing'      => $request->jenis,
                'foto'              => $name_file,
                'pesan'             => $request->messaage,
                'status'            => 1,
                'created_at'        => date("Y-m-d H:i:s")
            ];
            DB::table('laporan')->insert($data);

            // Send Mail
            $event = new \stdClass();
            $event->senderEmail = $request->email;
            $event->email = $request->email;
            $event->senderName = 'CATRITY';
            $event->subject = 'LAPORAN PROGRES PENAMPUNGAN';
            $event->message = '';
            $event->name = $request->nama;
            $event->status = 'TERKIRIM';
            $event->pesan = $request->messaage;

            Mail::send((new Laporan($event))->delay(30));

            return redirect()->back()->with(['success'=>'Terimakasih, Status Akan Dikirim Melalui Email Tercantum !']);
        }catch(Exception $e){
            return redirect()->back()->with(['error'=>'Gagal'.$e]);
        }
    }

}
