<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product; // Added Product model import
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 'active')->latest()->get();
        return view('frontend.pages.categories.index', compact('categories'));
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->where('status', 'active')->firstOrFail();
        $products = Product::where('category_id', $category->id)->where('status', 'active')->get();
        return view('frontend.pages.categories.show', compact('category', 'products'));
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
