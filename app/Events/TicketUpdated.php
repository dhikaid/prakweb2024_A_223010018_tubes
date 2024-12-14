<?php

namespace App\Events;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TicketUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $ticket;

    // Inisialisasi tiket yang diperbarui
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    // Tentukan channel yang digunakan untuk broadcast
    public function broadcastOn()
    {
        return [new Channel('tickets.' . $this->ticket->event_uuid)];
    }

    // Data yang akan disiarkan
    public function broadcastWith()
    {
        return [
            'ticket_id' => $this->ticket->uuid,
            'ticket' => $this->ticket->ticket,
            'qty_available' => $this->ticket->qty_available,
            'is_empty' => $this->ticket->is_empty,
        ];
    }
}
