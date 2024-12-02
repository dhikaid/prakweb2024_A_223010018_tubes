<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Number;

class Ticket extends Model
{
    //

    protected $primaryKey = 'ticket _id';

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function getPriceAttribute()
    {
        return Number::currency($this->ticket_price, 'IDR', 'ID');
    }
}
