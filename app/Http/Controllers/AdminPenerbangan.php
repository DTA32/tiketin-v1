<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerbangan;

class AdminPenerbangan extends Controller
{
    public function get()
    {
        $penerbangan = penerbangan::all();
        return view('admin.penerbangan', ['penerbangan' => $penerbangan]);
    }
    public function add(Request $request){
        $data = $request->validate([
            'bandara_asal_id' => 'required',
            'bandara_tujuan_id' => 'required',
            'waktu_berangkat' => 'required',
            'waktu_sampai' => 'required',
            'maskapai' => 'required',
            'tipe_pesawat' => 'required',
        ]);
        $newPenerbangan = Penerbangan::create($data);
        return redirect()->route('admin.penerbangan');
    }
}
