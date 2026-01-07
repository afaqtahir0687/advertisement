<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 'active')->latest()->paginate(12);
        $categories = Category::where('status', 'active')->latest()->get();
        return view('frontend.pages.categories.index', compact('products', 'categories'));
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->where('status', 'active')->first();

        if ($category) {

            $subcategories = $category->subcategories()->where('status', 'active')->withCount('products')->get();

            $products = $category->getAllProducts();
        } else {

            $category = \App\Models\SubCategory::where('slug', $slug)->where('status', 'active')->firstOrFail();

            $subcategories = collect([]);

            $products = $category->getAllProducts();
        }

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
