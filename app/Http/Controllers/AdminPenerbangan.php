<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerbangan;
use App\Models\Bandara;

class AdminPenerbangan extends Controller
{
    public function get()
    {
        $penerbangan = penerbangan::all();
        $bandara = Bandara::distinct()->get();
        return view('admin.penerbangan', ['penerbangan' => $penerbangan, 'bandara' => $bandara]);
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
        if($data['bandara_asal_id'] == $data['bandara_tujuan_id']){
            $request->session()->flash('error', 'Bandara asal dan tujuan tidak boleh sama');
            return redirect()->route('admin.penerbangan');
        }
        if($data['waktu_berangkat'] >= $data['waktu_sampai']){
            $request->session()->flash('error', 'Waktu sampai tidak boleh lebih kecil dari waktu berangkat');
            return redirect()->route('admin.penerbangan');
        }
        $newPenerbangan = Penerbangan::create($data);
        $request->session()->flash('success', 'Penerbangan berhasil ditambahkan');
        return redirect()->route('admin.penerbangan');
    }
    public function delete(Request $request, $id){
        $penerbangan = Penerbangan::find($id);
        $penerbangan->delete();
        $request->session()->flash('success', 'Penerbangan berhasil dihapus');
        return redirect()->route('admin.penerbangan');
    }
    public function getDetail($id)
    {
        $penerbangan = Penerbangan::with('bandara_asal', 'bandara_tujuan')->find($id);
        return response()->json(['penerbangan' =>$penerbangan]);
    }
    public function update(Request $request){
        $data = $request->validate([
            'edit_id' => 'required',
            'edit_bandara_asal_id' => 'required',
            'edit_bandara_tujuan_id' => 'required',
            'edit_waktu_berangkat' => 'required',
            'edit_waktu_sampai' => 'required',
            'edit_maskapai' => 'required',
            'edit_tipe_pesawat' => 'required',
        ]);
        if($data['edit_bandara_asal_id'] == $data['edit_bandara_tujuan_id']){
            $request->session()->flash('error', 'Bandara asal dan tujuan tidak boleh sama');
            return redirect()->route('admin.penerbangan');
        }
        if($data['edit_waktu_berangkat'] >= $data['edit_waktu_sampai']){
            $request->session()->flash('error', 'Waktu sampai tidak boleh lebih kecil dari waktu berangkat');
            return redirect()->route('admin.penerbangan');
        }
        $penerbangan = Penerbangan::find(intval($data['edit_id']));
        $penerbangan->bandara_asal_id = $data['edit_bandara_asal_id'];
        $penerbangan->bandara_tujuan_id = $data['edit_bandara_tujuan_id'];
        $penerbangan->waktu_berangkat = $data['edit_waktu_berangkat'];
        $penerbangan->waktu_sampai = $data['edit_waktu_sampai'];
        $penerbangan->maskapai = $data['edit_maskapai'];
        $penerbangan->tipe_pesawat = $data['edit_tipe_pesawat'];
        $penerbangan->save();
        $request->session()->flash('success', 'Penerbangan berhasil diupdate');
        return redirect()->route('admin.penerbangan');
    }
}
