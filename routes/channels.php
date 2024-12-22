<?php

use App\Models\Event;
use App\Models\Payment;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('channel-name', function () {
    return true;
});

Broadcast::channel('queue.{userUuid}', function ($user, $userUuid) {
    // Pastikan user yang mendengarkan adalah user yang sah
    return (string) $user->uuid === $userUuid;
});

Broadcast::channel('payment.{payment}', function ($user, $payment) {
    // Pastikan user yang mendengarkan adalah user yang sah
    $payment = Payment::where('uuid', $payment)->first();
    return (string) $user->uuid === $payment->booking->user->uuid;
});


Broadcast::channel('tickets.{eventUuid}', function ($user, $eventUuid) {
    return Event::where('uuid', $eventUuid)->first();  // Semua pengguna bisa mendengarkan pembaruan tiket
});
