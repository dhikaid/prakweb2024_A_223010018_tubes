<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{

    use HasFactory;

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




}
