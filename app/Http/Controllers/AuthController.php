<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    // LOGIN VIEW
    public function showLogin()
    {
        $data = [
            'title' => 'Login',
        ];
        return view('auth.login', $data);
    }

    // REGISTER VIEW
    public function showRegister()
    {
        $data = [
            'title' => 'Register',
        ];
        return view('auth.register', $data);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => ['required', 'min:3', 'max:100', 'unique:users'],
            'fullname' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role_uuid'] = Role::where('role', 'User')->first()->uuid;
        $validatedData['image'] = "https://ui-avatars.com/api/?name=" . $validatedData['username'] . "&background=random";

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registrasi berhasil, silahkan login.');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('error', 'Username atau password tidak benar. Silahkan login ulang.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
