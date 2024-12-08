<?php

namespace App\Models;

use Illuminate\Support\Number;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Ticket extends Model
{
    use HasUuids;

    protected $primaryKey = 'uuid';

    public function events()
    {
        return $this->belongsTo(Event::class, 'event_uuid');
    }

    public function getTicketPriceAttribute()
    {
        return Number::currency($this->price, 'IDR', 'ID');
    }

    // order by min price to highest price
    public function scopeMinPrice($query)
    {
        return $query->orderBy('price');
    }
}
