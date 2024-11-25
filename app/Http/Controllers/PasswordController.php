<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PasswordController extends Controller
{
    // Menampilkan form untuk memasukkan email
    public function showForgotPasswordForm()
    {
        $data = [
            'title' => 'Lupa Password',
        ];
        return view('auth.lupa-password', $data);
    }

    // Mengirim link reset password
    public function sendResetLink(Request $request)
    {
        // Validasi email yang dimasukkan
        $request->validate([
            'email' => 'required|email:rfc,dns',
        ]);

        // Mengirim link reset password
        $status = Password::sendResetLink($request->only('email'));

        // Menampilkan pesan yang aman tanpa memberi tahu apakah email terdaftar
        return back()->with(['status' => 'Link password telah dikirim di email terdaftar anda. Silahkan check inbox/spam']);
    }


    // Menampilkan form reset password
    public function showResetForm(Request $request, $token)
    {
        $email = $request->query('email');

        if ($email && $user = User::where('email', $email)->first()) {
            if (Password::tokenExists($user, $token)) {
                // Tampilkan form reset password
                return view('auth.reset-password', [
                    'token' => $token,
                    'email' => $email
                ]);
            }
        }

        return redirect(route('password.request'))->with('Token atau email tidak valid');
    }


    // Memproses reset password
    public function resetPassword(Request $request)
    {
        // Validasi input reset password
        $request->validate([
            'token' => 'required',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:8|confirmed',
        ]);

        // Memproses reset password
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                // Pastikan menggunakan user_id jika kolom ID Anda bernama user_id
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        // Menampilkan pesan apakah password berhasil di-reset atau tidak
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', 'Password Anda berhasil diubah. Silakan login dengan password baru.')
            : back()->withErrors(['email' => [__($status)]]);
    }
}
