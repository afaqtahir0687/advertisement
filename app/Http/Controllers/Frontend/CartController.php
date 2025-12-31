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

        if (!$rate) $rate = $product->price;


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

        // Database Persistence for Authenticated Users
        if (auth()->check()) {
            $user = auth()->user();

            // Check if item exists in DB for this user with same options
            $existingCartItem = \App\Models\Cart::where('user_id', $user->id)
                ->where('product_id', $product->id)
                ->where('print_quantity', $print_quantity)
                ->where('urgency', $urgency)
                ->first();

            if ($existingCartItem) {
                $existingCartItem->quantity += $designs_quantity;
                $existingCartItem->save();
            } else {
                \App\Models\Cart::create([
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                    'quantity' => $designs_quantity,
                    'print_quantity' => $print_quantity,
                    'urgency' => $urgency,
                    'price' => $unit_price,
                    'production_days' => $production_days,
                    'delivery_days' => $product->delivery_days ?? 1,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);

            // Sync with DB
            if (auth()->check()) {
                // Determine cart details from session ID (composite key)
                // ID format: product_id . '_' . print_quantity . '_' . urgency
                $parts = explode('_', $request->id);
                if (count($parts) >= 3) {
                    $productId = $parts[0];
                    $printQuantity = $parts[1];
                    $urgency = $parts[2];

                    $cartItem = \App\Models\Cart::where('user_id', auth()->id())
                        ->where('product_id', $productId)
                        ->where('print_quantity', $printQuantity)
                        ->where('urgency', $urgency)
                        ->first();

                    if ($cartItem) {
                        $cartItem->quantity = $request->quantity;
                        $cartItem->save();
                    }
                }
            }

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

                // Sync with DB
                if (auth()->check()) {
                    $parts = explode('_', $id);
                    if (count($parts) >= 3) {
                        $productId = $parts[0];
                        $printQuantity = $parts[1];
                        $urgency = $parts[2];

                        \App\Models\Cart::where('user_id', auth()->id())
                            ->where('product_id', $productId)
                            ->where('print_quantity', $printQuantity)
                            ->where('urgency', $urgency)
                            ->delete();
                    }
                }
            }
            return redirect()->back()->with('success', 'Product removed from cart successfully!');
        }
    }
}
