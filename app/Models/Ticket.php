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
        // Get all booking details with their associated bookings
        $bookingDetails = $this->bookingDetail()->with('booking')->get();

        // Filter valid bookings: status not 'failed' and created_at less than 10 minutes ago
        $totalBookedQty = $bookingDetails->filter(function ($bookingDetail) {
            $isValidStatus = $bookingDetail->booking && $bookingDetail->booking->status !== 'failed';
            $isWithin10Minutes = $bookingDetail->created_at->greaterThan(now()->subMinutes(1));
            return $isValidStatus && $isWithin10Minutes;
        })->sum('qty');

        // Calculate the available quantity
        $result = $this->qty - $totalBookedQty;

        if ($result < 0) {
            $result = 0;
        }
        return $result;
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
