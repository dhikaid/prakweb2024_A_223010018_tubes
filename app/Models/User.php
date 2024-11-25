<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use HasFactory, Notifiable;

    // Tentukan nama kolom primary key
    protected $primaryKey = 'user_id';  // Gunakan 'user_id' sebagai primary key

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
    protected $guarded = ['user_id'];

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
}
