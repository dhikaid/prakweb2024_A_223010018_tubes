<?php

namespace App\Providers;

use App\Models\Booking;
use App\Models\Event;
use App\Models\Payment;
use App\Models\User;
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

        Gate::define('isMyEvent', function (User $user, Event $event) {
            if ($user->role->role === "Admin" || ($user->role->role === "EO" && $event->user_uuid === $user->uuid)) {
                return true;
            }
            return false;
        });
    }
}
