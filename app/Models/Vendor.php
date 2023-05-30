<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendor extends Authenticatable
{
    protected $guarded = [];
    
    protected $fillable = [
        'name', 'email', 'password', 'profile_picture', 'cover_picture', 'address', 'withdrawal_type', 'withdrawal_details',
        'status', 'reason', 'verification', 'description',
    ];
    
    public function isVendor()
    {
        return $this->role === 'vendor'; // Assuming 'role' column in vendors table holds the role information
    }
    
    public function products()
    {
        return $this->hasMany(FoodProduct::class);
    }
   
}