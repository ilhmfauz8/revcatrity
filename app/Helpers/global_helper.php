<?php

    if(!function_exists('tgl_indo')){
        function tgl_indo($tanggal)
        {
            $bulan = array(
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $pecahkan = explode('-', $tanggal);

            return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
        }
    }

    if(!function_exists('getUser')){
        function getUser($id)
        {
            $user = DB::table('users')->where('id', $id)->first();

            return $user;
        }
    }

?>
