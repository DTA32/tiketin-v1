<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pemesanan;
use App\Models\pemesanan_penumpang;
use App\Models\pemesanan_harga;
use Illuminate\Support\Facades\Session;
use App\Models\kelas_penerbangan;

class Step5Controller extends Controller
{
    public function post(Request $request){
        // buat pemesanan baru
        $pemesanan = pemesanan::create([
            'penerbangan_id' => $request->input('penerbangan_id'),
            'status' => 0,
            'metode_pembayaran' => 0,
            'referensi_pembayaran' => '0',
            'kelas_penerbangan_id' => $request->input('kelas')
        ]);
        $pemesanan->save();

        $penumpangs = $request->session()->get('penumpang');
        foreach ($penumpangs as $penumpang) {
            $newPenumpang['pemesanan_id'] = $pemesanan->id;
            $newPenumpang['nama'] = $penumpang['nama'];
            $newPenumpang['kursi_penerbangan'] = $penumpang['kursi_penerbangan'];
            pemesanan_penumpang::create($newPenumpang);
        }

        $harga = $request->session()->get('harga');
        pemesanan_harga::create([
            'pemesanan_id' => $pemesanan->id,
            'biaya_dasar' => $harga['biaya_dasar'],
            'kuantitas' => $harga['kuantitas'],
            'biaya_layanan' => $harga['biaya_layanan'],
            'total' => $harga['total']
        ]);
        kelas_penerbangan::where('penerbangan_id', $request->input('penerbangan_id'))
                        ->where('tipe_kelas', $pemesanan->kelas_penerbangan_id)
                        ->decrement('jumlah_kursi', count($penumpangs));

        // TO-DO: update seat_layout

        $kelas = kelas_penerbangan::where('penerbangan_id', $request->input('penerbangan_id'))->first();
        $seatLayout = json_decode($kelas->seat_layout, true);
        foreach($penumpangs as $penumpang){
            $arr = str_split($penumpang['kursi_penerbangan']);
            $row = $arr[0];
            if($arr[1] == 'A'){
                $col = 0;
            }
            else if ($arr[1] == 'B'){
                $col = 1;
            }
            else if ($arr[1] == 'C'){
                $col = 2;
            }
            else if ($arr[1] == 'D'){
                $col = 3;
            }
            else if ($arr[1] == 'E'){
                $col = 3;
            }
            else if ($arr[1] == 'F'){
                $col = 3;
            }
            $seatLayout['rows'][intval($row)-1]['seats'][$col]['available'] = false;
        }

        $kelas->seat_layout = json_encode($seatLayout, JSON_PRETTY_PRINT);
        $kelas->save();

        return view('step5', ['pemesanan' => $pemesanan]);
    }

    public function get(Request $request){
        $pemesanan = pemesanan::where('id', $request->input('pemesanan_id'))->first();
        if($request->input('metode_pembayaran') == 1){
            return view('step51', ['pemesanan' => $pemesanan]);
        }
        else if($request->input('metode_pembayaran') == 2){
            return view('step52', ['pemesanan' => $pemesanan]);
        }
        else if($request->input('metode_pembayaran') == 3){
            return view('step53', ['pemesanan' => $pemesanan]);
        }
    }

    public function update(Request $request){
        $pemesanan = pemesanan::where('id', $request->input('pemesanan_id'))->first();
        if($request->input('metode_pembayaran') == 1){
            $pemesanan->update([
                'status' => 1,
                'metode_pembayaran' => $request->input('metode_pembayaran'),
                'referensi_pembayaran' => 'CARD-'.substr($request->input('nomorKartu'), 0, 4)
            ]);
        }
        else{
            $pemesanan->update([
                'status' => 1,
                'metode_pembayaran' => $request->input('metode_pembayaran'),
                'referensi_pembayaran' => $request->input('referensi_pembayaran'),
            ]);
        }
        $pemesanan->save();
        $request->session()->flush();
        return view('home')->with('success', 'Pemesanan berhasil!');
    }
}
