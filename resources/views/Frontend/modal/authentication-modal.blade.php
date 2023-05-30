    <!-- Auth modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-lime-500 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-1 text-xl font-medium text-gray-900">Login</h3>
                <p class="mb-4 text-sm text-gray-800">Login your account to continue.</p>
                <form class="space-y-6" action="{{ URL::to('/login') }}" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password" id="password" placeholder="" class="bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5" required>
                    </div>
                    <div class="flex justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-lime-300" required>
                            </div>
                            <label for="remember" class="ml-2 text-sm text-gray-900">Remember me</label>
                        </div>
                        <a data-modal-target="reset-modal" data-modal-show="reset-modal" data-modal-hide="authentication-modal" class="text-sm text-lime-500 hover:underline">Lost Password?</a>
                    </div>
                    
                    <button type="submit" class="w-full text-white bg-lime-500 hover:bg-lime-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign in to your account</button>
                    
                    <a id="googleBtn" type="button" href="#" class="w-full bg-gray-900 flex items-center text-white justify-center gap-x-3 text-sm sm:text-base rounded-lg hover:bg-gray-700 duration-300 transition-colors border px-8 py-2.5">
                    <svg class="w-5 h-5 sm:h-6 sm:w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_3033_94454)">
                    <path d="M23.766 12.2764C23.766 11.4607 23.6999 10.6406 23.5588 9.83807H12.24V14.4591H18.7217C18.4528 15.9494 17.5885 17.2678 16.323 18.1056V21.1039H20.19C22.4608 19.0139 23.766 15.9274 23.766 12.2764Z" fill="#4285F4"/>
                    <path d="M12.2401 24.0008C15.4766 24.0008 18.2059 22.9382 20.1945 21.1039L16.3276 18.1055C15.2517 18.8375 13.8627 19.252 12.2445 19.252C9.11388 19.252 6.45946 17.1399 5.50705 14.3003H1.5166V17.3912C3.55371 21.4434 7.7029 24.0008 12.2401 24.0008Z" fill="#34A853"/>
                    <path d="M5.50253 14.3003C4.99987 12.8099 4.99987 11.1961 5.50253 9.70575V6.61481H1.51649C-0.18551 10.0056 -0.18551 14.0004 1.51649 17.3912L5.50253 14.3003Z" fill="#FBBC04"/>
                    <path d="M12.2401 4.74966C13.9509 4.7232 15.6044 5.36697 16.8434 6.54867L20.2695 3.12262C18.1001 1.0855 15.2208 -0.034466 12.2401 0.000808666C7.7029 0.000808666 3.55371 2.55822 1.5166 6.61481L5.50264 9.70575C6.45064 6.86173 9.10947 4.74966 12.2401 4.74966Z" fill="#EA4335"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_3033_94454">
                    <rect width="24" height="24" fill="white"/>
                    </clipPath>
                    </defs>
                    </svg>

                    <span>Sign in with Google</span>
                    </a>
                    
                    <div class="text-lg text-center justify-center font-outfit sm:text-sm mt-2 text-gray-900 md:text-xl lg:text-2xl" id="googleText">Coming soon</div>
                    
                    <a id="facebookBtn" type="button" href="#" class="w-full bg-[#1877F2] flex gap-x-3 text-sm sm:text-base items-center justify-center text-white rounded-lg hover:bg-[#1877F2]/80 duration-300 transition-colors border border-transparent px-8 py-2.5">
                    <svg class="w-5 h-5 sm:h-6 sm:w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_3033_94669)">
                    <path d="M24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 17.9895 4.3882 22.954 10.125 23.8542V15.4688H7.07812V12H10.125V9.35625C10.125 6.34875 11.9166 4.6875 14.6576 4.6875C15.9701 4.6875 17.3438 4.92188 17.3438 4.92188V7.875H15.8306C14.34 7.875 13.875 8.80008 13.875 9.75V12H17.2031L16.6711 15.4688H13.875V23.8542C19.6118 22.954 24 17.9895 24 12Z" fill="white"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_3033_94669">
                    <rect width="24" height="24" fill="white"/>
                    </clipPath>
                    </defs>
                    </svg>

                    <span>Sign in with Facebook</span>
                    </a>
                    
                    <div class="text-lg text-center justify-center font-outfit sm:text-sm mt-2 text-gray-900 md:text-xl lg:text-2xl" id="facebookText">Coming soon</div>
                    
                    <div class="text-sm text-gray-900">
                      Not registered? <a data-modal-target="registration-modal" data-modal-show="registration-modal" data-modal-hide="authentication-modal" class="text-lime-500 hover:underline">Create account</a>
                    </div>
                    </form>
                    </div>
                    </div>
                    </div>
                    </div> 
                                 
                    <!-- Register modal -->
                    <div id="registration-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full">
                    
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-lime-500 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="registration-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-1 text-xl font-medium text-gray-900">Register</h3>
                    <p class="mb-4 text-sm text-gray-700">Create account to get started.</p>
                    <form class="space-y-6" action="{{ URL::to('/register') }}" method="POST">
                    @csrf
                    <div>
                        <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900">Full Name</label>
                        <input type="text" name="full_name" id="full_name" class="bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5" placeholder="" required="">
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5" placeholder="" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password" id="password" placeholder="" class="bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5" required="">
                    </div>
                    <div>
                        <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900">Confirm password</label>
                        <input type="password" name="confirm_password" id="confirm_password" placeholder="" class="bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5" required="">
                    </div>
                    
                    <div>
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Type</label>
                        <select name="role" id="role" class="bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5" required="">
                        <option value="user">Buyer</option>
                        <option value="vendor">Seller</option>
                        </select>
                    </div>
                 
                    <div class="flex justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-lime-300" required="">
                            </div>
                            <label for="remember" class="ml-2 text-sm text-gray-900">I agree to the <a href="{{ URL::to('/policy') }}" class="hover:underline text-lime-500">Privacy Policy</a> & <a href="{{ URL::to('/tos') }}" class="hover:underline text-lime-500">T&C</a> of Grogreen.</label>
                        </div>
                        <a data-modal-target="reset-modal" data-modal-show="reset-modal" data-modal-hide="registration-modal" class="text-sm text-lime-500 hover:underline">Lost Password?</a>
                    </div>
                    
                    <button type="submit" class="w-full text-white bg-lime-500 hover:bg-lime-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Register account</button>
                    
                    <div class="text-sm text-gray-900">
                      Already Registered? <a data-modal-target="authentication-modal" data-modal-show="authentication-modal" data-modal-hide="registration-modal" class="text-lime-500 hover:underline">Login to account</a>
                    </div>
                    </form>
                    </div>
                    </div>
                    </div>
                    </div>
                    
         <!-- Account Reset modal -->
        <div id="reset-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-lime-500 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="reset-modal">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-1 text-xl font-medium text-gray-900">Password reset</h3>
                <p class="mb-4 text-sm text-gray-800">Enter your email address to reset.</p>
                <form class="space-y-6" action="{{ URL::to('/reset') }}" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5" placeholder="" required>
                    </div>
                
                    <button type="submit" class="w-full text-white bg-lime-500 hover:bg-lime-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Reset password</button>
                              
                    <div class="text-sm text-gray-900">
                      Not registered? <a data-modal-target="registration-modal" data-modal-show="registration-modal" data-modal-hide="reset-modal" class="text-lime-500 hover:underline">Create account</a>
                    </div>
                    </form>
                    </div>
                    </div>
                    </div>
                    </div>