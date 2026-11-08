<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        return view('Admin.dashboard.index', [
            'stats' => [
                'buyers' => DB::table('users')->count(),
                'vendors' => DB::table('vendors')->count(),
                'products' => DB::table('food_products')->count(),
                'orders' => DB::table('orders')->count(),
            ],
            'recentOrders' => DB::table('orders')->orderByDesc('created_at')->limit(8)->get(),
            'recentVendors' => DB::table('vendors')->orderByDesc('created_at')->limit(6)->get(),
        ]);
    }
}
