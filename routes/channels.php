<?php

use App\Models\Event;
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


Broadcast::channel('tickets.{eventUuid}', function ($user, $eventUuid) {
    return Event::where('uuid', $eventUuid)->first();  // Semua pengguna bisa mendengarkan pembaruan tiket
});
