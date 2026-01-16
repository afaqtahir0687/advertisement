<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Admin Dashboard
     * URL: /admin/dashboard
     */
    public function index()
    {
        $data = [
            'categoriesCount' => \App\Models\Category::count(),
            'subcategoriesCount' => \App\Models\SubCategory::count(),
            'productsCount' => \App\Models\Product::count(),
            'ordersCount' => \App\Models\Order::count(),
            'usersCount' => \App\Models\User::count(),
            'cartsCount' => \App\Models\Cart::count(),
            'recentOrders' => \App\Models\Order::latest()->take(5)->get(),
        ];

        return view('admin.dashboard', $data);
    }
}
