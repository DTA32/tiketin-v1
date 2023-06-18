<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penerbangan;

class Step3Controller extends Controller
{
    public function get(Request $request){
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
        return view('step3', ['penerbangan' => $penerbangan, 'kelas' => $request->input('kelas')]);
    }
}
