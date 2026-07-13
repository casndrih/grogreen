<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role', 'gender', 'birthday', 'phone',
        'profile_picture', 'cover_picture', 'home_delivery_address', 'city', 'state',
    ];

    public function isUser()
    {
        return $this->role === 'user'; // Assuming 'role' column in users table holds the role information
    }
}
