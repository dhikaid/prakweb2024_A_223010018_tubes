<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Event;

class eventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showHome(Request $request)
    {
        // Query semua events
        $events = Event::with('categories')->latest()->take(10)->get();

        return view('home', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function showEventDetails($id)
    {
        // Ambil data event berdasarkan ID
        $event = Event::findOrFail($id);

        // Kembalikan view dengan data event
        return view('events.show', compact('event'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
