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

        $otp = rand(100000, 999999);

        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'status' => 1,
            'otp' => $otp,
            'otp_expires_at' => Carbon::now()->addMinutes(10),
        ]);

        // Send OTP Notification
        $user->notify(new RegistrationOTP($otp));

        // Store user ID in session for verification
        session(['otp_user_id' => $user->id]);

        return redirect()->route('otp.verify')->with('success', 'Registration successful! Please check your email for the OTP code.');
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

            // Handle guest cart if exists
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
}