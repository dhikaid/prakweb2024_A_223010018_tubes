<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Queue extends Model
{
    use HasUuids;
    protected $primaryKey = 'uuid';
    protected $guarded = ['uuid'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_uuid');
    }

    public function getAddTimeAttribute()
    {
        $date = new \DateTime($this->joined_at);
        $duration = ceil((env('WAR_TICKET_DURATION', 60)) / 2);
        $date->modify('+' . $duration . ' seconds');
        return $date->format('Y-m-d H:i:s');
    }

    public function getIsExpiredAttribute()
    {
        $tenggatWaktu = Carbon::parse($this->AddTime)->timestamp;
        return now()->timestamp >= $tenggatWaktu;
    }
}
