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
        $kelas_penerbangan_id = kelas_penerbangan::where('penerbangan_id', $request->input('penerbangan_id'))
                                                ->where('tipe_kelas', $request->input('kelas'))
                                                ->first()->id;
        $pemesanan = pemesanan::create([
            'penerbangan_id' => $request->input('penerbangan_id'),
            'status' => 0,
            'metode_pembayaran' => 0,
            'referensi_pembayaran' => '0',
            'kelas_penerbangan_id' => $kelas_penerbangan_id,
            'userId' => auth()->user()->id
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
        kelas_penerbangan::where('id', $kelas_penerbangan_id)
                        ->decrement('jumlah_kursi', count($penumpangs));

        // update seat_layout

        $kelas = kelas_penerbangan::where('id', $kelas_penerbangan_id)->first();
        $seatLayout = json_decode($kelas->seat_layout, true);
        foreach($penumpangs as $penumpang){
            $arr = str_split($penumpang['kursi_penerbangan']);
            $row = 0;
            $key = 0;
            $col = 0;
            if(sizeof($arr) == 3){
                $row = $arr[0].$arr[1];
                $key = 2;
            }
            else{
                $row = $arr[0];
                $key = 1;
            }
            if($arr[$key] == 'A'){
                $col = 0;
            }
            else if ($arr[$key] == 'B'){
                $col = 1;
            }
            else if ($arr[$key] == 'C'){
                $col = 2;
            }
            else if ($arr[$key] == 'D'){
                $col = 3;
            }
            else if ($arr[$key] == 'E'){
                $col = 4;
            }
            else if ($arr[$key] == 'F'){
                $col = 5;
            }
            $seatLayout['rows'][intval($row)-1]['seats'][$col]['available'] = false;
        }

        $kelas->seat_layout = json_encode($seatLayout, JSON_PRETTY_PRINT);
        $kelas->save();

        $request->session()->forget('penumpang');

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
        $request->session()->put('success', 'Pemesanan berhasil!');
        return to_route('home');
    }
}
