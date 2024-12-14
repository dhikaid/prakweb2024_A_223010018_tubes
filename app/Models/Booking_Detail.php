<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Booking_Detail extends Model
{
    use HasUuids;
    protected $primaryKey = 'uuid';
    protected $guarded = ['uuid'];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_uuid');
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_uuid');
    }
}
