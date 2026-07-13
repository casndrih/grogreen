<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password', 'role', 'profile_picture'];

    public function isAdmin()
    {
        return $this->role === 'admin'; // Assuming 'role' column in admins table holds the role information
    }

    /**
     * Get the URL for the admin's profile picture.
     */
    public function getProfilePictureUrlAttribute(): ?string
    {
        if ($this->profile_picture) {
            // Assuming the profile pictures are stored in the public storage directory
            return asset('storage/'.$this->profile_picture);
        }

        return null;
    }
}
