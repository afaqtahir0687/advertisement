<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.index');
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
}
