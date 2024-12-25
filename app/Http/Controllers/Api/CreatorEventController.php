<?php

namespace App\Http\Controllers\Api;

//import model User
use App\Models\User;
use Illuminate\Http\Request;

//import resource 
use App\Http\Controllers\Controller;
use App\Http\Resources\CreatorEventResource;
use App\Http\Resources\CreatorEventCollection;

class CreatorEventController extends Controller
{
    public function index()
    {
        // Query untuk mendapatkan data creator mengggunakan relasi dari event dan role
        $data = User::with(['role', 'event']) // Memuat role dan event
            ->whereHas('role', function ($query) {
                $query->where('role', 'EO'); // Hanya creator dengan role EO
            })
            ->get();

        // Check if the creator exists
        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Creator not found'
            ], 404);
        }

        // Membungkus data dengan resource
        return new CreatorEventCollection(
            true, // Status
            'List of Creators and Their Events', // Pesan
            $data // Data
        );

    }

    public function show($username)
    {
        $data = User::with(['role', 'event'])
            ->where('username', $username)
            ->whereHas('role', function ($query) {
                $query->where('role', 'EO');
            })
            ->firstOrFail();

        // Check if the creator exists
        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Creator not found'
            ], 404);
        }

        // Membungkus data dengan resource
        return new CreatorEventResource(
            true, // Status
            'Creator and Their Events', // Message
            $data // Data
        );
    }
}
