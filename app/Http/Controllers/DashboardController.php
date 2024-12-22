<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'event' => Event::upcoming()->count(),
            'user' => User::count(),
        ];
        return view('dashboard.index', $data);
    }
}
