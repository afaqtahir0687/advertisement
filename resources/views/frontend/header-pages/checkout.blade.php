@extends('frontend.layouts.master')
@section('title', 'Checkout - Complete Your Printing Order')
@section('meta_description', 'Securely checkout and finalize your order for business cards, flyers, and other professional printing products at Crelogics.')
@section('meta_keywords', 'checkout, place order, printing services checkout, secure payment Crelogics')
@section('content')
    <main class="main">
        <div class="container">
            <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
                <li>
                    <a href="{{ route('cart.index') }}">Shopping Cart</a>
                </li>
                <li class="active">
                    <a href="{{ route('checkout.index') }}">Checkout</a>
                </li>
                <li class="disabled">
                    <a href="#">Order Complete</a>
                </li>
            </ul>

            <div class="row">
                <div class="col-lg-7">
                    <ul class="checkout-steps">
                        <li>
                            <h2 class="step-title">Billing Details</h2>

                            <form action="#" id="checkout-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name <span class="required">*</span></label>
                                            <input type="text" class="form-control" name="first_name" value="{{ $user->first_name ?? '' }}" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name <span class="required">*</span></label>
                                            <input type="text" class="form-control" name="last_name" value="{{ $user->last_name ?? '' }}" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Company Name (Optional)</label>
                                    <input type="text" class="form-control" name="company_name" value="{{ $user->company_name ?? '' }}">
                                </div>

                                <div class="select-custom">
                                    <label>Country / Region <span class="required">*</span></label>
                                    <select name="country" id="country" class="form-control" required>
                                        <option value="">Select a country</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}" {{ (isset($user) && $user->country == $country->id) ? 'selected' : '' }}>{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="select-custom mt-2">
                                    <label>State / County <span class="required">*</span></label>
                                    <select name="state" id="state" class="form-control" required>
                                        <option value="">Select a state</option>
                                    </select>
                                </div>

                                <div class="select-custom mt-2">
                                    <label>Town / City <span class="required">*</span></label>
                                    <select name="city" id="city" class="form-control" required>
                                        <option value="">Select a city</option>
                                    </select>
                                </div>

                                <div class="form-group mt-2">
                                    <label>Street Address <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="address" value="{{ $user->address ?? '' }}" placeholder="House number and street name" required />
                                </div>

                                <div class="form-group">
                                    <label>Postcode / ZIP <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="zip_code" value="{{ $user->zip_code ?? '' }}" required />
                                </div>

                                <div class="form-group">
                                    <label>Phone <span class="required">*</span></label>
                                    <input type="tel" class="form-control" name="phone" value="{{ $user->phone ?? '' }}" required />
                                </div>

                                <div class="form-group">
                                    <label>Email Address <span class="required">*</span></label>
                                    <input type="email" class="form-control" name="email" value="{{ $user->email ?? '' }}" required />
                                </div>

                                <div class="form-group">
                                    <label class="order-comments">Order notes (optional)</label>
                                    <textarea class="form-control" name="notes" placeholder="Notes about your order, e.g. special notes for delivery." rows="5"></textarea>
                                </div>
                            </form>

