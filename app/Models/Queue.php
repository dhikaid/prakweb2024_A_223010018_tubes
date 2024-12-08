<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Queue extends Model
{
    use HasUuids;
    protected $primaryKey = 'uuid';
}
