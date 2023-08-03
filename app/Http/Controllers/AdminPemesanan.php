<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;

class AdminPemesanan extends Controller
{
    public function get()
    {
        $pemesanan = Pemesanan::all();
        return view('admin.pemesanan', ['pemesanan' => $pemesanan]);
    }
    public function getDetail($id)
    {
        $pemesanan = Pemesanan::with('penerbangan.bandara_asal', 'penerbangan.bandara_tujuan', 'pemesanan_harga', 'pemesanan_penumpang', 'kelas_penerbangan')->find($id);
        return response()->json(['pemesanan' =>$pemesanan]);
    }
}
