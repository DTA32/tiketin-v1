<?php

use Illuminate\Support\Facades\DB;
use App\Models\penerbangan;

if(!function_exists('searchPenerbanganFull')){
    function searchPenerbanganFull($id){
        $penerbangan = penerbangan::find($id);
        $penerbanganFull = DB::table('penerbangan AS p')
        ->join('bandara AS bb', 'p.bandara_asal_id', '=', 'bb.id')
        ->join('bandara AS bd', 'p.bandara_tujuan_id', '=', 'bd.id')
        ->join('kelas_penerbangan AS kp', 'p.id', '=', 'kp.penerbangan_id')
        ->select(
            'p.id',
            'bb.kota AS kota_asal', 'bd.kota AS kota_tujuan',
            'bb.nama_bandara AS nama_bandara_asal', 'bd.nama_bandara AS nama_bandara_tujuan',
            'bb.kode_bandara AS kode_bandara_asal', 'bd.kode_bandara AS kode_bandara_tujuan',
            'p.waktu_berangkat', 'p.waktu_sampai',
            'p.maskapai', 'p.tipe_pesawat',
            'kp.tipe_kelas', 'kp.harga', 'kp.jumlah_kursi')
        ->where('p.id', '=', $id)
        ->first();
        return $penerbanganFull;
    }
}
