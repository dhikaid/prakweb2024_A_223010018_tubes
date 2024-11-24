<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ControllerAuth extends Controller
{
    public function store(Request $request) 
    {
       $validatedData = $request ->validate([
            'username' =>['required', 'min:3', 'max:100', 'unique:users'],
            'fullname' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' =>'required|min:5|max:100',

       ]);

       $validatedData ['password'] = Hash::make($validatedData['password']);
       $validatedData ['user_uuid'] = fake()->uuid();
       $validatedData ['role_id'] = 1;
       $validatedData ['image'] = "default.png";

       User::create($validatedData);
       
       return redirect('/login')->with('success', 'Registration successfull! Please login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashbord');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
