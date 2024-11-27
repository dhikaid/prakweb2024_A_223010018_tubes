<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class OauthController extends Controller
{
    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        $socialUser = Socialite::driver('google')->user();
        return $this->loggingIn('google', $socialUser);
    }

    public function redirectDiAkun()
    {
        return redirect()->to("https://sso.bhadrikais.my.id/signin/" . env('TOKEN_DIAKUN'));
    }

    public function callbackDiakun(string $token = null, Request $request)
    {
        if ($token !== null) {
            try {
                $client = new Client();
                $api = $client->request('POST', 'https://sso.bhadrikais.my.id/otentikasi/login/' . env('TOKEN_DIAKUN'), [
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Bearer ' . $token,
                    ]
                ]);
                $json = json_decode($api->getBody(), true);
                return $this->loggingIn('diakun', $json);
                if ($json['status'] == 200 && $json['isLoggedIn'] == true) {
                    $user = User::where('uuid', $json['data']['uuid'])->first();
                    $passRandom = fake()->password('20');
                    if (!$user) {
                        $data = [
                            'uuid' => $json['data']['uuid'],
                            'fullname' => $json['data']['fullname'],
                            'username' => $json['data']['username'],
                            'email' => $json['data']['email'],
                            'password' => Hash::make($json['data']['uuid'] . $json['data']['username'] . $json['data']['email'] . "diakun" . $passRandom),
                            'image' => $json['data']['image'],
                            'is_admin' => false,
                        ];
                        User::create($data);
                    } else {
                        $data = [
                            'fullname' => $json['data']['fullname'],
                            'username' => $json['data']['username'],
                            'email' => $json['data']['email'],
                            'password' => Hash::make($json['data']['uuid'] . $json['data']['username'] . $json['data']['email'] . "diakun" . $passRandom),
                            'image' => $json['data']['image'],
                        ];
                        User::where('uuid', $json['data']['uuid'])->update($data);
                    }

                    $credentials = [
                        'username' => $json['data']['username'],
                        'password' => $json['data']['uuid'] . $json['data']['username'] . $json['data']['email'] . "diakun" . $passRandom,
                    ];

                    // dd($credentials);
                    if (Auth::attempt($credentials)) {
                        $request->session()->regenerate();
                        return redirect()->intended('/dashboard');
                    }
                }
                return back()->with('error', "You are not loggedin!");
            } catch (Exception $e) {
                return back()->with('error', "Something wrong!");
            }
        }
        return redirect('/login');
    }

    public function loggingIn(string $app, $data)
    {
        if ($data && $app) {
            if (strtolower($app) == 'google') {
                $data = [
                    'user_uuid' => fake()->uuid(),
                    // hapus spasi di name
                    'username' => preg_replace('/\s+/', '', $data->name),
                    'image' => $data->avatar,
                    'email' => $data->email,
                    'fullname' => $data->name,
                    'password' => Hash::make('password' . $data->email . $data->id . time()),
                    'role_id' => 1
                ];
            } elseif (strtolower($app) == 'diakun') {
                $data = [
                    'user_uuid' => fake()->uuid(),
                    'username' => $data['data']['username'],
                    'image' => $data['data']['image'],
                    'email' => $data['data']['email'],
                    'fullname' => $data['data']['fullname'],
                    'password' => Hash::make('password' . $data['data']['email'] . $data['data']['uuid'] . time()),
                    'role_id' => 1
                ];
            }


            $user = User::firstOrCreate([
                'email' => $data['email'],
            ], $data);

            Auth::login($user);
            return redirect('/dashboard');
        }

        return back()->with('error', "Something wrong!");
    }
}
