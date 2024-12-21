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
        $validasiData = $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        $user = Auth::user();
        User::where('uuid', $user->uuid)
            ->update($validasiData);

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }

    /**
     * Mengupdate/Merubah password user.
     */
    public function updatePassword(Request $request)
    {

    }
}
