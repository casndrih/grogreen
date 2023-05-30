<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $guarded = [];

    protected $fillable = ['name', 'email', 'password', 'profile_picture'];

    public function isAdmin()
    {
        return $this->role === 'admin'; // Assuming 'role' column in admins table holds the role information
    }

    /**
     * Get the URL for the admin's profile picture.
     *
     * @return string|null
     */
    public function getProfilePictureUrlAttribute(): ?string
    {
        if ($this->profile_picture) {
            // Assuming the profile pictures are stored in the public storage directory
            return asset('storage/' . $this->profile_picture);
        }

        return null;
    }
}