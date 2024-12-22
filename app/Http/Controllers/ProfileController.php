<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil.
     */
    public function index()
    {
        $data = [
            'title' => 'Dashboard Users',
            'user' => Auth::user()
        ];

        return view('main.profile', $data); // Mengarah ke views/main/profile.blade.php
    }

    /**
     * Mengupdate data umum user.
     */
    public function updateGeneral(Request $request)
    {
        $rules = [
            'username' => 'required|min:3|max:100',
            'fullname' => 'required|max:255',
            'email' => 'required|email:rfc,dns',
        ];

        $user = Auth::user();

        if ($request->file('image')) {
            $rules['image'] = 'required|image|file|max:10240';
        }

        if ($request->get('username') !== $user->username) {
            $rules['username'] = 'required|min:3|max:100|unique:users';
        }

        if ($request->get('email') !== $user->email) {
            $rules['email'] = 'required|email:rfc,dns|unique:users';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('avatar');
        }

        $user->update($validatedData);

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }

    /**
     * Mengupdate/Merubah password user.
     */
    public function updatePassword(Request $request)
    {

    }
}
