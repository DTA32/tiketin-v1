<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kursi_penerbangan;

class AdminKursiPenerbangan extends Controller
{
    public function get()
    {
        $kursi_penerbangan = kursi_penerbangan::all();
        return view('admin.kursipenerbangan', ['kursi_penerbangan' => $kursi_penerbangan]);
    }
    public function add(Request $request){
        $data = $request->validate([
            'kelas_id' => 'required',
            'nomor_kursi' => 'required',
            'status_kursi' => 'required',
            'penerbangan_id' => 'required',
        ]);
        $newKursiPenerbangan = kursi_penerbangan::create($data);
        return redirect()->route('admin.kursipenerbangan');
    }
}
