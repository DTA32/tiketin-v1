<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\penerbangan;
use App\Models\kelas_penerbangan;

class Step4Controller extends Controller
{
    public function get(Request $request){
        // penerbangan !!
        $penerbangan = penerbangan::find($request->input('penerbangan_id'));
        // detail penumpang !!
        // $penumpangArray = [];
        // foreach($request->input('nama_lengkap') as $penumpangs){
        //     $penumpangA = [
        //         'nama' => $penumpangs,
        //         'kursi_penerbangan' => null
        //     ];
        //     array_push($penumpangArray, $penumpangA);
        // }
        // $request->session()->put('penumpang', $penumpangArray);

        $kursi_input = [];

        foreach($request->input('penumpang') as $kursi){
            array_push($kursi_input, explode("|", $kursi));
        }

        foreach ($request->session()->get('penumpang') as $key => $value) {
            $request->session()->put('penumpang.'.$key.'.kursi_penerbangan', $kursi_input[$key][2]);
        }

        // dd($request->session()->get('penumpang'));
        // harga !!
        // $harga_kelas = DB::table('penerbangan as p')
        //                 ->join('kelas_penerbangan as kp', 'p.id', '=', 'kp.penerbangan_id')
        //                 ->select('*')
        //                 ->where('penerbangan_id', '=', $request->input('penerbangan_id'))
        //                 ->where('tipe_kelas', '=', $request->input('kelas'))
        //                 ->first();
        $harga_kelas = kelas_penerbangan::where('penerbangan_id', '=', $request->input('penerbangan_id'))
                        ->where('tipe_kelas', '=', $request->input('kelas'))
                        ->first();

        $harga['biaya_dasar'] = $harga_kelas->harga;
        $harga['kuantitas'] = count(Session::get('penumpang'));
        $harga['biaya_layanan'] = 10000;
        $harga['total'] = $harga_kelas->harga * count(Session::get('penumpang')) + 10000;
        $request->session()->put('harga', $harga);

        return view('step4', ['penerbangan' => $penerbangan, 'kelas' => $request->input('kelas')]);

    }
}
