<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Event_Categories_Mapping extends Model
{
    use HasUuids;
    protected $primaryKey = 'uuid';
}
