<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function add($id)
    {
        $product = Product::findOrFail($id);
        $wishlist = session()->get('wishlist', []);

        if (!isset($wishlist[$id])) {
            $wishlist[$id] = [
                "name" => $product->name,
                "price" => $product->discount_price ?: $product->price,
                "image" => $product->image,
                "slug" => $product->slug
            ];
            session()->put('wishlist', $wishlist);
            return redirect()->back()->with('success', 'Product added to wishlist successfully!');
        }

        return redirect()->back()->with('info', 'Product is already in your wishlist!');
    }

    public function remove($id)
    {
        if ($id) {
            $wishlist = session()->get('wishlist');
            if (isset($wishlist[$id])) {
                unset($wishlist[$id]);
                session()->put('wishlist', $wishlist);
            }
            session()->flash('success', 'Product removed from wishlist successfully');
        }
        return redirect()->back();
    }
}
