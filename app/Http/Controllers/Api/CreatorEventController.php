<?php

namespace App\Http\Controllers\Api;

//import model Event
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

//import resource PostResource
use App\Http\Resources\CreatorEventResource;

class CreatorEventController extends Controller
{
    public function index()
    {
        $data = DB::table('events')
            ->join('users', 'events.user_uuid', '=', 'users.uuid')
            ->join('roles', 'users.role_uuid', '=', 'roles.uuid')
            ->where('roles.role', 'EO') // Filter hanya untuk role EO
            ->select('users.fullname as creator_name', 'events.name as event_name')
            ->get();

        // jika ingin menggunakan model
        // $events = Event::with('user.role')
        // ->whereHas('user.role', function ($query) {
        //     $query->where('role', 'EO');
        // })
        // ->get();

        return new CreatorEventResource(true, 'List Data Posts', $data);
    }
}
