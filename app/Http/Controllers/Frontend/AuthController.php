<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Notifications\RegistrationOTP;
use Carbon\Carbon;

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
            $user = Auth::user();
            $this->syncCart($user);
            $this->syncWishlist($user);
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
        'last_name'  => 'required|string|max:255',
        'email'      => 'required|string|email|max:255|unique:users',
        'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'password'   => [
            'required',
            'string',
            'min:8',
            'confirmed',
            'regex:/[a-z]/',      // at least one lowercase letter
            'regex:/[A-Z]/',      // at least one uppercase letter
            'regex:/[0-9]/',      // at least one digit
            'regex:/[@$!%*#?&]/', // at least one special character
        ],
    ]);

    // Generate OTP
    $otp = rand(100000, 999999);

    // Handle Image Upload
    $imageName = null;
    if ($request->hasFile('image')) {
        $image      = $request->file('image');
        $imageName  = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/images/users_image'), $imageName);
    }

    // Create User
    $user = User::create([
        'first_name'       => $validated['first_name'],
        'last_name'        => $validated['last_name'],
        'email'            => $validated['email'],
        'password'         => Hash::make($validated['password']),
        'image'            => $imageName,
        'status'           => 1,
        'otp'              => $otp,
        'otp_expires_at'   => Carbon::now()->addMinutes(10),
    ]);

    // Send OTP Notification
    $user->notify(new RegistrationOTP($otp));

    // Store user ID in session for OTP verification
    session(['otp_user_id' => $user->id]);

    return redirect()
        ->route('otp.verify')
        ->with('success', 'Registration successful! Please check your email for the OTP code.');
}

    // Show OTP verification form
    public function showVerifyOtp()
    {
        if (!session()->has('otp_user_id')) {
            return redirect()->route('register');
        }

        return view('frontend.auth.verify-otp');
    }

    // Handle OTP verification
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric|digits:6',
        ]);

        $userId = session('otp_user_id');
        $user = User::findOrFail($userId);

        if ($user->otp === $request->otp && Carbon::now()->isBefore($user->otp_expires_at)) {
            // Success: clear OTP and mark email as verified (optional, but professional)
            $user->otp = null;
            $user->otp_expires_at = null;
            $user->email_verified_at = Carbon::now();
            $user->save();

            Auth::login($user);
            session()->forget('otp_user_id');

            $this->syncCart($user);
            $this->syncWishlist($user);

            return redirect()->intended(route('dashboard'))->with('success', 'Email verified successfully! Welcome to your dashboard.');
        }

        return back()->withErrors(['otp' => 'The provided OTP is invalid or has expired.']);
    }

    // Resend OTP
    public function resendOtp()
    {
        $userId = session('otp_user_id');
        if (!$userId) {
            return redirect()->route('register');
        }

        $user = User::findOrFail($userId);
        $otp = rand(100000, 999999);

        $user->otp = $otp;
        $user->otp_expires_at = Carbon::now()->addMinutes(10);
        $user->save();

        $user->notify(new RegistrationOTP($otp));

        return back()->with('success', 'A new OTP has been sent to your email.');
    }

    // Logout user
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    private function syncCart($user)
    {
        $sessionCart = session()->get('cart', []);

        // 1. Merge session cart into database
        if (!empty($sessionCart)) {
            foreach ($sessionCart as $id => $details) {
                // Generate a hash of options to match correctly
                $options = $details['options'] ?? [];
                unset($options['print_quantity'], $options['urgency'], $options['production_days'], $options['delivery_days']);
                
                $existingCartItem = \App\Models\Cart::where('user_id', $user->id)
                    ->where('product_id', $details['product_id'])
                    ->where('print_quantity', $details['options']['print_quantity'] ?? 100)
                    ->where('urgency', $details['options']['urgency'] ?? 'regular')
                    ->where('options', json_encode($options))
                    ->first();

                if ($existingCartItem) {
                    $existingCartItem->quantity += $details['quantity'];
                    $existingCartItem->save();
                } else {
                    \App\Models\Cart::create([
                        'user_id' => $user->id,
                        'product_id' => $details['product_id'],
                        'quantity' => $details['quantity'],
                        'print_quantity' => $details['options']['print_quantity'] ?? 100,
                        'urgency' => $details['options']['urgency'] ?? 'regular',
                        'price' => $details['price'],
                        'production_days' => $details['options']['production_days'] ?? 3,
                        'delivery_days' => $details['options']['delivery_days'] ?? 1,
                        'options' => $options
                    ]);
                }
            }
        }

        // 2. Load ALL items from database back into session
        $dbCartItems = \App\Models\Cart::where('user_id', $user->id)->with('product')->get();
        $finalCart = [];

        foreach ($dbCartItems as $item) {
            $options = $item->options ?? [];
            $optionsHash = !empty($options) ? '_' . md5(json_encode($options)) : '';
            $cartId = $item->product_id . '_' . $item->print_quantity . '_' . $item->urgency . $optionsHash;

            $finalCart[$cartId] = [
                "product_id" => $item->product_id,
                "name" => $item->product->name,
                "quantity" => $item->quantity,
                "price" => $item->price,
                "original_price" => $item->price, // Simplified for now
                "image" => $item->product->image,
                "slug" => $item->product->slug,
                "options" => array_merge([
                    "print_quantity" => $item->print_quantity,
                    "urgency" => $item->urgency,
                    "production_days" => $item->production_days,
                    "delivery_days" => $item->delivery_days
                ], $options)
            ];
        }

        session()->put('cart', $finalCart);
    }

    private function syncWishlist($user)
    {
        $sessionWishlist = session()->get('wishlist', []);

        // 1. Merge session wishlist into database
        if (!empty($sessionWishlist)) {
            foreach ($sessionWishlist as $id => $details) {
                \App\Models\Wishlist::updateOrCreate([
                    'user_id' => $user->id,
                    'product_id' => $id
                ]);
            }
        }

        // 2. Load ALL items from database back into session
        $dbWishlistItems = \App\Models\Wishlist::where('user_id', $user->id)->with('product')->get();
        $finalWishlist = [];

        foreach ($dbWishlistItems as $item) {
            $finalWishlist[$item->product_id] = [
                "product_id" => $item->product_id,
                "name" => $item->product->name,
                "price" => $item->product->discount_price ?: $item->product->price,
                "image" => $item->product->image,
                "slug" => $item->product->slug
            ];
        }

        session()->put('wishlist', $finalWishlist);
    }
}
