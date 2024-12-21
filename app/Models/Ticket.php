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
        // Ambil semua booking detail beserta relasi booking
        $bookingDetails = $this->bookingDetail()->with('booking')->get();
        $duration = ceil(env('WAR_TICKET_DURATION', 60) / 2);

        $totalBookedQty = 0;

        foreach ($bookingDetails as $bookingDetail) {
            $status = $bookingDetail->booking->status ?? null;

            if ($status === 'settlement') {
                // Tambahkan jumlah jika status adalah settlement
                $totalBookedQty += $bookingDetail->qty;
            } elseif ($status === 'pending') {
                // Tambahkan jumlah jika pending dan masih dalam durasi 10 menit
                if ($bookingDetail->created_at->greaterThan(now()->subSeconds($duration))) {
                    $totalBookedQty += $bookingDetail->qty;
                }
            }
        }

        // Hitung jumlah tersedia
        $result = $this->qty - $totalBookedQty;

        // Pastikan hasil tidak kurang dari 0
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
