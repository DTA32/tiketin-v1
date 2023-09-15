<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerbangan;

class Step2Controller extends Controller
{
    public function get(Request $request){
        if(str_contains(request()->headers->get('referer'), 'step3')){
            $request->session()->forget('penumpang');
        }
        $penerbangan = penerbangan::find($request->input('penerbangan_id'));
        return view('step2', ['penerbangan' => $penerbangan, 'penumpang' => $request->input('penumpang'), 'kelas' => $request->input('kelas')]);
    }
}
