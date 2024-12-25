<?php

namespace App\Http\Controllers\Api;

//import model User
use App\Models\User;
use Illuminate\Http\Request;

//import resource
use App\Http\Controllers\Controller;
use App\Http\Resources\CreatorEventResource;
use App\Http\Resources\CreatorEventCollection;
use App\Http\Resources\GetResource;
use App\Models\Event;
use Illuminate\Validation\ValidationException;

class ApiEventController extends Controller
{

    /**
     * @operationId Show all events
     */
    public function index()
    {
        // Query untuk mendapatkan data creator mengggunakan relasi dari event dan role
        $data = Event::with(['categories', 'creator', 'locations'])->upcoming()->get();

        // Membungkus data dengan resource
        return new GetResource(
            true,
            'List events',
            $data
        );
    }

    /**
     * @operationId Show all events by search
     */
    public function search(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'query' => 'required|string'
            ]);

            $data = Event::with(['categories', 'creator', 'locations'])->upcoming()->filter($validatedData)->get();

            return new GetResource(
                true,
                'List events',
                $data
            );
        } catch (ValidationException $e) {
            return new GetResource(false, 'Something went wrong', $e->errors());
        }
    }


    /**
     * @operationId Show detail event
     */
    public function detail(Event $event)
    {
        try {
            $event->load(['categories', 'creator', 'locations', 'tickets']);
            return new GetResource(
                true,
                'List events',
                $event
            );
        } catch (ValidationException $e) {
            return new GetResource(false, 'Something went wrong', $e->errors());
        }
    }
}