@push('scripts')
                            <script>
                                $(document).ready(function() {
                                    $('#country').on('change', function() {
                                        var countryId = $(this).val();
                                        $('#state').html('<option value="">Loading...</option>');
                                        $('#city').html('<option value="">Select a city</option>');

                                        if (countryId) {
                                            $.ajax({
                                                url: '/get-states/' + countryId,
                                                type: 'GET',
                                                success: function(data) {
                                                    $('#state').html('<option value="">Select a state</option>');
                                                    $.each(data, function(key, value) {
                                                        $('#state').append('<option value="' + value.id + '">' + value.name + '</option>');
                                                    });
                                                }
                                            });
                                        } else {
                                            $('#state').html('<option value="">Select a state</option>');
                                        }
                                    });

                                    $('#state').on('change', function() {
                                        var stateId = $(this).val();
                                        $('#city').html('<option value="">Loading...</option>');

                                        if (stateId) {
                                            $.ajax({
                                                url: '/get-cities/' + stateId,
                                                type: 'GET',
                                                success: function(data) {
                                                    $('#city').html('<option value="">Select a city</option>');
                                                    $.each(data, function(key, value) {
                                                        $('#city').append('<option value="' + value.id + '">' + value.name + '</option>');
                                                    });
                                                }
                                            });
                                        } else {
                                            $('#city').html('<option value="">Select a city</option>');
                                        }
                                    });
                                });

                                function switchTab(tabId) {
                                    // Remove active class from all buttons
                                    $('.payment-tab-btn').removeClass('active');
                                    // Add active class to clicked button
                                    $(event.currentTarget).addClass('active');

                                    // Hide all tab contents
                                    $('.tab-content').removeClass('active');
                                    // Show selected tab content
                                    $('#' + tabId + '-tab').addClass('active');
                                }
                            </script>
                            @endpush
                        </li>
                    </ul>
                </div>

                <div class="col-lg-5">
                        <style>
                            .order-summary {
                                background: #fff;
                                border-radius: 12px;
                                box-shadow: 0 4px 20px rgba(0,0,0,0.08);
                                padding: 25px;
                                position: sticky;
                                top: 20px;
                            }
                            .order-summary h3 {
                                font-weight: 700;
                                color: #1a1a1a;
                                margin-bottom: 20px;
                                border-bottom: 1px solid #f0f0f0;
                                padding-bottom: 15px;
                            }
                            .table-mini-cart { margin-bottom: 0; }
                            .table-mini-cart th { border: none; color: #777; font-weight: 500; font-size: 13px; }
                            .product-title { font-size: 15px; font-weight: 600; color: #333; }
                            .price-col span { font-weight: 700; color: #1a1a1a; }
                            .order-total h4 { font-size: 18px; font-weight: 700; margin: 0; }
                            .total-price span { font-size: 24px; color: #000; font-weight: 800; }

                            /* Payment Section Styling */
                            .payment-container { margin-top: 30px; border-top: 2px solid #f5f5f5; padding-top: 30px; }
                            .payment-options-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; flex-wrap: wrap; gap: 10px; }
                            .payment-methods-logos img { height: 24px; margin-left: 10px; opacity: 0.8; filter: grayscale(20%); }

                            .payment-tabs { display: flex; border-bottom: 1px solid #eee; margin-bottom: 25px; }
                            .payment-tab-btn {
                                padding: 12px 25px;
                                cursor: pointer;
                                font-weight: 600;
                                color: #666;
                                border-bottom: 3px solid transparent;
                                transition: all 0.3s;
                                font-size: 15px;
                            }
                            .payment-tab-btn.active { color: #0066cc; border-bottom-color: #0066cc; }
                            .payment-tab-btn:hover { color: #0066cc; }

                            .tab-content { display: none; animation: fadeIn 0.4s ease-out; }
                            .tab-content.active { display: block; }
                            @keyframes fadeIn { from { opacity: 0; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }

                            .payment-form-group { margin-bottom: 20px; }
                            .payment-form-group label { display: block; margin-bottom: 8px; font-weight: 600; color: #444; font-size: 14px; }
                            .payment-form-group input {
                                width: 100%;
                                padding: 12px 15px;
                                border: 1px solid #ddd;
                                border-radius: 8px;
                                font-size: 15px;
                                transition: border-color 0.3s, box-shadow 0.3s;
                            }
                            .payment-form-group input:focus { border-color: #0066cc; outline: none; box-shadow: 0 0 0 3px rgba(0,102,204,0.1); }

                            .expiry-cvv-row { display: flex; gap: 15px; }
                            .btn-place-order {
                                width: 100%;
                                padding: 15px;
                                background: #0056b3;
                                color: #fff;
                                border: none;
                                border-radius: 30px;
                                font-weight: 700;
                                font-size: 16px;
                                margin-top: 20px;
                                transition: background 0.3s, transform 0.2s;
                                cursor: pointer;
                            }
                            .btn-place-order:hover { background: #004494; transform: translateY(-2px); box-shadow: 0 4px 15px rgba(0,86,179,0.3); }

                            .wallet-balance, .stc-header { background: #f8f9fa; padding: 15px; border-radius: 10px; border-left: 4px solid #0066cc; margin-bottom: 15px; }
                            .wallet-balance p, .stc-header p { margin: 0; font-weight: 500; color: #555; }
                        </style>

                        <div class="order-summary">
                            <h3>YOUR ORDER</h3>

                            <table class="table table-mini-cart">
                                <thead>
                                    <tr>
                                        <th colspan="2">PRODUCT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart as $id => $details)
                                    <tr>
                                        <td class="product-col">
                                            <h3 class="product-title">
                                                {{ $details['name'] }} <span class="text-muted">× {{ $details['quantity'] }}</span>
                                            </h3>
                                        </td>
                                        <td class="price-col text-right">
                                            <span>{{ format_price($details['price'] * $details['quantity']) }}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal border-top">
                                        <td><h4 class="font-size-sm">Subtotal</h4></td>
                                        <td class="price-col text-right"><span>{{ format_price($subtotal) }}</span></td>
                                    </tr>
                                    @if($total_discount > 0)
                                    <tr class="cart-subtotal text-danger">
                                        <td><h4 class="font-size-sm">Discount</h4></td>
                                        <td class="price-col text-right"><span>-{{ format_price($total_discount) }}</span></td>
                                    </tr>
                                    @endif
                                    <tr class="cart-subtotal">
                                        <td><h4 class="font-size-sm">Tax (15%)</h4></td>
                                        <td class="price-col text-right"><span>{{ format_price($tax) }}</span></td>
                                    </tr>
                                    <tr class="order-shipping">
                                        <td colspan="2">
                                            <h4 class="font-size-sm m-b-xs">Shipping</h4>
                                            <div class="custom-control custom-radio d-flex align-items-center">
                                                <input type="radio" class="custom-control-input" name="shipping_method" checked />
                                                <label class="custom-control-label font-weight-bold" style="font-size: 14px;">Free Shipping</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="order-total border-top pt-3">
                                        <td><h4>Total</h4></td>
                                        <td class="text-right">
                                            <b class="total-price"><span>{{ format_price($grand_total) }}</span></b>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="payment-container">
                                <div class="payment-options-header">
                                    <h4 class="m-0">Payment Options</h4>
                                    <div class="payment-methods-logos d-flex flex-wrap justify-content-end">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/d/d1/Mada_Logo.svg" alt="mada" onerror="this.src='https://via.placeholder.com/40x24?text=mada'">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" alt="mastercard">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" alt="visa">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="paypal" style="height: 20px;">
                                    </div>
                                </div>

                                <div class="payment-tabs">
                                    <div class="payment-tab-btn active" onclick="switchTab('card')">Credit/Debit Card</div>
                                    <div class="payment-tab-btn" onclick="switchTab('wallet')">Wallet</div>
                                    <div class="payment-tab-btn" onclick="switchTab('stc')">STC Pay</div>
                                </div>

                                <div id="card-tab" class="tab-content active">
                                    <div class="payment-form-group">
                                        <label>Card number *</label>
                                        <input type="text" name="card_number" placeholder="Enter your card number here" inputmode="numeric" autocomplete="cc-number" required>
                                    </div>
                                    <div class="expiry-cvv-row">
                                        <div class="payment-form-group flex-fill">
                                            <label>Expiry *</label>
                                            <input type="text" name="card_expiry" placeholder="MM/YY" autocomplete="cc-exp" required>
                                        </div>
                                        <div class="payment-form-group flex-fill">
                                            <label>CVV *</label>
                                            <input type="password" name="card_cvv" placeholder="CVV" maxlength="4" autocomplete="cc-csc" required>
                                        </div>
                                    </div>
                                    <div class="payment-form-group">
                                        <label>Cardholder name *</label>
                                        <input type="text" name="card_name" placeholder="Enter the name on your card" autocomplete="cc-name" required>
                                    </div>
                                </div>

                                <div id="wallet-tab" class="tab-content">
                                    <div class="wallet-balance">
                                        <p>Available Balance: <strong>{{ format_price(0.00) }}</strong></p>
                                    </div>
                                    <p class="text-muted small">Your order amount will be deducted from your wallet balance.</p>
                                </div>

                                <div id="stc-tab" class="tab-content">
                                    <div class="stc-header">
                                        <p>Pay with STC Pay registered phone number</p>
                                    </div>
                                    <div class="payment-form-group">
                                        <label>Phone Number *</label>
                                        <input type="tel" name="stc_phone" placeholder="05xxxxxxxx" autocomplete="tel" required>
                                    </div>
                                </div>

                                <button type="submit" form="checkout-form" class="btn-place-order" onclick="window.location.href='{{ route('order.complete') }}'; return false;">
                                    Place Order
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="mb-6"></div>
    </main>
@endsection
