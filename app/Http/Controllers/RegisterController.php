<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
   public function register(Request $request)
   {
    // Validate the input
    $validatedData = $request->validate([
        'full_name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
        'confirm_password' => 'required|same:password',
        'role' => 'required|in:user,vendor',
    ]);

    // Create a new user based on the role
    if ($validatedData['role'] === 'user') {
        $user = User::create([
            'name' => $validatedData['full_name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => $validatedData['role'],
        ]);

        // Redirect the user to their profile
        Session::flash('success', 'Successfully registered!');

        return redirect()->route('user.profile');
    } elseif ($validatedData['role'] === 'vendor') {
        $vendor = Vendor::create([
            'name' => $validatedData['full_name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => $validatedData['role'],
        ]);

        // Redirect the vendor to their dashboard
        Session::flash('success', 'Successfully registered!');

        return redirect()->route('vendor.dashboard');
    }

    // If the role is not recognized, redirect to the registration page
    Session::flash('error', 'Invalid role!');

    return redirect()->back();
    }
}
