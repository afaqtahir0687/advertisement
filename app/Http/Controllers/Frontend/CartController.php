<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
       
        $designs_quantity = $request->input('quantity', 1);
        $print_quantity = $request->input('print_quantity', 100); 
        $urgency = $request->input('urgency', 'regular');

        $rate = 0;
        $production_days = 0;
        
        if ($urgency === 'flexible') {
            $rate = $product->flexible_rate;
            $production_days = $product->flexible_production_days ?? 5;
        } elseif ($urgency === 'urgent') {
            $rate = $product->urgent_rate;
            $production_days = $product->urgent_production_days ?? 1;
        } else {
            // Regular
            $rate = $product->discount_price ?: $product->price;
            $production_days = $product->production_days ?? 3;
        }

        // Fallback if rate is not set properly, though it should be.
        if (!$rate) $rate = $product->price;

        // Calculate unit price based on print quantity (per 100 units usually, assuming rate is per 100 or valid unit)
        // Based on view: Unit Price = (qty/100) * rate
        $unit_price = ($print_quantity / 100) * $rate;

        $cartId = $id . '_' . $print_quantity . '_' . $urgency;

        if (isset($cart[$cartId])) {
            $cart[$cartId]['quantity'] += $designs_quantity;
        } else {
            $cart[$cartId] = [
                "product_id" => $product->id, 
                "name" => $product->name,
                "quantity" => $designs_quantity, 
                "price" => $unit_price,          
                "original_price" => $unit_price, 
                "image" => $product->image,
                "slug" => $product->slug,
                "options" => [
                    "print_quantity" => $print_quantity,
                    "urgency" => $urgency,
                    "production_days" => $production_days,
                    "delivery_days" => $product->delivery_days ?? 1
                ]
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove($id)
    {
        if ($id) {
            $cart = session()->get('cart');
            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Product removed from cart successfully!');
        }
    }
}
