<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CreatorEventResource extends JsonResource
{
    // Properti tambahan jika diperlukan
    public $status;
    public $message;

    /**
     * __construct
     *
     * @param  mixed $status
     * @param  mixed $message
     * @return void
     */
    public function __construct($status, $message, $resource)
    {
        parent::__construct($resource);
        $this->status = $status;
        $this->message = $message;
    }

    /**
     * toArray
     *
     * @param  mixed $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        $data = [
            'uuid' => $this->uuid,
            'username' => $this->username,
            'fullname' => $this->fullname,
            'email' => $this->email,
            'role' => $this->role->role,
            'totalEvents' => $this->event->count(),
            'events' => $this->event->map(function ($event) {
                return [
                    'uuid' => $event->uuid,
                    'eventName' => $event->name,
                    'slug' => $event->slug,
                    'description' => $event->description,
                    'startDate' => $event->start_date,
                    'endDate' => $event->end_date,
                    'capacity' => $event->capacity,
                ];
            }),
        ];

        return [
            'success' => $this->status,
            'message' => $this->message,
            'data' => $data,
        ];
    }
}
