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
        $eventlocation = $event->whereHas('locations', function ($query) use ($location) {
            $query->where('city', 'LIKE', '%' . strtolower($location) . '%');
        })
            ->with(['tickets', 'creator', 'locations'])->upcoming()->inRandomOrder()
            ->get();

        $data = [
            'title' => 'Home',
            'creators' => User::where('role_id', 2)->inRandomOrder()->take(7)->get(),
            'latest' => $event->with(['locations', 'tickets', 'creator'])->upcoming()->latest()->inRandomOrder()->take('5')->get(),
            'eventlocation' => $eventlocation,
            'location' => $location
        ];

        return view('main.index', $data);
    }

    public function showSearch()
    {
        $data = [
            'title' => 'Search',
        ];
        return view('main.search', $data);
    }

    public function showDetail(Event $event)
    {
        $data = [
            'title' => $event->event_name,
            'event' => $event,
        ];
        return view('main.detail', $data);
    }

    public function showTicket(Event $event)
    {

        $data = [
            'title' => "Buy ticket: $event->event_name",
            'event' => $event,
        ];
        return view('main.ticket', $data);
    }
}
