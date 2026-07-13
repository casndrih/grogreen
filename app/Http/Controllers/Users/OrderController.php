<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        // Fetch all orders for the currently authenticated user
        $orders = Order::where('user_id', auth()->id())->get();

        // Pass the orders to the view
        return view('orders.index', ['orders' => $orders]);
    }

    public function show($id)
    {
        // Fetch the order by its ID for the currently authenticated user
        $order = Order::where('user_id', auth()->id())->findOrFail($id);

        // Pass the order to the view
        return view('orders.show', ['order' => $order]);
    }
}
