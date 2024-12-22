<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasUuids;
    protected $primaryKey = 'uuid';
    protected $guarded = ['uuid'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_uuid');
    }

    public function bookingDetail()
    {
        return $this->hasMany(Booking_Detail::class, 'booking_uuid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_uuid');
    }
}
