<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function Ramsey\Uuid\v1;

class DashboardEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Dashboard Events',
            'events' => Event::paginate(10),
        ];

        return view('dashboard.events.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Buat Events'
        ];
        return view('dashboard.events.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'location_uuid' => 'required|uuid',
            'user_uuid' => 'required|uuid',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'capacity' => 'required|integer|min:1',
            'is_tiket_war' => 'required|boolean',
            'queue_limit' => 'required|integer|min:0',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events/images', 'public');
        }

        $event = Event::create([
            'uuid' => Str::uuid(),
            'slug' => Str::slug($request->name . '-' . now()->timestamp),
            'name' => $request->name,
            'image' => $imagePath,
            'description' => $request->description,
            'location_uuid' => $request->location_uuid,
            'user_uuid' => $request->user_uuid,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'capacity' => $request->capacity,
            'is_tiket_war' => $request->is_tiket_war,
            'queue_limit' => $request->queue_limit,
        ]);

        return redirect()->route('dashboard.events.index')->with('success', 'Event berhasil di buat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('dashboard.events.edit', [
            'title' => 'Edit Event',
            'event' => $event,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'location_uuid' => 'required|uuid',
            'user_uuid' => 'required|uuid',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'capacity' => 'required|integer|min:1',
            'is_tiket_war' => 'required|boolean',
            'queue_limit' => 'required|integer|min:0',
        ];

        $validasiData = $request->validate($rules);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validasiData['image'] = $request->file('image')->store('events/images', 'public');
        } else {
            unset($validasiData['image']);
        }

        // Handle 
        if (empty($validasiData['description'])) {
            $validasiData['description'] = $event->description;
        }

        $event->update($validasiData);

        return redirect()->route('events.index')->with('success', 'Event berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('dashboard.events.index')->with('success', 'Event berhasil di hapus.');
    }
}
