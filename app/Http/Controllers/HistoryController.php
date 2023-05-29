<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pemesanan;

class HistoryController extends Controller
{
    public function get(){
        $pemesanan = pemesanan::where('metode_pembayaran', 3)->get();
        return view('history', ['pemesanan' => $pemesanan]);
    }
    public function getDetail($id){
        $pemesanan = pemesanan::where('id', $id)->first();
        return view('history_detail', ['pemesanan' => $pemesanan]);
    }
}
