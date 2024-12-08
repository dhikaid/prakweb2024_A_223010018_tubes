<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    /** @use HasFactory<\Database\Factories\LocatioFactory> */
    use HasFactory;
    use HasUuids;
    protected $table = 'locations';
    protected $primaryKey = 'uuid';

    protected $guarded = ['location_id'];
}
