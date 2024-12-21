<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Event;
use App\Models\Queue;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useTailwind();
        Gate::define('isAdmin', function (User $user) {
            $user->load('role');
            return $user->role->role === 'Admin';
        });

        Gate::define('isMyTransaction', function (
            User $user,
            Payment
            $payment
        ) {
            $payment->load(['booking']);
            return $user->uuid === $payment->booking->user_uuid;
        });

        Gate::define('access-tiket-war', function ($user, $event) {
            $event->load('queue');
            $queue = $event->queue->where('user_uuid', $user->uuid)->first();
            return $event->is_tiket_war && $queue && $queue->status === 'in_progress';
        });

        Gate::define('already_pending', function (User $user, Event $event) {
            $event->load('queue');
            $queue = $event->queue->where('user_uuid', $user->uuid)->first();
            return $event->is_tiket_war && $queue && ($queue->status === 'pending' && $queue->status !== 'in_progress');
        });

        Gate::define('isMyEvent', function (User $user, Event $event) {
            if ($user->role->role === "Admin" || ($user->role->role === "EO" && $event->user_uuid === $user->uuid)) {
                return true;
            }
            return false;
        });
    }
}
