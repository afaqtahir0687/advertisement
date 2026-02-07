<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlaced;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'payment_method' => 'required|in:card,wallet,stc',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Calculate totals
        $subtotal = 0; 
        $total_discount = 0;
        foreach($cart as $id => $details) {
            $item_original_total = ($details['original_price'] ?? $details['price']) * $details['quantity'];
            $item_selling_total = $details['price'] * $details['quantity'];
            
            $subtotal += $item_original_total;
            $total_discount += ($item_original_total - $item_selling_total);
        }

        $after_discount = $subtotal - $total_discount;
        $tax = $after_discount * 0.15; // 15% VAT
        $grand_total = $after_discount + $tax;

        DB::beginTransaction();
        try {
            $order = Order::create([
                'user_id' => auth()->id(),
                'order_number' => 'ORD-' . strtoupper(Str::random(10)),
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'company_name' => $request->company_name,
                'country_id' => $request->country,
                'state_id' => $request->state,
                'city_id' => $request->city,
                'address' => $request->address,
                'zip_code' => $request->zip_code,
                'phone' => $request->phone,
                'email' => $request->email,
                'notes' => $request->notes,
                'subtotal' => $subtotal,
                'discount' => $total_discount,
                'tax' => $tax,
                'shipping' => 0,
                'grand_total' => $grand_total,
                'payment_method' => $request->payment_method,
                'payment_status' => 'pending',
                'order_status' => 'pending',
            ]);

            foreach ($cart as $id => $details) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $details['product_id'],
                    'product_name' => $details['name'],
                    'quantity' => $details['quantity'],
                    'price' => $details['price'],
                    'total' => $details['price'] * $details['quantity'],
                ]);
            }

            DB::commit();
            session()->forget('cart');


            // Send Order Confirmation Email
            try {
                $order->load('items'); // Ensure items are loaded
                \Log::info('Attempting to send order email for order: ' . $order->order_number . ' to: ' . $order->email);
                if (empty($order->email)) {
                    \Log::error('Order email is empty for order: ' . $order->order_number);
                } else {
                    Mail::to($order->email)->send(new OrderPlaced($order));
                    \Log::info('Order email sent successfully for order: ' . $order->order_number);
                }
            } catch (\Exception $e) {
                // Log error but don't fail the order if email fails
                \Log::error('Order email failed: ' . $e->getMessage() . ' Trace: ' . $e->getTraceAsString());
            }
            
            return redirect()->route('order.complete')->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong while placing your order. ' . $e->getMessage());
        }
    }
}
