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
        $categories = Category::where('status', 'active')->whereNull('parent_id')->latest()->get();
        return view('frontend.pages.categories.index', compact('categories'));
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->where('status', 'active')->firstOrFail();
        
        // Get subcategories with product counts
        $subcategories = $category->children()->where('status', 'active')->withCount('products')->get();
        
        // Get all products from this category and its subcategories
        $products = $category->getAllProducts();
        
        return view('frontend.pages.categories.show', compact('category', 'products', 'subcategories'));
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
