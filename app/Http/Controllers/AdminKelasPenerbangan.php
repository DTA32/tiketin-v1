<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kelas_penerbangan;

class AdminKelasPenerbangan extends Controller
{
    public function get()
    {
        $kelas_penerbangan = kelas_penerbangan::all();
        return view('admin.kelaspenerbangan', ['kelas_penerbangan' => $kelas_penerbangan]);
    }
    public function add(Request $request){
        $data = $request->validate([
            'penerbangan_id' => 'required',
            'tipe_kelas' => 'required',
            'harga' => 'required',
        ]);
        $newKelasPenerbangan = kelas_penerbangan::create($data);
        return redirect()->route('admin.kelaspenerbangan');
    }
}
