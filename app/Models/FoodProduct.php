<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodProduct extends Model
{
    protected $fillable = ['vendor_id', 'category_id', 'name', 'description', 'price', 'image', 'stock'];

    public function category()
    {
        return $this->belongsTo(GroceryCategory::class);
    }
}