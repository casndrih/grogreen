<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroceryCategory extends Model
{
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(FoodProduct::class);
    }

}