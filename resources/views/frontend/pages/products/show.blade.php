@extends('frontend.layouts.master')
@section('content')
    <style>
        .breadcrumb-item, .breadcrumb-item a {
            text-transform: none !important;
        }
        /* Magnific Popup Fade Effect */
        .mfp-fade.mfp-bg {
            opacity: 0;
            -webkit-transition: all 0.15s ease-out; 
            -moz-transition: all 0.15s ease-out; 
            transition: all 0.15s ease-out;
        }
        .mfp-fade.mfp-bg.mfp-ready {
            opacity: 0.8;
        }
        .mfp-fade.mfp-bg.mfp-removing {
            opacity: 0;
        }
        .mfp-fade.mfp-wrap .mfp-content {
            opacity: 0;
            -webkit-transition: all 0.15s ease-out; 
            -moz-transition: all 0.15s ease-out; 
            transition: all 0.15s ease-out;
        }
        .mfp-fade.mfp-wrap.mfp-ready .mfp-content {
            opacity: 1;
        }
        .mfp-fade.mfp-wrap.mfp-removing .mfp-content {
            opacity: 0;
        }
    </style>
    <main class="main">
        <div class="container">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a></li>

                    @if($product->subcategory)
                        @foreach($product->subcategory->getFullPath() as $cat)
                            <li class="breadcrumb-item"><a href="{{ route('category.show', $cat->slug) }}">{{ $cat->name }}</a></li>
                        @endforeach
                    @elseif($product->category)
                        @foreach($product->category->getFullPath() as $cat)
                            <li class="breadcrumb-item"><a href="{{ route('category.show', $cat->slug) }}">{{ $cat->name }}</a></li>
                        @endforeach
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                </ol>
            </nav>

            <div class="product-single-container product-single-default">
                <div class="row">
                    <div class="col-lg-5 col-md-6 product-single-gallery">
                        <div class="product-slider-container">
                            <div class="label-group">
                                @if($product->is_new_arrival)
                                    <div class="product-label label-hot">NEW</div>
                                @endif
                                @if($product->discount_price)
                                    @php
                                        $percentage = round((($product->price - $product->discount_price) / $product->price) * 100);
                                    @endphp
                                    <div class="product-label label-sale">-{{ $percentage }}%</div>
                                @endif
                            </div>

                            <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                @if($product->image)
                                    <div class="product-item">
                                        <img class="product-single-image" src="{{ Storage::url($product->image) }}"
                                            data-zoom-image="{{ Storage::url($product->image) }}" width="468"
                                            height="468" alt="{{ $product->name }}" />
                                    </div>
                                @endif
                                @if($product->images)
                                    @foreach($product->images as $image)
                                        <div class="product-item">
                                            <img class="product-single-image" src="{{ Storage::url($image) }}"
                                                data-zoom-image="{{ Storage::url($image) }}" width="468"
                                                height="468" alt="product galllery" />
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <span class="prod-full-screen">
                                <i class="icon-plus"></i>
                            </span>
                        </div>

                        <div class="prod-thumbnail owl-dots">
                             @if($product->image)
                                <div class="owl-dot">
                                    <img src="{{ Storage::url($product->image) }}" width="110" height="110"
                                        alt="product-thumbnail" />
                                </div>
                            @endif
                            @if($product->images)
                                @foreach($product->images as $image)
                                    <div class="owl-dot">
                                        <img src="{{ Storage::url($image) }}" width="110" height="110"
                                            alt="product-thumbnail" />
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div><!-- End .product-single-gallery -->

                    <div class="col-lg-7 col-md-6 product-single-details">
                        <h1 class="product-title">{{ $product->name }}</h1>

                        <div class="product-sku">
                            <span>SKU: </span>{{ $product->sku ?? 'N/A' }}
                        </div>

                        <div class="product-customization">
                            <h4 class="customization-title">Customize Your Product</h4>

                            <form id="product-customization-form">
                                @if($product->side_1_colors)
                                <div class="form-group">
                                    <label for="side1Color">Side 1 Color</label>
                                    <select class="form-control" id="side1Color" required>
                                        @foreach($product->side_1_colors as $option)
                                            <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif

                                @if($product->sizes)
                                <div class="form-group">
                                    <label for="size">Size</label>
                                    <select class="form-control" id="size" required>
                                        @foreach($product->sizes as $option)
                                            <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif

                                @if($product->sides_options)
                                <div class="form-group">
                                    <label for="sides">Sides</label>
                                    <select class="form-control" id="sides" required>
                                        @foreach($product->sides_options as $option)
                                            <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif

                                @if($product->materials)
                                <div class="form-group">
                                    <label for="material">Selected Material</label>
                                    <select class="form-control" id="material" required>
                                        @foreach($product->materials as $option)
                                            <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif

                                @if($product->lamination_types)
                                <div class="toggle-box" id="laminationBox">
                                    <div class="toggle-header">
                                        <span class="toggle-label">Lamination</span>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="laminationToggle">
                                            <label class="custom-control-label" for="laminationToggle"></label>
                                        </div>
                                    </div>
                                    <div id="laminationOptions" class="d-none mt-2">
                                        <label for="lamination_type">Lamination Type</label>
                                        <select class="form-control" id="lamination_type" name="lamination_type">
                                            @foreach($product->lamination_types as $option)
                                                <option value="{{ $option }}">{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif

                                @if($product->die_cutting_options)
                                <div class="toggle-box">
                                    <div class="toggle-header">
                                        <span class="toggle-label">Die Cutting <span id="dieStatus" class="toggle-status">✓</span></span>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="dieToggle">
                                            <label class="custom-control-label" for="dieToggle"></label>
                                        </div>
                                    </div>
                                    <div id="dieOptions" class="d-none mt-2">
                                        <select class="form-control" id="die_cutting_type">
                                            @foreach($product->die_cutting_options as $option)
                                                <option value="{{ $option }}">{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif

                                <div class="form-group">
                                    <label for="productMemo">Product Memo (Optional)</label>
                                    <input type="text" class="form-control" id="productMemo" placeholder="Enter product memo">
                                </div>

                                <div class="toggle-box clickable-box" id="shareLinkBox">
                                    <div class="toggle-header">
                                        <strong>Share A Link</strong>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="shareLinkToggle">
                                            <label class="custom-control-label" for="shareLinkToggle"></label>
                                        </div>
                                    </div>
                                    <div id="shareLinkOptions" class="d-none">
                                        <input type="url" class="form-control" placeholder="https://example.com/design-link">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- End .product-single-details -->
                </div><!-- End .row -->
            </div><!-- End .product-single-container -->

            <div class="order-box">
                <div class="order-header">
                    <h5>Your Order Details</h5>
                </div>
                <div class="order-content container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="left-box">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="label-title">Number of Designs:</label>
                                        <input type="number" class="form-control" id="num_designs" value="1">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="label-title">Quantity:</label>
                                        <div id="quantityWrapper">
                                            <select class="form-control" id="quantityField">
                                                @if($product->quantities && count($product->quantities) > 0)
                                                    @foreach($product->quantities as $qty)
                                                        <option value="{{ $qty }}">{{ $qty }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        @if($product->allow_custom_quantity && $product->quantities && count($product->quantities) > 0)
                                        <div class="mt-1 custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customQuantity">
                                            <label class="custom-control-label" for="customQuantity">Custom</label>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="table-responsive mt-3">
                                    <table class="table table-order">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Urgency</th>
                                                <th>Price</th>
                                                <th>Production</th>
                                                <th>Delivery</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr data-urgency="regular">
                                                <td><input type="radio" name="urgency" value="regular" checked></td>
                                                <td>Regular</td>
                                                <td id="price-regular">{{ format_price($product->discount_price ?? $product->price) }}</td>
                                                <td id="days-production-regular">{{ $product->production_days ?? 3 }} Days</td>
                                                <td id="days-delivery-regular">{{ $product->delivery_days ?? 1 }} Day</td>
                                            </tr>
                                            @if($product->flexible_rate)
                                            <tr data-urgency="flexible">
                                                <td><input type="radio" name="urgency" value="flexible"></td>
                                                <td>Flexible</td>
                                                <td id="price-flexible">{{ format_price($product->flexible_rate) }}</td>
                                                <td id="days-production-flexible">{{ $product->flexible_production_days ?? 5 }} Days</td>
                                                <td id="days-delivery-flexible">{{ $product->delivery_days ?? 1 }} Day</td>
                                            </tr>
                                            @endif
                                            @if($product->urgent_rate)
                                            <tr data-urgency="urgent">
                                                <td><input type="radio" name="urgency" value="urgent"></td>
                                                <td>Urgent</td>
                                                <td id="price-urgent">{{ format_price($product->urgent_rate) }}</td>
                                                <td id="days-production-urgent">{{ $product->urgent_production_days ?? 1 }} Day</td>
                                                <td id="days-delivery-urgent">{{ $product->delivery_days ?? 1 }} Day</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="right-box">
                                <p><strong>Subtotal:</strong> <span class="float-right"><span id="subtotal_display">{{ format_price(0.00) }}</span></span></p>
                                <p><strong>Tax (15%):</strong> <span class="float-right"><span id="tax_display">{{ format_price(0.00) }}</span></span></p>
                                <p class="total-price"><strong>Total:</strong> <span class="float-right"><span id="finalPrice_display">{{ format_price(0.00) }}</span></span></p>
                                <button id="addToCartBtn" class="btn btn-primary btn-block btn-lg">Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-single-tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab">Description</a>
                    </li>
                    @if($product->size_guide)
                    <li class="nav-item">
                        <a class="nav-link" id="product-tab-size" data-toggle="tab" href="#product-size-content" role="tab">Size Guide</a>
                    </li>
                    @endif
                    @if($product->additional_info)
                    <li class="nav-item">
                        <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content" role="tab">Additional Information</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" id="product-tab-details" data-toggle="tab" href="#product-details-content" role="tab">All Information</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel">
                        <div class="product-desc-content">{!! $product->description !!}</div>
                    </div>
                    @if($product->size_guide)
                    <div class="tab-pane fade" id="product-size-content" role="tabpanel">
                        <div class="product-size-content">{!! $product->size_guide !!}</div>
                    </div>
                    @endif
                    @if($product->additional_info)
                    <div class="tab-pane fade" id="product-tags-content" role="tabpanel">
                        <div class="product-tags-content">{!! $product->additional_info !!}</div>
                    </div>
                    @endif
                    <div class="tab-pane fade" id="product-details-content" role="tabpanel">
                        <div class="product-details-list pt-3 pl-2">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <h5 class="text-dark font-weight-bold mb-1">Category</h5>
                                    <p class="text-muted mb-0">{{ $product->category->name ?? 'N/A' }}</p>
                                </div>
                                
                                @if($product->subcategory)
                                <div class="col-md-4 mb-3">
                                    <h5 class="text-dark font-weight-bold mb-1">Subcategory</h5>
                                    <p class="text-muted mb-0">{{ $product->subcategory->name }}</p>
                                </div>
                                @endif

                                <div class="col-md-4 mb-3">
                                    <h5 class="text-dark font-weight-bold mb-1">SKU</h5>
                                    <p class="text-muted mb-0">{{ $product->sku ?? 'N/A' }}</p>
                                </div>

                                @if($product->materials && count($product->materials) > 0)
                                <div class="col-md-4 mb-3">
                                    <h5 class="text-dark font-weight-bold mb-1">Available Materials</h5>
                                    <p class="text-muted mb-0">{{ implode(', ', $product->materials) }}</p>
                                </div>
                                @endif

                                @if($product->sizes && count($product->sizes) > 0)
                                <div class="col-md-4 mb-3">
                                    <h5 class="text-dark font-weight-bold mb-1">Available Sizes</h5>
                                    <p class="text-muted mb-0">{{ implode(', ', $product->sizes) }}</p>
                                </div>
                                @endif

                                @if($product->side_1_colors && count($product->side_1_colors) > 0)
                                <div class="col-md-4 mb-3">
                                    <h5 class="text-dark font-weight-bold mb-1">Side 1 Colors</h5>
                                    <p class="text-muted mb-0">{{ implode(', ', $product->side_1_colors) }}</p>
                                </div>
                                @endif

                                @if($product->sides_options && count($product->sides_options) > 0)
                                <div class="col-md-4 mb-3">
                                    <h5 class="text-dark font-weight-bold mb-1">Side Options</h5>
                                    <p class="text-muted mb-0">{{ implode(', ', $product->sides_options) }}</p>
                                </div>
                                @endif

                                @if($product->lamination_types && count($product->lamination_types) > 0)
                                <div class="col-md-4 mb-3">
                                    <h5 class="text-dark font-weight-bold mb-1">Lamination Types</h5>
                                    <p class="text-muted mb-0">{{ implode(', ', $product->lamination_types) }}</p>
                                </div>
                                @endif

                                @if($product->die_cutting_options && count($product->die_cutting_options) > 0)
                                <div class="col-md-4 mb-3">
                                    <h5 class="text-dark font-weight-bold mb-1">Die Cutting Options</h5>
                                    <p class="text-muted mb-0">{{ implode(', ', $product->die_cutting_options) }}</p>
                                </div>
                                @endif

                                <div class="col-md-4 mb-3">
                                    <h5 class="text-dark font-weight-bold mb-1">Production Days</h5>
                                    <p class="text-muted mb-0">{{ $product->production_days ?? 'N/A' }} Days</p>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <h5 class="text-dark font-weight-bold mb-1">Delivery Days</h5>
                                    <p class="text-muted mb-0">{{ $product->delivery_days ?? 'N/A' }} Days</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="products-section pt-0">
                <h2 class="section-title">Related Products</h2>
                <div class="products-slider owl-carousel owl-theme dots-top dots-small">
                    @foreach($relatedProducts as $related)
                    <div class="product-default">
                        <figure>
                            <a href="{{ route('product.show', $related->slug) }}">
                                <img src="{{ Storage::url($related->image) }}" width="280" height="280" alt="{{ $related->name }}">
                                @if($related->images && count($related->images) > 0)
                                    <img src="{{ Storage::url($related->images[0]) }}" width="280" height="280" alt="{{ $related->name }}">
                                @endif
                            </a>
                        </figure>
                        <div class="product-details">
                            <h3 class="product-title"><a href="{{ route('product.show', $related->slug) }}">{{ $related->name }}</a></h3>
                            <div class="price-box">
                                <span class="product-price">{{ format_price($related->price) }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>

    @push('scripts')
        <script>
            $(document).ready(function() {
                // UI Toggles
                $('#laminationToggle').change(function() { $('#laminationOptions').toggleClass('d-none', !this.checked); });
                $('#dieToggle').change(function() { $('#dieOptions').toggleClass('d-none', !this.checked); });
                $('#shareLinkToggle').change(function() { $('#shareLinkOptions').toggleClass('d-none', !this.checked); });

                var defaultQuantities = {!! json_encode($product->quantities ?? []) !!};

                $('#customQuantity').change(function() {
                    if (this.checked) {
                        $('#quantityWrapper').html('<input type="number" id="quantityField" class="form-control" value="100" min="1" max="1000">');
                        $('#quantityWrapper').after('<small id="qtyError" class="text-danger" style="display:none;">Maximum quantity is 1000</small>');
                    } else {
                        var options = '';
                         if (defaultQuantities.length > 0) {
                            $.each(defaultQuantities, function(index, value) {
                                options += '<option value="'+value+'">'+value+'</option>';
                            });
                        }
                        $('#quantityWrapper').html('<select class="form-control" id="quantityField">' + options + '</select>');
                        $('#qtyError').remove();
                        $('#addToCartBtn').prop('disabled', false);
                    }
                    calculatePrice();
                });

                $(document).on('input change', '#quantityField[type="number"]', function() {
                    let val = parseInt($(this).val());
                    if (val > 1000) {
                        $('#qtyError').show();
                        $('#addToCartBtn').prop('disabled', true);
                    } else if(val < 1) {
                        // Optional: Handle min value
                         $('#addToCartBtn').prop('disabled', false); // Or invalid
                         $('#qtyError').hide();
                    } else {
                        $('#qtyError').hide();
                        $('#addToCartBtn').prop('disabled', false);
                    }
                    calculatePrice();
                });

                // Pricing Calculation
                @php
                    $currency = current_currency();
                    $rates = ['USD' => 1, 'SAR' => 3.75, 'PKR' => 280];
                    $symbols = ['USD' => '$', 'SAR' => 'SAR ', 'PKR' => 'Rs '];
                    $currentRate = $rates[$currency] ?? 1;
                    $currentSymbol = $symbols[$currency] ?? '$';
                @endphp
                const currentRate = {{ $currentRate }};
                const currentSymbol = "{{ $currentSymbol }}";
                const baseRate = {{ $product->discount_price ?? $product->price }};
                const flexRate = {{ $product->flexible_rate ?? 0 }};
                const urgentRate = {{ $product->urgent_rate ?? 0 }};

                // Base Days from Backend
                const baseProdDays = {
                    regular: {{ $product->production_days ?? 3 }},
                    flexible: {{ $product->flexible_production_days ?? 5 }},
                    urgent: {{ $product->urgent_production_days ?? 1 }}
                };
                const baseDeliveryDays = {{ $product->delivery_days ?? 1 }};

                function formatCurrency(amount) {
                    return currentSymbol + (amount * currentRate).toFixed(2);
                }

                function calculatePrice() {
                    let qty = parseInt($('#quantityField').val()) || 0;
                    let numDesigns = parseInt($('#num_designs').val()) || 1;
                    let urgency = $('input[name="urgency"]:checked').val();
                    
                    // Calculate individual urgency prices (Unit Price * Designs)
                    // Unit Price = (qty/100) * rate_per_100
                    
                    let regularPrice = (qty / 100) * baseRate * numDesigns;
                    let flexiblePrice = (qty / 100) * flexRate * numDesigns;
                    let urgentPrice = (qty / 100) * urgentRate * numDesigns;
                    
                    // Logic to increase days based on quantity
                    // Production: Increase by 1 day for every 1000 units.
                    // Delivery: Increase by 1 day for every 2000 units.
                    
                    let extraProdDays = 0;
                    let extraDeliveryDays = 0;

                    if (qty >= 1000) {
                        extraProdDays = Math.floor(qty / 1000);
                        extraDeliveryDays = Math.floor(qty / 2000); 
                    }
                    
                    let regProd = baseProdDays.regular + extraProdDays;
                    let flexProd = baseProdDays.flexible + extraProdDays;
                    let urgProd = baseProdDays.urgent + extraProdDays; // Urgent might stay same? Assuming increases too for large bulk
                    
                    let delDays = baseDeliveryDays + extraDeliveryDays;

                    // Update Table Cells
                    $('#price-regular').text(formatCurrency(regularPrice));
                    $('#days-production-regular').text(regProd + ' Days');
                    $('#days-delivery-regular').text(delDays + ' Day' + (delDays > 1 ? 's' : ''));

                    if (flexRate > 0) {
                         $('#price-flexible').text(formatCurrency(flexiblePrice));
                         $('#days-production-flexible').text(flexProd + ' Days');
                         $('#days-delivery-flexible').text(delDays + ' Day' + (delDays > 1 ? 's' : ''));
                    }
                    if (urgentRate > 0) {
                         $('#price-urgent').text(formatCurrency(urgentPrice));
                         $('#days-production-urgent').text(urgProd + ' Days'); // Update urgent production too?
                         $('#days-delivery-urgent').text(delDays + ' Day' + (delDays > 1 ? 's' : ''));
                    }

                    // Determine Selected Subtotal
                    let subtotal = 0;
                    if (urgency === 'regular') subtotal = regularPrice;
                    else if (urgency === 'flexible') subtotal = flexiblePrice;
                    else if (urgency === 'urgent') subtotal = urgentPrice;

                    let tax = subtotal * 0.15;
                    let total = subtotal + tax;

                    $('#subtotal_display').text(formatCurrency(subtotal));
                    $('#tax_display').text(formatCurrency(tax));
                    $('#finalPrice_display').text(formatCurrency(total));
                }

                $(document).on('click', '#addToCartBtn', function(e) {
                    e.preventDefault();
                    let printQty = $('#quantityField').val(); // 100, 500, etc.
                    let numDesigns = $('#num_designs').val(); // 1, 2, etc.
                    let urgency = $('input[name="urgency"]:checked').val();

                    let url = "{{ route('cart.add', ':id') }}";
                    url = url.replace(':id', {{ $product->id }});
                    
                    // Send print_quantity, quantity (num_designs), and urgency
                    window.location.href = url + "?print_quantity=" + printQty + "&quantity=" + numDesigns + "&urgency=" + urgency;
                });

                $(document).on('input change', '#quantityField, #num_designs, input[name="urgency"]', calculatePrice);
                // Also trigger calculation on load to set initial values correctly
                calculatePrice();
            });
        </script>
    @endpush
@endsection
