<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const VALIDATION_RULES = [
        'role_id' => ['required', 'integer'],
        'name' => ['required', 'string'],
        'email' => ['required', 'email', 'unique:users,email'],
        'mobile_no' => ['required', 'unique:users,mobile_no'],
        'avator' => ['nullable', 'image', 'mimes:png,jpg,jpeg'],
        'district_id' => ['required', 'integer'],
        'upazila_id' => ['required', 'integer'],
        'address' => ['required', 'string'],
        'postal_code' => ['required', 'numeric'],
        'password' => ['required', 'string'],
        'password_confirm' => ['required', 'same:password']
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
