<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    // tampilka event dengan tanggal yang akan datang, yang sudah selesai jangan ditampilkan secara default
    public function scopeUpcoming($query)
    {
        return $query->where('start_date', '>=', now());
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class, 'event_id', 'event_id');
    }

    public function location(): HasOne
    {
        return $this->hasOne(Location::class, 'location_id', 'location');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user', 'user_id');
    }

    // return date from start to end
    public function getDurationAttribute()
    {
        $format = "d M Y";
        if (Carbon::parse($this->start_date)->format($format) === Carbon::parse($this->end_date)->format($format)) {
            return Carbon::parse($this->start_date)->format($format);
        } else {
            return Carbon::parse($this->start_date)->format($format) . '- ' . Carbon::parse($this->end_date)->format($format);
        }
    }
}
