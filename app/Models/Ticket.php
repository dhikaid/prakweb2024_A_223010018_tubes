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
        // Get all booking details
        $bookingDetails = $this->bookingDetail()->with('booking')->get();
        $totalBookedQty = $bookingDetails->filter(function ($bookingDetail) {
            return $bookingDetail->booking && $bookingDetail->booking->status !== 'failed';
        })->sum('qty');

        return ($this->qty - $totalBookedQty);
    }

    // if ticket is empty
    public function getIsEmptyAttribute()
    {
        return ($this->getQtyAvailableAttribute()) === 0;
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
