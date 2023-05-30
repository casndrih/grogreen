<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderHistory;
use App\Models\User;
use App\Models\Vendor;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Redirect;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Fetch orders with pagination for the currently authenticated user
        $orders = Order::where('user_id', $user->id)
            ->with('user', 'vendor')
            ->paginate(10);

        // Fetch order history with pagination for the currently authenticated user
        $order_history = OrderHistory::where('user_id', $user->id)
            ->with('user', 'vendor')
            ->paginate(10);

        // Get the vendor data for orders
        $vendorIds = $orders->pluck('vendor_id')->merge($order_history->pluck('vendor_id'))->unique();
        $vendors = Vendor::whereIn('id', $vendorIds)->get();

        return view('User.profile.index', compact('user', 'orders', 'order_history', 'vendors'));
    }

    public function edit($id)
    {
        return User::findOrFail($id);
    }

    public function update(Request $request)
    {
        // store
        $user = User::findOrFail($request->edit_user_id);
        $user->name = $request->edit_user_name;
        $user->gender = $request->edit_user_gender;
        $user->birthday = $request->edit_user_birthday;
        $user->email = $request->edit_user_email;
        $user->phone = $request->edit_user_phone;
        $user->city = $request->edit_user_city;
        $user->state = $request->edit_user_state;
        $user->home_delivery_address = $request->edit_user_address;
        $user->save();

        // redirect
        Session::flash('success', 'Profile Successfully Updated!');

        return Redirect::to('/user/profile');
    }
}
