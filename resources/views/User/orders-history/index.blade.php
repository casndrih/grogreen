@if($orders->isEmpty())
    <p class="text-lg text-center justify-center font-outfit text-gray-900 font-medium">No order history found.</p>
@else
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-sm text-gray-900 uppercase border-b bg-white">
                <tr>
                    <th scope="col" class="px-6 py-4 text-md">ID</th>
                    <th scope="col" class="px-6 py-4 text-md">User</th>
                    <th scope="col" class="px-6 py-4 text-md">Vendor</th>
                    <th scope="col" class="px-6 py-4 text-md">Product</th>
                    <th scope="col" class="px-6 py-4 text-md">Quantity</th>
                    <th scope="col" class="px-6 py-4 text-md">Price</th>
                    <th scope="col" class="px-6 py-4 text-md">Status</th>
                    <th scope="col" class="px-6 py-4 text-md">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order_history as $order)
                    <tr>
                        <td class="px-6 py-4 text-md lg:text-lg font-medium text-gray-900">{{ $order->id }}</td>
                        <td class="px-6 py-4 text-md lg:text-lg font-medium text-gray-900">{{ $order->user->name }}</td>
                        <td class="px-6 py-4 text-md lg:text-lg font-medium text-gray-900">{{ $order->vendor->name }}</td>
                        <td class="px-6 py-4 text-md lg:text-lg font-medium text-gray-900">{{ $order->product_name }}</td>
                        <td class="px-6 py-4 text-md lg:text-lg font-medium text-gray-900">{{ $order->quantity }}</td>
                        <td class="px-6 py-4 text-md lg:text-lg font-medium text-gray-900">{{ $order->price }}</td>
                        <td class="px-6 py-4 text-md lg:text-lg font-medium text-gray-900">{{ $order->status }}</td>
                        <td class="px-6 py-4 text-md lg:text-lg font-medium text-gray-900">{{ $order->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

<div class="pagination p-4">
    {{ $order_history->links() }}
</div>