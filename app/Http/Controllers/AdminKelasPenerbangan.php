<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kelas_penerbangan;
use App\Models\penerbangan;
use Illuminate\Support\Facades\Storage;

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
        ]);
        $tipePesawatRaw = penerbangan::where('id', $data['penerbangan_id'])->first()->tipe_pesawat;
        $tipePesawatSplit = explode(' ', $tipePesawatRaw);
        // TBA: Other types
        /*
        if($tipePesawatSplit[1] === 'A320'){
            $data['jumlah_kursi'] = 80;
            $data['seat_layout'] = Storage::disk('local')->get('seatLayout/'.$data['tipe_kelas'].'/'.$tipePesawatSplit[1].'.json');
        }
        */
        // sementara all type pake A320, males ngisi macem2 tipe
        $data['jumlah_kursi'] = 80;
        $data['seat_layout'] = Storage::disk('local')->get('seatLayout/1/A320.json');

        $newKelasPenerbangan = kelas_penerbangan::create($data);
        $request->session()->flash('success', 'Kelas Penerbangan berhasil ditambahkan');
        return redirect()->route('admin.kelaspenerbangan.get', $data['penerbangan_id']);
    }
    public function delete(Request $request, $id, $id_kelas){
        $kelas_penerbangan = kelas_penerbangan::find($id_kelas);
        $kelas_penerbangan->delete();
        $request->session()->flash('success', 'Kelas Penerbangan berhasil dihapus');
        return redirect()->route('admin.kelaspenerbangan.get', $id);
    }
    public function update(Request $request){
        $data = $request->validate([
            'edit_id_kelas_penerbangan' => 'required',
            'edit_penerbangan_id' => 'required',
            'edit_tipe_kelas' => 'required',
            'edit_harga' => 'required',
            'edit_jumlah_kursi' => 'required',
        ]);
        $kelas_penerbangan = kelas_penerbangan::find(intval($data['edit_id_kelas_penerbangan']));
        $kelas_penerbangan->penerbangan_id = $data['edit_penerbangan_id'];
        $kelas_penerbangan->tipe_kelas = $data['edit_tipe_kelas'];
        $kelas_penerbangan->harga = $data['edit_harga'];
        $kelas_penerbangan->jumlah_kursi = $data['edit_jumlah_kursi'];
        $kelas_penerbangan->save();
        $request->session()->flash('success', 'Kelas Penerbangan berhasil diubah');
        return redirect()->route('admin.kelaspenerbangan.get', $data['edit_penerbangan_id']);
    }
    public function getDetail($id, $id_kelas)
    {
        $kelas_penerbangan = kelas_penerbangan::find($id_kelas);
        return response()->json([$kelas_penerbangan]);
    }
    public function getSeatLayout($id, $id_kelas)
    {
        $kelas_penerbangan = kelas_penerbangan::find($id_kelas)->seat_layout;
        return response()->json($kelas_penerbangan);
    }
}
