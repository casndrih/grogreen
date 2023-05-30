@extends('User.app')

@section('content')
<section class="bg-gray-50 py-2">

  <div class="max-w-full">
    <div class="mx-auto">
      <!-- Tabs -->
      <div class="text-sm font-medium text-center text-gray-500 bg-white overflow-x-auto">
        <ul class="flex flex-no-wrap -mb-px">
          <li class="mr-2">
            <a id="profileTab" href="#" class="inline-block tab-link p-4 text-md lg:text-lg border-b-4 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300">My Profile</a>
          </li>
          <li class="mr-2">
            <a id="activeOrdersTab" href="#" class="inline-block tab-link p-4 text-md lg:text-lg border-b-4 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300">Active Orders</a>
          </li>
          <li class="mr-2">
            <a id="orderHistoryTab" href="#" class="inline-block tab-link p-4 text-md lg:text-lg border-b-4 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300">Order History</a>
          </li>
          <li class="mr-2">
            <a id="supportTicketTab" href="#" class="inline-block tab-link p-4 text-md lg:text-lg border-b-4 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300">Support Ticket</a>
          </li>
        </ul>
      </div>

     <!-- Profile Tab View -->
      <div id="profileView" style="display: none;">
        <!-- Profile content -->
        
        <!-- Cover Photo -->
      <div id="coverPhoto" class="relative">
        <div class="bg-gray-50 h-40 md:h-60 lg:h-90 rounded-t-lg">
          <img class="w-full h-40 md:h-60 lg:h-90 object-cover" src="{{ $user->cover_picture }}">
        </div>
        <!-- Profile Picture -->
        <div class="absolute top-1/2 left-4 transform -translate-y-1/2">
          <img src="{{ $user->profile_picture }}" alt="{{ $user->name }} Profile Picture" class="rounded-full object-cover shadow-lg w-16 h-16 lg:w-20 lg:h-20">
        </div>
      </div>

      <!-- Profile Card -->
      <div id="profileCard" class="bg-white rounded-b-lg shadow-sm">
      <div class="flex flex-row items-center gap-4 p-6">
      <div class="flex-col col-1">
      <h1 id="profileName" class="text-2xl font-outfit font-medium mb-2">{{ $user->name }}</h1>
      <p id="profileEmail" class="text-md font-regular text-gray-900">{{ $user->email }}</p>
      <p id="profilecity" class="text-md font-regular text-gray-900">{{ $user->city }}</p>
      <p id="profileState" class="text-md font-regular text-gray-900">{{ $user->state }}</p>
    </div>
    <div class="flex-col col-2">
      <p id="profileJoined" class="text-md font-regular text-gray-600"><h1 class="text-gray-900 font-medium">Date Registered:</h1> {{ $user->created_at }}</p>
    </div>
    
    <div class="flex-col col-3 justify-left">
      <a id="{{ $user->id }}" href="#" data-modal-target="editUserModal" data-modal-show="editUserModal" class="text-md editUser bg-lime-500 px-4 py-2 uppercase font-medium text-white rounded-full hover:bg-gray-900">Edit</a>
    </div>
    </div>
    </div>
   
    </div>

      <!-- Active Orders Tab View -->
      <div id="activeOrdersView" style="display: none;">
        <!-- Active Orders content -->
        @include('User.orders.index')
      </div>

      <!-- Order History Tab View -->
      <div id="orderHistoryView" style="display: none;">
        <!-- Order History content -->
        @include('User.orders-history.index')
      </div>

      <!-- Support Ticket Tab View -->
      <div id="supportTicketView" style="display: none;">
        <!-- Support Ticket content -->
        @include('User.support.index')
      </div>
    </div>
  </div>
  
</section>

@include('User.modals.user-modal')

@endsection

       @section('js')
        <script>
             // display user modal
            $(".editUser").click(function() {
           
            var current_object = $(this);
            var link = window.location.origin;
            id = current_object.attr('id');
            
            $.ajax({
                url: '/user/profile/edit/' + id,
                type: "GET",
                beforeSend: function() {
                $('#loader').show();
                },
                // return the result
                success: function(data) {
                
                $('#edit_user_id').val(data[0]['id']);
                $('#edit_user_name').val(data[0]['name']);
                $('#edit_user_gender').val(data[0]['gender']);
                $('#edit_user_birthday').val(data[0]['birthday']);
                $('#edit_user_email').val(data[0]['email']);
                $('#edit_user_phone').val(data[0]['phone']);
                $('#edit_user_city').val(data[0]['city']);
                $('#edit_user_state').val(data[0]['state']);
                $('#edit_user_address').val(data[0]['home_delivery_address']);
                $('#cover').attr('src', data[0]['cover_picture']);
                $('#propic').attr('src', data[0]['profile_picture']);  
                },
                
                complete: function() {   
                $('#loader').hide();
                },
                
                error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                  $('#loader').hide();
                },
                timeout: 8000
                })
     
                }); 
        
        </script>
        @endsection
