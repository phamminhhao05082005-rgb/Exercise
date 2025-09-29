<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'role',
        'phone',
        'address',
        'dob',
        'public_uri',
        'is_public',
    ];



    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_public' => 'boolean',
    ];


    protected static function booted()
    {
        static::created(function ($user) {
        if ($user->role !== 'admin') {
            $baseUri = '/nv-' . $user->id;
            $publicUri = $baseUri;
            $count = 1;

            
            while (User::where('public_uri', $publicUri)->exists()) {
                $publicUri = $baseUri . '-' . $count;
                $count++;
            }

            $user->public_uri = $publicUri;
            $user->save();
        }
    });
    }
}
