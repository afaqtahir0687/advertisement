<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        // Assuming Wishlist model has a 'product' relationship
        $wishlist = Wishlist::where('user_id', $user->id)->with(['product.category', 'product.subcategory'])->get();

        return view('frontend.dashboard', compact('user', 'orders', 'wishlist'));
    }
}
