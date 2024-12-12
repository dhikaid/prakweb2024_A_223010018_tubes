<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;

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
            'creators' => User::whereHas('role', function ($query) {
                $query->onlyEO(); // Adjust 'name' to your roles table column
            })->inRandomOrder()
                ->take(7)
                ->get(),
            'latest' => $event->with(['locations', 'tickets', 'creator'])->upcoming()->latest()->inRandomOrder()->take('5')->get(),
            'eventlocation' => $eventlocation,
            'location' => $location
        ];

        return view('main.index', $data);
    }

    public function showSearch(Request $request)
    {
        $validatedData = $request->validate([
            'query' => 'required'
        ]);

        $data = [
            'title' => 'Search',
            'events' => Event::filter($validatedData)->paginate(4)->withQueryString(),
            'query' => $validatedData['query'],
        ];
        return view('main.search', $data);
    }

    public function showDetail(Event $event)
    {
        $data = [
            'title' => $event->name,
            'event' => $event,
        ];

        return view('main.detail', $data);
    }

    public function showTicket(Event $event)
    {

        $data = [
            'title' => "Buy ticket: $event->name",
            'event' => $event->load(['tickets' => function ($q) {
                $q->minprice();
            }]),
        ];
        return view('main.ticket', $data);
    }

    public function showCreators()
    {
        $data = [
            'title' => 'Search',
            'datas' => User::EO()->latest()->paginate(10),
            'query' => "Creators"
        ];
        return view('main.showall', $data);
    }
    public function showLatestEvent()
    {
        $data = [
            'title' => 'Latest',
            'datas' =>  Event::with(['locations', 'tickets', 'creator'])->upcoming()->latest()->inRandomOrder()->paginate(10)->withQueryString(),
            'query' => "Latest Event"
        ];
        return view('main.showall', $data);
    }

    public function showLocationEvent($location = 'jakarta')
    {
        $data = [
            'title' => 'Location',
            'datas' =>  Event::whereHas('locations', function ($query) use ($location) {
                $query->where('city', 'LIKE', '%' . strtolower($location) . '%');
            })
                ->with(['tickets', 'creator', 'locations'])->upcoming()->inRandomOrder()
                ->paginate(4)->withQueryString(),
            'query' => $location
        ];
        return view('main.showall', $data);
    }
}
