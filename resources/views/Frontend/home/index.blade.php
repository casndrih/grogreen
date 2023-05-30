@extends('app')

@section('content')
<section class="bg-white">

<!-- carousel starts-->
<div class="flex items-center justify-center w-full lg:mt-0 lg:w-full">
  <div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative overflow-hidden h-40 md:h-50 lg:h-100">
      @foreach($groceries as $index => $grocery)
        <div class="hidden duration-700 ease-in-out" data-carousel-item{{ $index == 0 ? ' aria-current="true"' : '' }}>
          <img src="{{ $grocery['urls']['regular'] }}" class="absolute block w-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="{{ $grocery['alt_description'] }}">
        </div>
      @endforeach
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
      @foreach($groceries as $index => $grocery)
        <button type="button" class="w-2 h-2 rounded-full bg-white{{ $index == 0 ? ' active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}"></button>
      @endforeach
    </div>
  </div>
</div>
<!-- carousel end-->

<!-- categories start-->
<div class="mx-auto">
    <h1 class="text-xl m-4 text-gray-900 font-medium font-outfit">Shop by Category</h1>

    <div class="flex flex-row bg-gray-50 p-2 overflow-x-auto gap-3">
        @foreach ($categoryData as $item)
            <div class="flex flex-col text-center justify-center bg-white flex-grow-0 flex-shrink-0 w-20 rounded-lg shadow-md">
                <div class="relative">
                    <img class="w-full h-20 rounded-md object-cover" src="{{ $item['image'] }}">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-lg font-medium text-white line-clamp-2">{{ $item['name'] }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- categories end-->

<!-- start new products -->
<div class="mx-auto">
  <div class="flex items-center justify-between">
    <h1 class="text-xl m-4 text-gray-900 font-medium font-outfit">New Groceries</h1>
    <a href="#" class="flex items-center text-gray-900 hover:text-gray-700">
      <span class="mr-1 text-md font-outfit font-medium">View more</span>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-4" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
        <path fill-rule="evenodd" d="M0 0h24v24H0V0z" fill="none"/>
        <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8-8-8z"/>
      </svg>
    </a>
  </div>

  <!-- Horizontal Scroll View -->
  <div class="flex flex-row overflow-x-auto bg-gray-50 p-2 whitespace-nowrap gap-3">
    <!-- Loop through the food products and display them as medium cards -->
    @foreach($productData as $foodProduct)
    <div class="relative inline-block w-45 bg-white rounded-lg shadow-md">
      <a href="#" class="absolute top-2 right-2 bg-gray-50 p-2 rounded-full text-lime-500 hover:bg-lime-100">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><g><rect fill="none" height="24" width="24"/><path fill-rule="evenodd" d="M18 6h-2c0-2.21-1.79-4-4-4S8 3.79 8 6H6c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-6-2c1.1 0 2 .9 2 2h-4c0-1.1.9-2 2-2zm6 16H6V8h2v2c0 .55.45 1 1 1s1-.45 1-1V8h4v2c0 .55.45 1 1 1s1-.45 1-1V8h2v12z"/></g></svg>
      </a>
      <a href="{{ route('product.show', ['id' => $foodProduct['id']]) }}" class="cursor-pointer">
      <img src="{{ $foodProduct['image'] }}" alt="Food Product" class="w-full h-40 object-cover rounded-t-lg">
      <div class="p-4">
        <h3 class="text-md font-semibold line-clamp-1">{{ $foodProduct['name'] }}</h3>
        <p class="mt-2 text-sm text-gray-600 line-clamp-1">{{ $foodProduct['description'] }}</p>
        <p class="mt-2 text-md font-bold">Price: ${{ $foodProduct['price'] }}</p>
      </div>
      </a>
    </div>
    @endforeach
  </div>
</div>
<!-- end new products -->

<!-- start popular vendors-->
<h1 class="text-xl m-4 text-gray-900 font-medium font-outfit">Popular Vendors</h1>
<div class="flex overflow-x-auto p-2 bg-gray-50 gap-3">
    @foreach ($vendors as $vendor)
    <div class="flex-shrink-0 w-30">
        <img src="{{ $vendor->image }}" alt="{{ $vendor->name }}" class="w-full h-30 object-cover">
        <div class="text-center mt-2">
            <span class="text-lg font-medium line-clamp-1">{{ $vendor->name }}</span>
        </div>
    </div>
    @endforeach
</div>
<!-- end popular vendors-->

</section>
@endsection