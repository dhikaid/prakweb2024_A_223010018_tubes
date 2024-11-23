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
        return view('auth.lupa-password');
    }

    // Mengirim link reset password
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email:rfc,dns']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    // Menampilkan form reset password
    public function showResetForm(Request $request, $token)
    {
        $email = $request->query('email');

        if (!$token || !$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->route('password.request')->withErrors(['message' => 'Token atau email tidak valid.']);
        }

        return view('auth.reset-password', [
            'token' => $token,
            'email' => $email
        ]);
    }

    // Memproses reset password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                // Pastikan menggunakan user_id jika kolom ID Anda bernama user_id
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }


}
