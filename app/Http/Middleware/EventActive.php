<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Event;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $event = $request->route('event'); // Pastikan parameter 'event' ada di route
        // apakah event melebihi tanggal sekarang
        if ($event->end_date < now()) {
            abort(403, 'Event tidak ada atau sudah berakhir');
        }
        return $next($request);
    }
}
