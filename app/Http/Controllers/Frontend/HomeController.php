<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = \App\Models\Slider::where('status', 'active')->get();
        $conceptBanners = \App\Models\Banner::where('position', 'concept_to_delivery')->where('status', 'active')->get();
        $featuredProducts = \App\Models\Product::with(['category', 'subcategory'])->where('is_featured', true)->where('status', 'active')->latest()->take(10)->get();
        $newArrivals = \App\Models\Product::with(['category', 'subcategory'])->where('is_new_arrival', true)->where('status', 'active')->latest()->take(10)->get();
        $categories = \App\Models\Category::where('status', 'active')->withCount('products')->get();
        
        return view('frontend.index', compact('sliders', 'conceptBanners', 'featuredProducts', 'newArrivals', 'categories'));
    }
    public function aboutUs()
    {
        return view('frontend.header-pages.about-us');
    }
     public function blogs()
    {
        return view('frontend.header-pages.blogs');
    }
     public function single()
    {
        return view('frontend.header-pages.single');
    }
    public function wishlist()
    {
        $wishlistIds = array_keys(session()->get('wishlist', []));
        $products = \App\Models\Product::with(['category', 'subcategory'])->whereIn('id', $wishlistIds)->where('status', 'active')->latest()->get();
        return view('frontend.header-pages.wishlist', compact('products'));
    }
    public function cart()
    {
        return view('frontend.header-pages.cart');
    }
    public function checkout()
    {
        $cart = session()->get('cart', []);
        $user = auth()->user();

        // Calculate totals
        $subtotal = 0; 
        $total_discount = 0;
        foreach($cart as $id => $details) {
            $item_original_total = ($details['original_price'] ?? $details['price']) * $details['quantity'];
            $item_selling_total = $details['price'] * $details['quantity'];
            
            $subtotal += $item_original_total;
            $total_discount += ($item_original_total - $item_selling_total);
        }

        $after_discount = $subtotal - $total_discount;
        $tax = $after_discount * 0.15; // 15% VAT
        $grand_total = $after_discount + $tax;

        $countries = \App\Models\Country::all();

        return view('frontend.header-pages.checkout', compact('cart', 'user', 'subtotal', 'total_discount', 'tax', 'grand_total', 'countries'));
    }
    public function orderComplete()
    {
        return view('frontend.header-pages.order-complete');
    }
    public function contactUs()
    {
        return view('frontend.pages.contacts.contact-us');
    }

    public function trackOrder()
    {
        return view('frontend.pages.track-order');
    }
}
