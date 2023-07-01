<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function get()
    {
        $name = Auth::user()->name;
        $email = Auth::user()->email;
        return view('profile', compact('name', 'email'));
    }
    public function update(Request $request)
    {
        $input = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $user = User::find(Auth::id());
        if(!Hash::check($input['password'], $user->password)){
            $request->session()->put('error', 'Password is incorrect.');
            return back();
        }
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->save();
        $request->session()->put('success', 'Profile updated successfully.');
        return redirect('/settings');
    }
}
