<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Separate providers are configured for administrators, vendors and buyers.
        foreach (['admin' => 'admin.dashboard', 'vendor' => 'vendor.dashboard', 'web' => 'user.profile'] as $guard => $destination) {
            if (Auth::guard($guard)->attempt($credentials, $request->boolean('remember'))) {
                $request->session()->regenerate();
                Session::flash('success', 'Successfully logged in.');

                return redirect()->intended(route($destination));
            }
        }

        Session::flash('error', 'Invalid credentials.');

        return back()->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        foreach (['admin', 'vendor', 'web'] as $guard) {
            if (Auth::guard($guard)->check()) {
                Auth::guard($guard)->logout();
            }
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::flash('success', 'Successfully logged out.');

        return redirect()->route('home');
    }
}
