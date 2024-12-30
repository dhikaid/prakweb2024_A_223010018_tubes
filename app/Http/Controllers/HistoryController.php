<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only(['query']);
        $status = $request->status;

        $historyQuery = Payment::with(['booking'])
            ->whereHas('booking', function ($query) {
                $query->where('user_uuid', Auth::user()->uuid);
            });

        if (in_array($status, ['success', 'failed'])) {
            $historyQuery->where('status', $status === 'success' ? 'settlement' : 'failed');
        }

        $history = $historyQuery
            ->latest()
            ->filter($filters)
            ->paginate(3)
            ->appends($filters);

        return view('main.history', [
            'history' => $history,
            'title' => 'History'
        ]);
    }
}
