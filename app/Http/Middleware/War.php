<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class War
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $event = $request->route('event'); // Pastikan parameter 'event' ada di route
        $queue = $event->queue->where('user_uuid', Auth::user()->uuid)->where('status', '!=', 'completed')->first();

        if ($queue) {
            return redirect()->to('/event/' . $event->slug . '/queue');
        }

        // Jika tidak ada masalah, lanjutkan
        return $next($request);
    }
}
