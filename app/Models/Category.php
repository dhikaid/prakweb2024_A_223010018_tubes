<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Category extends Model
{
    use HasUuids;
    protected $primaryKey = 'uuid';
    protected $guarded = ['uuid'];

    public function getRouteKeyName()
    {
        return 'uuid'; // Gunakan UUID untuk model binding
    }

    public function events()
    {
        return $this->belongsToMany(
            Event::class,
            'event_categories_mappings', // Nama tabel pivot
            'category_id',                 // Foreign key di tabel pivot
            'event_id',                    // Foreign key di tabel events
            'category_id',                 // Primary key di tabel categories
            'event_id'                     // Primary key di tabel events
        );
    }
}
