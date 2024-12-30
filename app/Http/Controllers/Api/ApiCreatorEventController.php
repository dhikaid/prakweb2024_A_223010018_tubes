<?php

namespace App\Http\Controllers\Api;

//import model User
use App\Models\User;
use Illuminate\Http\Request;

//import resource
use App\Http\Controllers\Controller;
use App\Http\Resources\CreatorEventResource;
use App\Http\Resources\GetResource;



class ApiCreatorEventController extends Controller
{

    /**
     * @operationId Show all Event Organizers
     */
    public function index()
    {
        $data = User::with(['role'])
            ->whereHas('role', function ($query) {
                $query->where('role', 'EO');
            })->get();

        return new GetResource(
            true,
            'List of Creators and Their Events',
            $data
        );
    }

    /**
     * @operationId Show detail Event Organizer
     */
    public function show(User $user)
    {

        $data = $user->load(['role', 'event', 'event.categories', 'event.locations']);

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Creator not found'
            ], 404);
        }

        return new GetResource(
            true,
            'Creator and Their Events',
            $data
        );
    }
}
