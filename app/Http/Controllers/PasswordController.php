<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PasswordController extends Controller
{

    // Show view page for lupa-password
    public function showForgetPassword()
    {
        $data = [
            'title' => 'Forget Password',
        ];
        return view('auth.forget-password', $data);
    }


    public function showResetPassword(Request $request, $token)
    {

        $email = $request->query('email');
        if ($email && $user = User::where('email', $email)->first()) {
            if (Password::tokenExists($user, $token)) {
                $data = [
                    'title' => 'Reset Password',
                    'token' => $token,
                    'email' => $email
                ];
                return view('auth.reset-password', $data);
            }
        }

        return redirect(route('password.request'))->with('Token atau email tidak valid');
    }

    // Mengirim link reset password
    public function sendResetLink(Request $request)
    {
        // Validasi email yang dimasukkan
        $validatedData = $request->validate([
            'email' => 'required|email:rfc,dns',
        ]);

        if (User::where('email', $validatedData)->first()) {
            // Mengirim link reset password
            $status = Password::sendResetLink($request->only('email'));
        }


        // Menampilkan pesan yang aman tanpa memberi tahu apakah email terdaftar
        return back()->with('success', 'Link password telah dikirim di email terdaftar anda. Silahkan check inbox/spam');
    }


    // Memproses reset password
    public function resetPassword(Request $request)
    {


        // Validasi input reset password
        $request->validate([
            'token' => 'required',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
        ]);

        // Memproses reset password
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );



        // Menampilkan pesan apakah password berhasil di-reset atau tidak
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', 'Password Anda berhasil diubah. Silakan login dengan password baru.')
            : back()->withErrors(['email' => [__($status)]]);
    }
}
