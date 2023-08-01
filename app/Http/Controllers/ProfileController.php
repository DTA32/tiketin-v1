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

    public function updatePwd(Request $request){
        $input = $request->validate([
            'old_password' => ['required'],
            'new_password' => ['required'],
            'confirm_password' => ['required'],
        ]);
        $user = User::find(Auth::id());
        if(!Hash::check($input['old_password'], $user->password)){
            $request->session()->put('error', 'Old password is incorrect.');
            return back();
        }
        if($input['new_password'] !== $input['confirm_password']){
            $request->session()->put('error', 'New password and confirm password does not match.');
            return back();
        }
        $user->password = Hash::make($input['new_password']);
        $user->save();
        $request->session()->put('success', 'Password updated successfully.');
        return redirect('/settings');
    }
}
