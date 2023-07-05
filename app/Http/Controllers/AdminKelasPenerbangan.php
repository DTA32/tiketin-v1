<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kelas_penerbangan;

class AdminKelasPenerbangan extends Controller
{
    public function get($id)
    {
        $kelas_penerbangan = kelas_penerbangan::where('penerbangan_id', $id)->get();
        return view('admin.kelaspenerbangan', ['kelas_penerbangan' => $kelas_penerbangan, 'id' => $id]);
    }
    public function add(Request $request){
        $data = $request->validate([
            'penerbangan_id' => 'required',
            'tipe_kelas' => 'required',
            'harga' => 'required',
            'jumlah_kursi' => 'required',
            'seat_layout' => 'required'
        ]);
        $newKelasPenerbangan = kelas_penerbangan::create($data);
        return redirect()->route('admin.kelaspenerbangan');
    }
    public function delete(Request $request, $id, $id_kelas){
        $kelas_penerbangan = kelas_penerbangan::find($id_kelas);
        $kelas_penerbangan->delete();
        return redirect()->route('admin.kelaspenerbangan', $id);
    }
    public function update(Request $request){
        $data = $request->validate([
            'edit_id_kelas_penerbangan' => 'required',
            'edit_penerbangan_id' => 'required',
            'edit_tipe_kelas' => 'required',
            'edit_harga' => 'required',
        ]);
        $kelas_penerbangan = kelas_penerbangan::find(intval($data['edit_id_kelas_penerbangan']));
        $kelas_penerbangan->penerbangan_id = $data['edit_penerbangan_id'];
        $kelas_penerbangan->tipe_kelas = $data['edit_tipe_kelas'];
        $kelas_penerbangan->harga = $data['edit_harga'];
        $kelas_penerbangan->save();
        return redirect()->route('admin.kelaspenerbangan', $data['edit_penerbangan_id']);
    }
    public function getDetail($id)
    {
        $kelas_penerbangan = kelas_penerbangan::find($id);
        return response()->json(['kelas_penerbangan' =>$kelas_penerbangan]);
    }
    public function getSeatLayout($id)
    {
        $kelas_penerbangan = kelas_penerbangan::find($id);
        return response()->json(['kelas_penerbangan' =>$kelas_penerbangan]);
    }
}
