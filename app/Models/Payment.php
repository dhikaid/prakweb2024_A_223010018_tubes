<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Number;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Payment extends Model
{
    use HasUuids;
    protected $primaryKey = 'uuid';
    protected $guarded = ['uuid'];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_uuid');
    }

    // get attribute for tenggat waktu, max 5 menit from payment_date
    public function getTenggatWaktuAttribute()
    {
        $date = new \DateTime($this->payment_date);
        $duration = ceil((env('WAR_TICKET_DURATION', 60)) / 2);
        $date->modify('+' . $duration . ' seconds');
        return $date->format('Y-m-d H:i:s');
    }
    // get attribute for tenggat waktu, max 5 menit from payment_date
    public function getIsAvailableAttribute()
    {
        $tenggatWaktu = Carbon::parse($this->tenggatWaktu)->timestamp;
        return now()->timestamp <= $tenggatWaktu;
    }

    public function getPriceAttribute()
    {
        return Number::currency($this->total, 'IDR', 'ID');
    }
}
