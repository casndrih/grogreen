@extends('app')

@section('content')
<section class="bg-gray-50 py-2">

<!-- Single Grocery Product Details -->
<div class="flex flex-col md:flex-row lg:flex-row items-center mx-4 gap-2 justify-center">
  <div class="max-w-md mx-auto bg-white shadow-sm rounded-md overflow-hidden mb-4 lg:mb-0 lg:mr-4">
    <div class="relative">
      <img src="{{ $product->image }}" alt="Grocery Product" class="w-full h-40 object-cover">
      <span class="absolute bottom-2 left-2 bg-lime-500 text-white py-1 px-3 line-clamp-1 text-lg font-medium shadow-lg rounded-full">{{ $product->name }}</span>
    </div>
    <div class="px-4 py-3">
      <p class="text-lg font-medium text-gray-900">Description: <p class="text-lime-500">{{ $product->description }}</p></p>
      <p class="mt-2 text-lg font-medium text-gray-900">Price: ${{ $product->price }}/{{ $product->unit }}</p>
      <p class="mt-2 text-lg font-medium text-gray-900">Stock: {{ $product->stock }}</p>

      <div class="mt-4 flex items-center">
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <button class="minus-button bg-gray-100 text-black rounded-full px-3 py-1 mr-2">-</button>
        <input type="number" name="quantity" class="quantity-input w-16 text-center border border-gray-100 rounded-full" value="1">
        <button class="plus-button bg-gray-100 text-black rounded-full px-3 py-1 ml-2">+</button>
      </div>
      
      <div class="mt-4 flex">
        <button class="add-to-cart mr-2 bg-lime-500 text-white shadow-md rounded-lg px-4 py-2 hover:bg-gray-700">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="24px" viewBox="0 0 24 24" width="24px" class="w-5 h-5 inline-block align-text-bottom"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11 9h2V6h3V4h-3V1h-2v3H8v2h3v3zm-4 9c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2zm-8.9-5h7.45c.75 0 1.41-.41 1.75-1.03l3.86-7.01L19.42 4l-3.87 7H8.53L4.27 2H1v2h2l3.6 7.59-1.35 2.44C4.52 15.37 5.48 17 7 17h12v-2H7l1.1-2z"/></svg>
          Add to Cart
        </button>
        
        <button class="purchase bg-lime-500 text-white shadow-md rounded-lg px-4 py-2 hover:bg-gray-700">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="24px" viewBox="0 0 24 24" width="24px" class="w-5 h-5 inline-block align-text-bottom"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6h-2c0-2.76-2.24-5-5-5S7 3.24 7 6H5c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-7-3c1.66 0 3 1.34 3 3H9c0-1.66 1.34-3 3-3zm7 17H5V8h14v12zm-7-8c-1.66 0-3-1.34-3-3H7c0 2.76 2.24 5 5 5s5-2.24 5-5h-2c0 1.66-1.34 3-3 3z"/></svg>
          Purchase
        </button>
      </div>
      </form>
    </div>
  </div>
  
  <div class="max-w-md mx-auto bg-white shadow-sm rounded-md overflow-hidden">
    <div class="px-4 py-3">
      <h2 class="text-lg font-medium text-gray-900">Vendor</h2>
      <img src="{{ $vendor->image }}" alt="Vendor Image" class="w-16 h-16 object-cover rounded-full">
      <p class="text-lg font-medium text-gray-900">{{ $vendor->name }}</p>
      <p class="text-gray-500">{{ $vendor->description }}</p>
      <p class="text-gray-500">{{ $vendor->address }}</p>
      <p class="text-lg mt-2 font-medium text-gray-900">Status: {{ $vendor->status }}</p>
    </div>
  </div>
</div>

</section>
@endsection

@section('js')
<script>
  $(document).ready(function() {
    $('.minus-button').on('click', function() {
      const quantityInput = $(this).siblings('.quantity-input');
      if (parseInt(quantityInput.val()) > 1) {
        quantityInput.val(parseInt(quantityInput.val()) - 1);
      }
    });

    $('.plus-button').on('click', function() {
      const quantityInput = $(this).siblings('.quantity-input');
      quantityInput.val(parseInt(quantityInput.val()) + 1);
    });

    $('.add-to-cart').on('click', function(e) {
      e.preventDefault();
      const productID = $('input[name="product_id"]').val();
      const quantity = $('.quantity-input').val();

      $.ajax({
        url: '{{ route('cart.add') }}',
        method: 'POST',
        data: {
          _token: '{{ csrf_token() }}',
          product_id: productID,
          quantity: quantity
        },
        success: function(response) {
          showToast('Successfully added to cart');
          console.log(response); // Handle the success response here
        },
        error: function(xhr, status, error) {
          showToast('Failed to add to cart');
          console.error(error); // Handle the error here
        }
      });
    });

    function showToast(message) {
      const toastContainer = $('#toast-container');
      const toast = $('<div class="toast">' + message + '</div>');
      toastContainer.append(toast);

      setTimeout(function() {
        toast.remove();
      }, 3000);
    }
  });
</script>
@endsection
