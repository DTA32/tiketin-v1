<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\pemesanan_penumpang;
use App\Models\pemesanan_harga;
use App\Models\penerbangan;

class Step4Controller extends Controller
{
    public function get(Request $request){
        // penerbangan
        $penerbangan = penerbangan::find($request->input('penerbangan_id'));
        // detail penumpang
        $penumpangArray = [];
        foreach($request->input('nama_lengkap') as $penumpangs){
            $penumpangA = [
                'nama' => $penumpangs,
                'kursi_penerbangan_id' => null
            ];
            array_push($penumpangArray, $penumpangA);
        }
        $request->session()->put('penumpang', $penumpangArray);
        // harga
        $harga_kelas = DB::table('penerbangan as p')
                        ->join('kelas_penerbangan as kp', 'p.id', '=', 'kp.penerbangan_id')
                        ->select('*')
                        ->where('penerbangan_id', '=', $request->input('penerbangan_id'))
                        ->where('tipe_kelas', '=', $request->input('kelas'))
                        ->first();

        $harga['biaya_dasar'] = $harga_kelas->harga;
        $harga['kuantitas'] = count($penumpangArray);
        $harga['biaya_layanan'] = 10000;
        $harga['total'] = $harga_kelas->harga * count($penumpangArray) + 10000;
        $request->session()->put('harga', $harga);

        return view('step4', ['penerbangan' => $penerbangan, 'penumpang' => $penumpangArray, 'kelas' => $request->input('kelas')]);

    }
}
