<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('frontend.pages.categories.index');
    }

    public function bannerBoxSlider()
    {
        return view('frontend.pages.categories.banner-slider');
    }
    public function bannerBoxImg()
    {
        return view('frontend.pages.categories.banner-box-image');
    }
    public function rightSidebar()
    {
        return view('frontend.pages.categories.right-sidebar');
    }
    public function offCanvas()
    {
        return view('frontend.pages.categories.off-canvas');
    }
}
