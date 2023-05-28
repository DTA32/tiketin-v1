<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pemesanan;
use App\Models\pemesanan_penumpang;
use App\Models\pemesanan_harga;

class Step5Controller extends Controller
{
    public function post(Request $request){
        // buat pemesanan baru
        $pemesanan = pemesanan::create([
            'penerbangan_id' => $request->input('penerbangan_id'),
            'status' => 0,
            'metode_pembayaran' => 0,
            'referensi_pembayaran' => '0',
            'kelas_penerbangan_id' => $request->input('kelas')
        ]);
        $pemesanan->save();
        // update penumpang dengan pemesanan_id
        // harusnya pake dibawah ini kalo lebih dari 1, tapi ga sempet
        // foreach($request->input('penumpang') as $penumpang){
        //     $penumpang->where('id', $penumpang)->update(['pemesanan_id' => $pemesanan->id]);
        // }
        // sementara pake ini
        $penumpang = pemesanan_penumpang::where('id', $request->input('penumpang'))->update(['pemesanan_id' => $pemesanan->id]);
        // update detail harga dengan pemesanan_id
        $harga = pemesanan_harga::where('pemesanan_id', null)->first();

        return view('step5', ['pemesanan' => $pemesanan, 'harga' => $harga]);
    }
    public function get(Request $request){
        return view('step53', ['pemesanan_id' => $request->input('pemesanan_id')]);
        // if($request->input('metode_pembayaran' == 3)){
        // }
    }
    public function update(Request $request){
        $pemesanan = pemesanan::where('id', $request->input('pemesanan_id'))->first();
        $pemesanan->update([
            'status' => 1,
            'metode_pembayaran' => 3,
            'referensi_pembayaran' => 'XYZ456'
        ]);
        $pemesanan->save();
        return view('home')->with('success', 'Pemesanan berhasil!');
    }
}
