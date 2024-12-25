<?php

namespace App\Models;

use Illuminate\Support\Number;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    use HasUuids;

    protected $primaryKey = 'uuid';
    protected $guarded = ['uuid'];

    public function events()
    {
        return $this->belongsTo(Event::class, 'event_uuid');
    }

    public function bookingDetail(): HasMany
    {
        return $this->hasMany(Booking_Detail::class, 'ticket_uuid');
    }

    public function getTicketPriceAttribute()
    {
        return Number::currency($this->price, 'IDR', 'ID');
    }

    public function getQtyAvailableAttribute()
    {
        $duration = ceil(env('WAR_TICKET_DURATION', 60) / 2);
        $cutoffTime = now()->subSeconds($duration);
        $totalBookedQty = 0;

        // Fetch booking details with related bookings efficiently using whereHas
        $settledBookings = $this->bookingDetail()->whereHas('booking', function ($query) {
            $query->where('status', 'settlement');
        })->get();

        $pendingBookings = $this->bookingDetail()->whereHas('booking', function ($query) use ($cutoffTime) {
            $query->where('status', 'pending')
                ->where('created_at', '>=', $cutoffTime);
        })->get();

        // Sum the quantities for settlement bookings
        foreach ($settledBookings as $bookingDetail) {
            $totalBookedQty += $bookingDetail->qty;
        }

        // Sum the quantities for pending bookings within the timeframe
        foreach ($pendingBookings as $bookingDetail) {
            $totalBookedQty += $bookingDetail->qty;
        }

        // Calculate the available quantity
        $result = $this->qty - $totalBookedQty;

        // Ensure the result is not negative
        return max($result, 0);
    }

    // if ticket is empty
    public function getIsEmptyAttribute()
    {
        return ($this->getQtyAvailableAttribute() <= 0);
    }

    public function getPriceNumberAttribute()
    {
        return rtrim(rtrim($this->price, '0'), '.'); // Menghapus nol di belakang dan titik desimal jika ada
    }


    // order by min price to highest price
    public function scopeMinPrice($query)
    {
        return $query->orderBy('price');
    }
}
