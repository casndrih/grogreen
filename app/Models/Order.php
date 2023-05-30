<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'vendor_id',
        'product_name',
        'quantity',
        'price',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function close()
    {
        DB::transaction(function () {
            // Create a new entry in the order history table
            OrderHistory::create([
                'user_id' => $this->user_id,
                'vendor_id' => $this->vendor_id,
                'product_name' => $this->product_name,
                'quantity' => $this->quantity,
                'price' => $this->price,
                'status' => $this->status,
            ]);

            // Delete the order from the active orders table
            $this->delete();
        });
    }

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($order) {
            if ($order->status === 'closed' && $order->isDirty('status')) {
                $order->close();
            }
        });
    }
}