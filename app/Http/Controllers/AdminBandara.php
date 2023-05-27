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
        $newBandara = Bandara::create($data);
        return redirect()->route('admin.bandara');
    }
}
