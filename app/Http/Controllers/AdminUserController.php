<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function get(){
        $user = User::all();
        return view('admin.user', ['user' => $user]);
    }
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        Session::flash('success', 'User berhasil dihapus');
        return redirect()->route('admin.user');
    }
    public function add(Request $request){
        $data = $request->validate
        ([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        User::factory()->make([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ])->save();
        Session::flash('success', 'User berhasil ditambahkan');
        return redirect()->route('admin.user');
    }
    public function update(Request $request){
        $data = $request->validate
        ([
            'edit_id' => 'required',
            'edit_name' => 'required',
            'edit_email' => 'required',
        ]);
        $user = User::find($data['edit_id']);
        $user->name = $data['edit_name'];
        $user->email = $data['edit_email'];
        if($request->edit_password != null){
            $user->password = Hash::make($request->edit_password);
        }
        $user->save();
        Session::flash('success', 'User berhasil diubah');
        return redirect()->route('admin.user');
    }
}
