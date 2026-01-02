<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Show login form
    public function index()
    {
        return view('frontend.auth.login');
    }

    // Handle login form submission
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Show registration form
    public function create()
    {
        return view('frontend.auth.register');
    }

    // Handle registration form submission
    public function storeRegistration(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'status' => 1,
        ]);

        Auth::login($user);

        $cart = session()->get('cart', []);
        if (!empty($cart)) {
            foreach ($cart as $id => $details) {
                 
                 $print_quantity = $details['options']['print_quantity'] ?? 100;
                 $urgency = $details['options']['urgency'] ?? 'regular';
                 $productId = $details['product_id'];

                 $existingCartItem = \App\Models\Cart::where('user_id', $user->id)
                    ->where('product_id', $productId)
                    ->where('print_quantity', $print_quantity)
                    ->where('urgency', $urgency)
                    ->first();

                if ($existingCartItem) {
                    $existingCartItem->quantity += $details['quantity'];
                    $existingCartItem->save();
                } else {
                    \App\Models\Cart::create([
                        'user_id' => $user->id,
                        'product_id' => $productId,
                        'quantity' => $details['quantity'],
                        'print_quantity' => $print_quantity,
                        'urgency' => $urgency,
                        'price' => $details['price'],
                        'production_days' => $details['options']['production_days'] ?? 3,
                        'delivery_days' => $details['options']['delivery_days'] ?? 1,
                    ]);
                }
            }
        }

        return redirect()->intended(route('dashboard'))->with('success', 'Registration successful! You are now logged in.');
    }

    // Logout user
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}