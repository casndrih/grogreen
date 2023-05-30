<!-- Edit user modal -->
   <div id="editUserModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
     <div class="relative w-full h-full max-w-md md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <button type="button" class="absolute top-3 right-2.5 text-gray-900 bg-transparent hover:bg-gray-200 hover:text-lime-500 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="editUserModal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                <span class="sr-only">Close modal</span>
            </button>
            <!-- Modal header -->
            <div class="flex px-6 py-5 rounded-t items-center">
            <img src="{{ URL::asset('images/favicon/logo.svg') }}" class="flex-shrink-0 h-6 w:6 mr-3 sm:h-9" alt="Grogreen Logo" />
                <h3 class="inline-flex items-center text-base font-semibold text-gray-900 lg:text-xl">
                    Profile update
                </h3>
            </div>
                <!-- Modal body -->
            <form id="user-edit-form" action="{{ URL::to('/user/profile/update') }}" method="POST">
                @csrf
                <div class="px-6 py-4">
                <ul class="my-4 space-y-3">
                    
                <li>
			    <div class="col-span-full hidden sm:col-span-3">
			    <label for="edit_user_id" type="hidden" class="block mb-2 text-sm font-medium text-gray-900">ID</label>
			    <input id="edit_user_id" type="hidden" name="edit_user_id" placeholder="ID" class="w-full bg-gray-50 rounded-full focus:ring focus:ring-opacity-75 focus:ring-lime-500 border-gray-100 text-gray-900">
			    </div>
			    </li>
                    
			    <li>
			    <div class="col-span-full sm:col-span-3">
                <img id="propic" class="w-20 h-20 rounded-full object-cover" src="#" alt="User Image">
                </div>
                </li>
                         
                <li>
			    <div class="col-span-full sm:col-span-3">
                <label for="edit_user_name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                <input type="text" name="edit_user_name" id="edit_user_name" class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5" placeholder="Name">
                </div>
                </li>
                        
                <li>
                <div>
                <label for="gender" class="block mb-2 text-sm font-medium text-gray-900">Gender</label>
                <select name="gender" id="gender" class="bg-gray-50 border border-gray-50 text-gray-900 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5" required="">
                <option value="male">Male</option>
                <option value="female">Female</option>
                </select>
                </div>
                </li>
                        
                        <li>
                       <div class="col-span-full sm:col-span-3">
                            <label for="edit_user_email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="email" name="edit_user_email" id="edit_user_email" class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5" placeholder="Email">
                       </div>
                       </li>
                        
                        <li>
                       <div class="col-span-full sm:col-span-3">
                            <label for="edit_user_phone" class="block mb-2 text-sm font-medium text-gray-900">Phone Number</label>
                            <input type="tel" name="edit_user_phone" id="edit_user_phone" class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5" placeholder="e.g. +(675) 72345678">
                       </div>
                       </li>
                        
                        <li>
                       <div class="col-span-full sm:col-span-3">
                       <label for="edit_user_address" class="block mb-2 text-sm font-medium text-gray-900">Home Delivery Address</label>
                       <input type="text" name="edit_user_address" id="edit_user_address" class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5" placeholder="Address">
                       </div>
                       </li>
                        
                    </ul>
                    <div>
             <!-- Modal footer -->
             <button type="submit" class="btn text-white bg-lime-500 hover:bg-lime-400 focus:ring-4 focus:outline-none focus:ring-lime-300 shadow-lg shadow-lime-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center ml-4 mr-4 mb-2">Update</button>
            </div>
            </div>
            </form>
        </div>
        </div>
        </div>