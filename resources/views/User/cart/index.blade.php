@extends('layouts.app')

@section('content')
    <h1>Shopping Cart</h1>
    
    @if (count($cartItems) > 0)
        <ul>
            @foreach ($cartItems as $item)
                <li>
                    {{ $item->product->name }} - Quantity: {{ $item->quantity }}
                    <form action="{{ route('cart.remove', $item->product->id) }}" method="POST">
                        @csrf
                        <button type="submit">Remove</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>Your cart is empty.</p>
    @endif
@endsection