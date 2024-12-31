<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function showAbout()
    {
        $data = [
            'title' => 'Search',
            
        ];
        return view('main.about', $data);
    }

}
