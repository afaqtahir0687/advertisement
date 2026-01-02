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
            'phone' => 'required|string|max:255', // Add unique check if desired
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'name' => $validated['first_name'] . ' ' . $validated['last_name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'status' => 1,
        ]);

        Auth::login($user);

        // Merge Guest Cart to DB
        $cart = session()->get('cart', []);
        if (!empty($cart)) {
            foreach ($cart as $id => $details) {
                 // Check if item already exists for this user (to avoid duplicates if they re-registered? unlikely but safe)
                 // Logic from CartController::add slightly adapted or reused.
                 // Ideally we should reuse CartController logic but for simplicity/speed here:
                 
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
            // Optional: Clear session cart after merging?
            // session()->forget('cart'); 
            // Usually we keep it synced or clear it. If we clear it, next request needs to pull from DB. 
            // The CartController logic seems to read check session first? 
            // Actually CartController::index logic (not shown fully) likely checks DB if logged in.
            // But to be safe and "merged", we usually clear session or keep it in sync. 
            // Given CartController methods separate session vs DB, better to Keep session for now OR ensure `CartController` checks DB.
            // Let's assume standard behavior: Logged in users use DB. 
            // So we might want to empty session cart to avoid confusion or double counting if logic combines them.
            // I will NOT clear it blindly unless I verify CartController uses DB when logged in.
            // Looking at CartController::add, it does BOTH session and DB if logged in.
            // So we should probably keep session populated to reflect current state? 
            // If I wipe session, user might see empty cart if `index` relies on session.
            // Re-reading CartController: `add` updates session AND DB. 
            // `remove` updates session AND (if logged in) DB.
            // So if I move to DB, I should probably LEAVE session alone as it mirrors DB? 
            // YES. 
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