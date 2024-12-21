<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Location;
use App\Models\Ticket;
use Illuminate\Support\Str;
use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DashboardEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only(['query']);
        $events = Event::withoutGlobalScope('user_uuid', Auth::user()->uuid)->filter($filters)->paginate(10)->appends($filters);
        if (Auth::user()->role->role === 'Admin') {
            $events = Event::filter($filters)->paginate(10)->appends($filters);
        }

        $data = [
            'title' => 'Dashboard Events',
            'events' => $events,
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
            'image' => 'required|image|max:2048',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'capacity' => 'required|integer|min:1',
            'is_tiket_war' => 'nullable|boolean',
            'queue_limit' => 'nullable|integer|min:1',
            'queue_open' => 'nullable|date|before_or_equal:start_date',
            'country' => 'required|string',
            'province' => 'required|string',
            'city' => 'required|string',
            'venue' => 'required|string',
        ]);

        if ($request->file('image')) {
            $imagePath = $request->file('image')->store('events/images');
        }

        DB::transaction(function () use ($request, $imagePath) {

            $location =  Location::create([
                'country' => strtoupper($request->country),
                'province' => strtoupper($request->province),
                'city' => strtoupper($request->city),
                'venue' => strtoupper($request->venue),
            ]);

            Event::create([
                'uuid' => Str::uuid(),
                'slug' => Str::slug($request->name . '-' . now()->timestamp),
                'name' => strtoupper($request->name),
                'image' => $imagePath,
                'description' => $request->description,
                'location_uuid' => $location->uuid,
                'user_uuid' => Auth::user()->uuid,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'capacity' => $request->capacity,
                'is_tiket_war' => $request->is_tiket_war,
                'queue_limit' => $request->queue_limit,
                'queue_open' => $request->queue_open,
            ]);
        });



        return redirect()->route('events.index')->with('success', 'Event berhasil di buat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        if (!Gate::allows('isMyEvent', $event)) {
            abort(403, 'Event ini bukan milik anda');
        }

        $data = [
            'title' => 'Tickets Event: ' . $event->name,
            'event' => $event,
        ];

        return view('dashboard.events.ticket', $data);
    }


    public function showCreateTicket(Event $event)
    {
        if (!Gate::allows('isMyEvent', $event)) {
            abort(403, 'Event ini bukan milik anda');
        }

        $data = [
            'title' => 'Tambah Tiket: ' . $event->name,
            'event' => $event,
        ];

        return view('dashboard.events.createticket', $data);
    }

    public function createTicket(Event $event, Request $request)
    {
        if (!Gate::allows('isMyEvent', $event)) {
            abort(403, 'Event ini bukan milik anda');
        }

        $validatedData = $request->validate([
            'ticket' => 'required|string',
            'qty' => 'required|min:1|integer',
            'price' => 'required|min:1|integer',
        ]);

        Ticket::create([
            'uuid' => Str::uuid(),
            'event_uuid' => $event->uuid,
            'ticket' => $validatedData['ticket'],
            'qty' => $validatedData['qty'],
            'price' => $validatedData['price'],
        ]);

        return redirect()->to("/dashboard/events/$event->uuid")->with('success', 'Tiket berhasil ditambahkan.');
    }


    public function showEditTicket(Event $event, Ticket $ticket, Request $request)
    {
        if (!Gate::allows('isMyEvent', $event)) {
            abort(403, 'Event ini bukan milik anda');
        }

        $data = [
            'title' => 'Tambah Tiket: ' . $event->name,
            'event' => $event,
            'ticket' => $ticket
        ];

        return view('dashboard.events.editticket', $data);
    }
    public function editTicket(Event $event, Ticket $ticket, Request $request)
    {
        if (!Gate::allows('isMyEvent', $event)) {
            abort(403, 'Event ini bukan milik anda');
        }

        $validatedData = $request->validate([
            'ticket' => 'required|string',
            'qty' => 'required|min:1|integer',
            'price' => 'required|min:1|integer',
        ]);

        $ticket->update($validatedData);

        return redirect()->to("/dashboard/events/$event->uuid")->with('success', 'Tiket berhasil diedit.');
    }

    public function deleteTicket(Event $event, Ticket $ticket, Request $request)
    {
        if (!Gate::allows('isMyEvent', $event)) {
            abort(403, 'Event ini bukan milik anda');
        }

        $ticket->delete();

        return redirect()->to("/dashboard/events/$event->uuid")->with('success', 'Event berhasil di hapus.');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        if (!Gate::allows('isMyEvent', $event)) {
            abort(403, 'Event ini bukan milik anda');
        }

        $data = [
            'title' => 'Edit Events',
            'event' => $event,
        ];

        return view('dashboard.events.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {

        if (!Gate::allows('isMyEvent', $event)) {
            abort(403, 'Event ini bukan milik anda');
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048', // Nullable untuk gambar jika tidak diunggah
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'capacity' => 'required|integer|min:1',
            'is_tiket_war' => 'nullable|boolean',
            'queue_limit' => 'nullable|integer|min:1',
            'queue_open' => 'nullable|date|before_or_equal:start_date',
            'country' => 'required|string',
            'province' => 'required|string',
            'city' => 'required|string',
            'venue' => 'required|string',
        ]);

        // Jika gambar baru diunggah, simpan gambar baru, jika tidak gunakan gambar lama
        if ($request->file('image')) {
            $imagePath = $request->file('image')->store('events/images');
        } else {
            $imagePath = $event->image; // Gunakan gambar lama
        }

        DB::transaction(function () use ($request, $event, $imagePath) {
            // Update lokasi
            $event->locations->update([
                'country' => strtoupper($request->country),
                'province' => strtoupper($request->province),
                'city' => strtoupper($request->city),
                'venue' => strtoupper($request->venue),
            ]);

            // Update event
            $event->update([
                'name' => strtoupper($request->name),
                'image' => $imagePath,
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'capacity' => $request->capacity,
                'is_tiket_war' => $request->is_tiket_war,
                'queue_limit' => $request->queue_limit,
                'queue_open' => $request->queue_open,
            ]);
        });

        return redirect()->route('events.index')->with('success', 'Event berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {

        if (!Gate::allows('isMyEvent', $event)) {
            abort(403, 'Event ini bukan milik anda');
        }
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event berhasil di hapus.');
    }
}
