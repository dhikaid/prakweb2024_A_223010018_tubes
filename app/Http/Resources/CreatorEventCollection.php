<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CreatorEventCollection extends JsonResource
{


    //define properti
    public $status;
    public $message;
    public $resource;

    /**
     * __construct
     *
     * @param  mixed $status
     * @param  mixed $message
     * @param  mixed $resource
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
        return [
            'success' => $this->status,
            'message' => $this->message,
            'data' => $this->resource->map(function ($user) {
                return [
                    'uuid' => $user->uuid,
                    'username' => $user->username,
                    'fullname' => $user->fullname,
                    'email' => $user->email,
                    'role' => $user->role->role,
                    'totalEvents' => $user->event->count(), // Total event
                    'events' => $user->event->map(function ($event) {
                        return [
                            'uuid' => $event->uuid,
                            'eventName' => $event->name,
                            'slug' => $event->slug,
                            'description' => $event->description,
                            'startDate' => $event->start_date,
                            'endDate' => $event->end_date,
                            'capacity' => $event->capacity,
                        ];
                    })
                ];
            })
        ];
    }


}
