<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function get()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        $input = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'conf_password' => ['required'],
        ]);
        if($request->input('password') != $request->input('conf_password')){
            $request->session()->put('error', 'Password and confirmation password do not match.');
            return back();
        }
        User::factory()->make([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ])->save();
        $request->session()->put('success', 'User registered successfully.');
        return redirect('/login');
    }
}
