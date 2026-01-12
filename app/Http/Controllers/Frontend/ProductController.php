<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('frontend.pages.products.index');
    }

    public function show($category_slug, $subcategory_slug, $product_slug)
    {
        $product = \App\Models\Product::where('slug', $product_slug)->where('status', 'active')->firstOrFail();
        $relatedProducts = \App\Models\Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('status', 'active')
            ->take(6)
            ->get();

        return view('frontend.pages.products.show', compact('product', 'relatedProducts'));
    }
}
