<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bandara;

class TypeaheadController extends Controller
{
    public function typeahead(Request $request){
        $kota = bandara::select("kota")->where("kota","LIKE","%{$request->input('query')}%")->get();
        $data = array();
        foreach ($kota as $k) {
            $data[] = $k->kota;
        }
        return response()->json($data);
    }
}
