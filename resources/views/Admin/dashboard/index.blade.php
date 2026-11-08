@extends('Admin.app')
@section('title','Overview')
@section('heading','Marketplace overview')
@section('content')
<section class="admin-stats">
@foreach(['buyers'=>'Customers','vendors'=>'Vendors','products'=>'Products','orders'=>'Orders'] as $key=>$label)
<article class="admin-stat"><span>{{ $label }}</span><strong>{{ number_format($stats[$key]) }}</strong></article>
@endforeach
</section>
<section class="admin-panel"><h2>Recent orders</h2><div class="overflow-x-auto"><table class="admin-table"><thead><tr><th>Order</th><th>Product</th><th>Quantity</th><th>Total</th><th>Status</th><th>Created</th></tr></thead><tbody>
@forelse($recentOrders as $order)<tr><td>#{{ $order->id }}</td><td>{{ $order->product_name }}</td><td>{{ $order->quantity }}</td><td>K {{ number_format((float)$order->price * (int)$order->quantity,2) }}</td><td>{{ ucfirst($order->status) }}</td><td>{{ optional($order->created_at)->format('d M Y') ?? $order->created_at }}</td></tr>@empty<tr><td colspan="6" class="admin-empty">No orders have been placed yet.</td></tr>@endforelse
</tbody></table></div></section>
<section class="admin-panel"><h2>Recently registered vendors</h2><table class="admin-table"><thead><tr><th>Vendor</th><th>Email</th><th>Status</th><th>Verification</th></tr></thead><tbody>
@forelse($recentVendors as $vendor)<tr><td>{{ $vendor->name }}</td><td>{{ $vendor->email }}</td><td>{{ ucfirst($vendor->status) }}</td><td>{{ ucfirst($vendor->verification) }}</td></tr>@empty<tr><td colspan="4" class="admin-empty">No vendors registered yet.</td></tr>@endforelse
</tbody></table></section>
@endsection
