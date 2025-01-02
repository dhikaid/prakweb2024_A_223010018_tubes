<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class WarOpen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $event = $request->route('event'); // Pastikan parameter 'event' ada di route

        $open = Carbon::parse($event->queue_open)->timestamp;

        if (now()->timestamp <= $open) {
            return redirect()->to('/event/' . $event->slug . '/war');
        }

        return $next($request);
    }
}
