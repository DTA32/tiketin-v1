<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\pemesanan;
use App\Models\User;


class HistoryController extends Controller
{
    public function get(){
        // $pemesanan = pemesanan::where('userId', auth()->user()->id)->orderBy('id', 'desc')->get();
        $pemesanan = User::find(auth()->user()->id)->pemesanan()->orderBy('id', 'desc')->get();
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
    public function eticket($id){
        $pemesanan = pemesanan::where('id', $id)->first();
        return view('eticket', ['pemesanan' => $pemesanan]);
    }
    public function print($id){
        $pemesanan = pemesanan::where('id', $id)->first();
//        $pdf = PDF::loadview('print', ['pemesanan' => $pemesanan]);
//        return $pdf->download('eticket-'.$pemesanan->id.'.pdf');
        return view('print', ['pemesanan' => $pemesanan]);
    }
}
