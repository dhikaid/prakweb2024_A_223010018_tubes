<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // Ambil input pencarian dari pengguna
        $query = $request->input('q'); // 'q' adalah nama parameter input dari form pencarian

        // Query untuk mencari event berdasarkan nama, lokasi, atau kategori
        $events = Event::with('categories')
            ->where('event_name', 'like', '%' . $query . '%')
            ->orWhere('location', 'like', '%' . $query . '%')
            ->orWhereHas('categories', function ($q) use ($query) {
                $q->where('category_name', 'like', '%' . $query . '%');
            })
            ->latest()
            ->paginate(10); // Pagination untuk hasil pencarian

        // Return hasil pencarian ke view
        return view('search.results', compact('events', 'query'));
    }
}
