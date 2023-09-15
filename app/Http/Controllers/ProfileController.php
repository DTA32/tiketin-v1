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
            return back()->withErrors(['password' => 'Password is incorrect.']);
        }
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->save();
        return redirect('/settings')->with('success', 'Profile updated successfully.');
    }

    public function updatePwd(Request $request){
        $input = $request->validate([
            'old_password' => ['required'],
            'new_password' => ['required'],
            'confirm_password' => ['required'],
        ]);
        $user = User::find(Auth::id());
        if(!Hash::check($input['old_password'], $user->password)){
            return back()->withErrors(['old_password' => 'Old password is incorrect.']);
        }
        if($input['new_password'] !== $input['confirm_password']){
            return back()->withErrors(['confirm_password' => 'New password and confirm password does not match.']);
        }
        $user->password = Hash::make($input['new_password']);
        $user->save();
        return redirect('/settings')->with('success', 'Password updated successfully.');
    }
}
