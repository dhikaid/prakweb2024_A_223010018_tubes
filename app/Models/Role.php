<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    //
    use HasFactory, HasUuids;

    protected $primaryKey = 'uuid';


    protected $fillable = [
        'role'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'uuid', 'role_uuid');
    }

    public function scopeOnlyEO($query)
    {
        $query->where('role', 'EO');
    }
}
