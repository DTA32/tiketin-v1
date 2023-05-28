<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pemesanan_penumpang;
use App\Models\pemesanan_harga;
use App\Models\penerbangan;

class Step4Controller extends Controller
{
    public function get(Request $request){
        // penerbangan
        $penerbangan = penerbangan::find($request->input('penerbangan_id'));
        // detail penumpang
        foreach($request->input('nama_lengkap') as $penumpangs){
            $newPenumpang['pemesanan_id'] = null;
            $newPenumpang['nama'] = $penumpangs;
            $newPenumpang['kursi_penerbangan_id'] = null;
            $newP = pemesanan_penumpang::create($newPenumpang);
        }
        // harga
        $harga_kelas = DB::table('penerbangan as p')
                        ->join('kelas_penerbangan as kp', 'p.id', '=', 'kp.penerbangan_id')
                        ->select('*')
                        ->where('penerbangan_id', '=', $request->input('penerbangan_id'))
                        ->first();
        $harga = pemesanan_harga::create([
            'pemesanan_id' => null,
            'biaya_dasar' => $harga_kelas->harga,
            'kuantitas' => $request->input('penumpang'),
            'biaya_layanan' => 10000,
            'total' => $harga_kelas->harga * $request->input('penumpang') + 10000
        ]);

        return view('step4', ['penerbangan' => $penerbangan, 'penumpang' => $newP, 'jumlah_penumpang' => $request->input('penumpang'), 'kelas' => $request->input('kelas'),'detail_harga' => $harga]);
    }
}
