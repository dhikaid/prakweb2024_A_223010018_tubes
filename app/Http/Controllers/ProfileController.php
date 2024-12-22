<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $user = User::where('uuid', Auth::user()->uuid)->first();

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

        return redirect()->route('profile.index')->with('success_profile', 'Profile updated successfully.');
    }

    /**
     * Mengupdate/Merubah password user.
     */
    public function updatePassword(Request $request)
    {
        $rules = [
            'prevpassword' => 'required|min:8',
            'password' => 'required|min:8',
            'password2' => 'required|min:8|same:password',
        ];

        $validatedData = $request->validate($rules);

        $user = User::where('uuid', Auth::user()->uuid)->first();

        if (password_verify($validatedData['prevpassword'], $user->password)) {

            $user->update($validatedData);

            return redirect()->route('profile.index')->with('success_password', 'Profile updated successfully.');
        }

        return redirect()->route('profile.index')->with('failed_password', 'Password sebelumnya tidak sesuai.');
    }

    public function updateRole(Request $request)
    {


        $user = User::where('uuid', Auth::user()->uuid)->first();
        if ($user->role->role == 'EO') {
            $role = Role::where('role', 'User')->first();
        } elseif ($user->role->role == 'User') {
            $role = Role::where('role', 'EO')->first();
        } else {
            return abort(403);
        }
        $user->update([
            'role_uuid' => $role->uuid
        ]);




        return redirect()->route('profile.index')->with('success_role', 'Profile updated successfully.');
    }
}
