<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bandara;

class AdminBandara extends Controller
{
    public function get()
    {
        $bandara = bandara::all();
        return view('admin.bandara', ['bandara' => $bandara]);
    }
    public function add(Request $request){
        $data = $request->validate
        ([
            'nama_bandara' => 'required',
            'kode_bandara' => 'required',
            'kota' => 'required',
        ]);
        if(Bandara::where('kode_bandara', $data['kode_bandara'])->first() != null){
            $request->session()->flash('error', 'Kode bandara sudah ada');
            return redirect()->route('admin.bandara');
        }
        $newBandara = Bandara::create($data);
        $request->session()->flash('success', 'Bandara berhasil ditambahkan');
        return redirect()->route('admin.bandara');
    }
    public function delete(Request $request, $id){
        $bandara = Bandara::find($id);
        $bandara->delete();
        $request->session()->flash('success', 'Bandara berhasil dihapus');
        return redirect()->route('admin.bandara');
    }
    public function update(Request $request){
        $data = $request->validate
        ([
            'edit_id_bandara' => 'required',
            'edit_nama_bandara' => 'required',
            'edit_kode_bandara' => 'required',
            'edit_kota' => 'required',
        ]);
        $bandara = Bandara::find(intval($data['edit_id_bandara']));
        $bandara->nama_bandara = $data['edit_nama_bandara'];
        $bandara->kode_bandara = $data['edit_kode_bandara'];
        $bandara->kota = $data['edit_kota'];
        $bandara->save();
        $request->session()->flash('success', 'Bandara berhasil diupdate');
        return redirect()->route('admin.bandara');
    }
}
