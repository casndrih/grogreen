<header class="bg-white">
  <div class="flex items-center justify-between max-w-screen-xl mx-auto py-2.5 px-2">
    <div class="flex items-center">
      <a href="{{ URL::to('/') }}" class="mr-2 flex flex-row items-center">
        <img src="{{ URL::asset('images/favicon/logo.svg') }}" alt="Grogreen Logo" class="h-8 w-8">
        <h1 class="inline-flex text-xl mr-4 font-outfit font-medium lg:block text-lime-500">Grogreen</h1>
      </a>
    </div>
    <div class="flex items-center">
  <form action="#" method="GET" class="mx-3">
    <div class="relative">
      <input type="search" name="q" placeholder="Search Groceries & Vendors" class="w-full bg-gray-100 border border-gray-100 rounded-full px-2 py-2 focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent text-black" id="searchInput">
      <div id="dropdownMenu" class="absolute mt-1 bg-white border border-gray-200 rounded-md shadow-md z-150" style="width: 185px; display: none;">
        <ul id="searchResults">
        </ul>
        <ul id="commandPalette" style="display: none;">
          <li class="py-2 px-4 hover:bg-gray-100">Command 1</li>
          <li class="py-2 px-4 hover:bg-gray-100">Command 2</li>
          <li class="py-2 px-4 hover:bg-gray-100">Command 3</li>
        </ul>
      </div>
    </div>
  </form>
      @guest
        <a data-modal-target="authentication-modal" data-modal-show="authentication-modal"><svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 mx-2 hover:text-lime-500" viewBox="0 0 24 24" fill="#000"><path d="M12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2ZM12.1597 16C10.1243 16 8.29182 16.8687 7.01276 18.2556C8.38039 19.3474 10.114 20 12 20C13.9695 20 15.7727 19.2883 17.1666 18.1081C15.8956 16.8074 14.1219 16 12.1597 16ZM12 4C7.58172 4 4 7.58172 4 12C4 13.8106 4.6015 15.4807 5.61557 16.8214C7.25639 15.0841 9.58144 14 12.1597 14C14.6441 14 16.8933 15.0066 18.5218 16.6342C19.4526 15.3267 20 13.7273 20 12C20 7.58172 16.4183 4 12 4ZM12 5C14.2091 5 16 6.79086 16 9C16 11.2091 14.2091 13 12 13C9.79086 13 8 11.2091 8 9C8 6.79086 9.79086 5 12 5ZM12 7C10.8954 7 10 7.89543 10 9C10 10.1046 10.8954 11 12 11C13.1046 11 14 10.1046 14 9C14 7.89543 13.1046 7 12 7Z"></path></svg>
        </a>
      @else
        @if (Auth::user() instanceof \App\Models\User)
          <div x-data="{ open: false }" @click.away="open = false" class="relative">
            <button @click="open = !open" class="mt-2 lg:hidden">
              <img src="{{ Auth::user()->profile_picture }}" alt="Profile Picture" class="w-9 h-9 rounded-full mx-4 hover:text-lime-500 object-cover">
            </button>
            <div x-show="open" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-md z-50">
              <a href="{{ route('user.profile') }}" class="block px-4 py-2 text-gray-600 font-medium hover:bg-gray-50 hover:text-lime-500">Profile</a>
              <a href="{{ URL::to('/user/orders') }}" class="block px-4 py-2 text-gray-600 font-medium hover:bg-gray-50 hover:text-lime-500">Active Orders</a>
              <a href="{{ URL::to('/user/orderhistory') }}" class="block px-4 py-2 text-gray-600 font-medium hover:bg-gray-50 hover:text-lime-500">Order History</a>
              <a href="{{ URL::to('/logout') }}" class="block px-4 py-2 text-gray-600 font-medium hover:bg-gray-50 hover:text-lime-500">Logout</a>
            </div>
          </div>
        @else
          @if (Auth::user() instanceof \App\Models\Vendor)
            <a href="{{ route('vendor.dashboard') }}" class="mr-2">Vendor Dashboard</a>
          @elseif (Auth::user() instanceof \App\Models\Admin)
            <a href="{{ route('admin.dashboard') }}" class="mr-2">Admin Dashboard</a>
          @endif
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-red-500">Logout</button>
          </form>
        @endif
      @endguest
    </div>
  </div>
</header>