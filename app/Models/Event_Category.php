<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event_Category extends Model
{
    //
    protected $primaryKey = 'category_id';

    public function events()
    {
        return $this->belongsToMany(
            Event::class,
            'event__categories__mappings', // Nama tabel pivot
            'category_id',                 // Foreign key di tabel pivot
            'event_id',                    // Foreign key di tabel events
            'category_id',                 // Primary key di tabel categories
            'event_id'                     // Primary key di tabel events
        );
    }
}
