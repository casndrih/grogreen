<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        // Logic to fetch the user's cart items
        $user = auth()->user();
        $cartItems = Cart::where('user_id', $user->id)->get();

        // Return the view with cart items
        return view('Users.cart.index', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        // Logic to add an item to the user's cart
        $user = auth()->user();
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Check if the product is already in the cart
        $existingItem = Cart::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if ($existingItem) {
            // Update the quantity if the item already exists in the cart
            $existingItem->update([
                'quantity' => $existingItem->quantity + $quantity
            ]);
        } else {
            // Add a new item to the cart if it doesn't exist
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        // Return the response as JSON
        return response()->json(['success' => true, 'success' => 'Product added to cart successfully']);
    }

    public function removeFromCart(Request $request)
    {
        // Logic to remove an item from the user's cart
        $user = auth()->user();
        $productId = $request->input('product_id');

        // Find the item in the cart and delete it
        Cart::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->delete();

        // Return the response as JSON
        return response()->json(['success' => true, 'success' => 'Product removed from cart successfully']);
    }
}