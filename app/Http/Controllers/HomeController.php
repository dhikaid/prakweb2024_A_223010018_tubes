<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($location = 'jakarta')
    {
        $event = new Event;
        $eventlocation = $event->whereHas('location', function ($query) use ($location) {
            $query->where('city', 'LIKE', '%' . strtolower($location) . '%');
        })
            ->with(['tickets', 'creator', 'location'])->upcoming()->inRandomOrder()
            ->get();

        $data = [
            'title' => 'Home',
            'creators' => User::where('role_id', 2)->inRandomOrder()->take(7)->get(),
            'latest' => $event->with(['location', 'tickets', 'creator'])->upcoming()->latest()->inRandomOrder()->take('5')->get(),
            'eventlocation' => $eventlocation,
            'location' => $location
        ];

        return view('main.index', $data);
    }
}
