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
        $featuredProducts = \App\Models\Product::where('is_featured', true)->where('status', 'active')->latest()->take(10)->get();
        $newArrivals = \App\Models\Product::where('is_new_arrival', true)->where('status', 'active')->latest()->take(10)->get();
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
        return view('frontend.header-pages.wishlist');
    }
    public function cart()
    {
        return view('frontend.header-pages.cart');
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
