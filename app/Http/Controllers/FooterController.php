<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function showAbout()
    {
        $data = [
            'title' => 'Tentang Kami',
            
        ];
        return view('main.about', $data);
    }

    public function showPrivacy()
    {
        $data = [
            'title' => 'Kebijakan Privasi',
            
        ];
        return view('main.privacy', $data);
    }

    public function showTerms()
    {
        $data = [
            'title' => 'Syarat & Ketentuan',
            
        ];
        return view('main.terms', $data);
    }
}
