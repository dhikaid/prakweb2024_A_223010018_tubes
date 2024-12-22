<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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

        return response()->json($data);
    }
}
