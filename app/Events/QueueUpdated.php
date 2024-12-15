<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Events\ShouldDispatchAfterCommit;

class QueueUpdated  implements ShouldBroadcast, ShouldDispatchAfterCommit
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $eventUuid;
    public $userUuid;
    public $position;
    public $estimate;
    public $status;  // Menambahkan status

    /**
     * Create a new event instance.
     */
    public function __construct($eventUuid, $userUuid, $position, $estimate, $status)
    {
        $this->eventUuid = $eventUuid;
        $this->userUuid = $userUuid;
        $this->position = $position;
        $this->estimate = $estimate;
        $this->status = $status;
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        return [new PresenceChannel('queue.' . $this->eventUuid . '.' . $this->userUuid)];
    }


    public function broadcastWith(): array
    {
        return [
            "position" => $this->position,
            "estimate" => $this->estimate,
            "status" => $this->status,
        ];
    }
}
