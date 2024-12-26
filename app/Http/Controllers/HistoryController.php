<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $history = Payment::with(['booking.bookingDetail.ticket', 'booking.event', 'booking.user'])
            ->whereHas('booking', function ($query) {
                $query->where('user_uuid', Auth::user()->id); 
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('main.history', compact('history'));
    }
}
