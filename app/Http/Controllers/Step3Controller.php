<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penerbangan;
use App\Models\kelas_penerbangan;

class Step3Controller extends Controller
{
    public function get(Request $request){

        // $kelas = kelas_penerbangan::where('penerbangan_id', $request->input('penerbangan_id'))->first();
        // $seatLayout = json_decode($kelas->seat_layout, true);
        // dd($seatLayout);

        $penerbangan = penerbangan::find($request->input('penerbangan_id'));
        // detail penumpang
        $penumpangArray = [];
        foreach($request->input('nama_lengkap') as $penumpangs){
            $penumpangA = [
                'nama' => $penumpangs,
                'kursi_penerbangan' => null
            ];
            array_push($penumpangArray, $penumpangA);
        }
        $request->session()->put('penumpang', $penumpangArray);

        $kelas_penerbangan = kelas_penerbangan::where('penerbangan_id', '=', $request->input('penerbangan_id'))
                        ->where('tipe_kelas', '=', $request->input('kelas'))
                        ->first();

        return view('step3', ['penerbangan' => $penerbangan, 'kelas' => $request->input('kelas'), 'kelas_penerbangan' => $kelas_penerbangan]);
    }
}
