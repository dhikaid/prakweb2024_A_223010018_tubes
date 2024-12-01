<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $primaryKey = 'event_id';

    public function categories()
    {
        return $this->belongsToMany(
            Event_Category::class,
            'event__categories__mappings', // Nama tabel pivot
            'event_id',                   // Foreign key di tabel pivot
            'category_id',                // Foreign key di tabel categories
            'event_id',                   // Primary key di tabel events
            'category_id'                 // Primary key di tabel categories
        );
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

}
