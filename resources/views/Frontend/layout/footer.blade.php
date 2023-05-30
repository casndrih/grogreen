<footer class="bg-white">
  <div class="max-w-screen-xl p-4 py-6 mx-auto lg:py-16 md:p-8 lg:p-10">
            <div class="grid grid-cols-2 gap-8 md:grid-cols-3 lg:grid-cols-5">
                <div>
                    <h3 class="mb-6 text-sm font-outfit font-bold text-gray-900 uppercase">Company</h3>
                    <ul class="text-gray-700">
                        <li class="mb-4">
                            <a href="{{ URL::to('/about') }}" class="font-medium hover:text-lime-500">About</a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ URL::to('/brands') }}" class="font-medium hover:text-lime-500">Brand Center</a>
                        </li>
                    
                    </ul>
                </div>
                <div>
                    <h3 class="mb-6 text-sm font-outfit font-bold text-gray-900 uppercase">Help center</h3>
                    <ul class="text-gray-700">
                        <li class="mb-4">
                        <a href="{{ URL::to('/guide') }}" class="font-medium hover:text-lime-500">Tracking</a>
                        </li>
                        
                        <li class="mb-4"> 
                        <a href="{{ URL::to('/contact') }}" class="font-medium hover:text-lime-500">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-6 text-sm font-outfit font-bold text-gray-900 uppercase">Legal</h3>
                    <ul class="text-gray-700">
                        <li class="mb-4">
                            <a href="{{ URL::to('/policy') }}" class="font-medium hover:text-lime-500">Privacy Policy</a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ URL::to('/tos') }}" class="font-medium hover:text-lime-500">T&C's</a>
                        </li>
                    </ul>
                </div>
      
            </div>

  <div class="container flex flex-col items-center justify-between p-6 mx-auto space-y-4 sm:space-y-0 sm:flex-row text-gray-900">

    <div class="text-center">
      <a href="{{ url('/') }}" class="flex items-center justify-center mb-2 text-2xl font-medium">
      <img src="{{ URL::asset('images/favicon/logo.svg') }}" class="h-8 mr-1" alt="Grogreen Logo" />
        <div class="font-outfit text-lime-500">Grogreen</div>
      </a>
    </div>

    <p class="text-sm">© {{ now()->format('Y') }} Grogreen. All Rights Reserved.</p>

    <div class="flex -mx-2">

      <a href="#" class="mx-2 transition-colors duration-300 hover:text-blue-500" aria-label="Facebook">
        <svg class="w-5 h-5 fill-gray-900" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M2.00195 12.002C2.00312 16.9214 5.58036 21.1101 10.439 21.881V14.892H7.90195V12.002H10.442V9.80204C10.3284 8.75958 10.6845 7.72064 11.4136 6.96698C12.1427 6.21332 13.1693 5.82306 14.215 5.90204C14.9655 5.91417 15.7141 5.98101 16.455 6.10205V8.56104H15.191C14.7558 8.50405 14.3183 8.64777 14.0017 8.95171C13.6851 9.25566 13.5237 9.68693 13.563 10.124V12.002H16.334L15.891 14.893H13.563V21.881C18.8174 21.0506 22.502 16.2518 21.9475 10.9611C21.3929 5.67041 16.7932 1.73997 11.4808 2.01722C6.16831 2.29447 2.0028 6.68235 2.00195 12.002Z"></path>
        </svg>
      </a>

      <a href="#" class="mx-2 transition-colors duration-300 hover:text-pink-500" aria-label="Instagram">
        <svg class="w-5 h-5 fill-gray-900" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z">
            </path>
            </svg>
           </a>

        </div>
    </div>
</footer>