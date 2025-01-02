<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Support\Number;
use App\Models\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Event extends Model
{
    use HasUuids;
    protected $primaryKey = 'uuid';
    protected $guarded = ['uuid'];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_uuid');
    }

    public function queue()
    {
        return $this->hasMany(Queue::class, 'event_uuid');
    }

    // tampilka event dengan tanggal yang akan datang, yang sudah selesai jangan ditampilkan secara default
    public function scopeUpcoming($query)
    {
        return $query->where('start_date', '>=', now());
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['query'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhereHas('locations', function ($q) use ($search) {
                    $q->where('city', 'like', '%' . $search . '%')
                        ->orWhere('venue', 'like', '%' . $search . '%');
                })
                ->orWhereHas('categories', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                })->orWhereHas('creator', function ($q) use ($search) {
                    $q->where('username', 'like', '%' . $search . '%');
                });
        });
    }


    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function locations(): HasOne
    {
        return $this->hasOne(Location::class, 'uuid', 'location_uuid');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_uuid');
    }

    // return date from start to end
    public function getDurationAttribute()
    {
        $format = "d M Y";
        if (Carbon::parse($this->start_date)->format($format) === Carbon::parse($this->end_date)->format($format)) {
            return Carbon::parse($this->start_date)->format($format);
        } else {
            return Carbon::parse($this->start_date)->format($format) . ' - ' . Carbon::parse($this->end_date)->format($format);
        }
    }

    public function getDurationWithTimeAttribute()
    {
        $format = "d M Y H:i";
        if (Carbon::parse($this->start_date)->format($format) === Carbon::parse($this->end_date)->format($format)) {
            return Carbon::parse($this->start_date)->format($format);
        } else {
            return Carbon::parse($this->start_date)->format($format) . ' - ' . Carbon::parse($this->end_date)->format($format);
        }
    }

    public function getStartTimeAttribute()
    {
        return Carbon::parse($this->start_date)->format('Y-m-d\TH:i');
    }
    public function getEndTimeAttribute()
    {

        return Carbon::parse($this->end_date)->format('Y-m-d\TH:i');
    }

    public function getRangeDurationAttribute()
    {
        $format = "H:i";
        return Carbon::parse($this->start_date)->format($format) . ' - ' . Carbon::parse($this->end_date)->format($format);
    }
    public function getStartWarTimeAttribute()
    {

        return Carbon::parse($this->queue_open)->format('Y-m-d\TH:i');
    }

    // return low price to high price format 10-100
    public function getPriceRangeAttribute()
    {

        $min = $this->tickets->min('price');
        $max = $this->tickets->max('price');
        if ($min == $max) {
            return Number::currency($min, 'IDR', 'ID');
        }
        return Number::currency($min, 'IDR', 'ID') . ' - ' . Number::currency($max, 'IDR', 'ID');
    }

    public function getIsWarOpenAttribute()
    {
        $open = Carbon::parse($this->queue_open)->timestamp;
        return now()->timestamp >= $open;
    }

    public function getImageAttribute($value)
    {
        // cek kalo diawali dari link tinggal return aja
        if (strpos($value, 'http') === 0) {
            return $value;
        }
        return asset('storage/' . $value);
    }
}
