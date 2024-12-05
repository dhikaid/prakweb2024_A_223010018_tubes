<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Number;

class Ticket extends Model
{
    //

    protected $primaryKey = 'ticket_id';

    public function events()
    {
        return $this->belongsTo(Event::class, 'event_id', 'event_id');
    }

    public function getPriceAttribute()
    {
        return Number::currency($this->ticket_price, 'IDR', 'ID');
    }

    // order by min price to highest price
    public function scopeMinPrice($query)
    {
        return $query->orderBy('ticket_price');
    }
}
