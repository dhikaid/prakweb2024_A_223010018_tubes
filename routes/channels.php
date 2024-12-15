<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('channel-name', function () {
    return true;
});

Broadcast::channel('queue.{eventUuid}', function ($user, $eventUuid) {
    return [
        'id' => $user->id,            // ID unik pengguna
        'name' => $user->name,        // Nama pengguna
    ];
});
