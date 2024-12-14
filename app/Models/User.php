<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Scopes\EOScope;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use HasFactory, Notifiable, HasUuids, SoftDeletes;

    // Tentukan nama kolom primary key
    protected $primaryKey = 'uuid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    // protected $fillable = [
    //     'user_uuid',
    //     'fullname',
    //     'name',
    //     'email',
    //     'password',
    //     'image',
    //     'role_id',
    //     'created_at',
    //     'updated_at',
    // ];
    protected $guarded = ['uuid'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_uuid', 'uuid');
    }

    public function scopeEO()
    {
        return $this->whereHas('role', function ($query) {
            $query->where('role', 'EO');
        });
    }

    // ubah image jadi link
    public function getImageAttribute($value)
    {
        // cek kalo diawali dari link tinggal return aja
        if (strpos($value, 'http') === 0) {
            return $value;
        }
        return asset('storage/' . $value);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['query'] ?? false, function ($query, $search) {
            return $query->where('username', 'like', '%' . $search . '%')->orWhere('fullname', 'like', '%' . $search . '%');
        });
    }

    public function event()
    {
        return $this->hasMany(Event::class, 'user_uuid');
    }
}
