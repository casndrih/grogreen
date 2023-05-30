<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $guarded = [];
    
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'birthday', 'phone', 'profile_picture', 'cover_picture', 'home_delivery_address', 'city', 'state',
    ];
    
    public function isUser()
    {
        return $this->role === 'user'; // Assuming 'role' column in users table holds the role information
    }

}