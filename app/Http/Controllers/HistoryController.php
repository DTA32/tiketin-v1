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
        $pemesanan = pemesanan::where('metode_pembayaran', 3)->get();
        return view('history', ['pemesanan' => $pemesanan]);
    }
    public function getDetail($id){
        $pemesanan = pemesanan::where('id', $id)->first();
        $penerbangan = penerbangan::where('id', $pemesanan->penerbangan_id)->first();
        $pemesanan_penumpang = pemesanan_penumpang::where('pemesanan_id', $pemesanan->id)->get();
        $pemesanan_harga = pemesanan_harga::where('pemesanan_id', $pemesanan->id)->first();
        return view('history_detail', ['pemesanan' => $pemesanan, 'penerbangan' => $penerbangan, 'pemesanan_penumpang' => $pemesanan_penumpang, 'pemesanan_harga' => $pemesanan_harga]);
    }
}
