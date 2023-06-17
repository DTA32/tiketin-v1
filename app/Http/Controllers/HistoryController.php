<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pemesanan;
use App\Models\penerbangan;
use App\Models\pemesanan_harga;
use App\Models\pemesanan_penumpang;


class HistoryController extends Controller
{
    public function get(){
        $pemesanan = pemesanan::has('pemesanan_harga')->orderBy('id', 'desc')->get();
        return view('history', ['pemesanan' => $pemesanan]);
    }
    public function getDetail($id){
        $pemesanan = pemesanan::where('id', $id)->first();
        // unused feature : kalau user belum bayar bisa dibalikin ke step 5
        // if($pemesanan->status == 0){
        //     return view('step5', ['pemesanan' => $pemesanan]);
        // }
        return view('history_detail', ['pemesanan' => $pemesanan]);
    }
}
