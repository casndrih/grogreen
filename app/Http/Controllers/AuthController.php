<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            $user = Auth::user();

            if ($user instanceof Admin) {
                // Redirect the admin to the admin panel
                Session::flash('success', 'Successfully Login!');

                return redirect()->route('admin.dashboard');

            } elseif ($user instanceof Vendor) {
                // Redirect the vendor to the vendor panel
                Session::flash('success', 'Successfully Login!');

                return redirect()->route('vendor.dashboard');

            } elseif ($user instanceof User) {
                // Redirect the user (buyer) to the homepage
                Session::flash('success', 'Successfully Login!');

                return redirect()->route('user.profile');
            }
        }

        // Authentication failed, handle invalid credentials
        Session::flash('error', 'Invalid credentials!');

        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        Session::flash('success', 'Successfully Logout!');

        return redirect()->route('home');
    }
}
