@if($orders->isEmpty())
    <p class="text-lg text-center justify-center font-outfit text-gray-900 font-medium">No order found.</p>
@else
<div class="overflow-y-auto max-h-screen">
    @foreach($orders as $order)
        <div class="flex items-center p-4 border-b border-gray-300">
            <div class="flex-shrink-0 w-16 h-16 mr-4">
                <img src="{{ $order->image }}" alt="Order Image" class="w-full h-full object-cover rounded">
            </div>
            <div class="flex-1">
                <h4 class="text-md lg:text-lg font-medium text-gray-900">{{ $order->product_name }}</h4>
                <p class="text-md lg:text-lg font-medium text-gray-900">Vendor: {{ $order->vendor->name }}</p>
                <p class="text-md lg:text-lg font-medium text-gray-900">Order Date: {{ $order->created_at }}</p>
                <p class="text-md lg:text-lg text-gray-600">Status: {{ $order->status }}</p>
            </div>
            <div>
            <a href="{{ route('orders.show', $order->id) }}" class="px-4 py-2.5 text-lime-500 text-md font-medium bg-white rounded-full hover:bg-lime-400 hover:text-white">View</a>
            </div>
        </div>
    @endforeach

</div>
@endif

    <div class="pagination p-4">
        {{ $orders->links() }}
    </div>