<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use HasFactory, Notifiable, HasUuids;

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

    // scope untuk mennampilkan roles EO saja

}
