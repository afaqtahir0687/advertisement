@extends('frontend.layouts.master')
@section('content')
    <main class="main">
        <div class="container">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Categories</a></li>
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
                                                <option value="100">100</option>
                                                <option value="250">250</option>
                                                <option value="500">500</option>
                                                <option value="1000">1000</option>
                                                <option value="2500">2500</option>
                                                <option value="5000">5000</option>
                                            </select>
                                        </div>
                                        <div class="mt-1 custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customQuantity">
                                            <label class="custom-control-label" for="customQuantity">Custom</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive mt-3">
                                    <table class="table table-order">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Urgency</th>
                                                <th>Price (Unit)</th>
                                                <th>Production</th>
                                                <th>Delivery</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr data-urgency="regular">
                                                <td><input type="radio" name="urgency" value="regular" checked></td>
                                                <td>Regular</td>
                                                <td>SAR <span id="rate_regular">{{ number_format($product->discount_price ?? $product->price, 2) }}</span></td>
                                                <td>{{ $product->production_days ?? 3 }} Days</td>
                                                <td>{{ $product->delivery_days ?? 1 }} Day</td>
                                            </tr>
                                            @if($product->flexible_rate)
                                            <tr data-urgency="flexible">
                                                <td><input type="radio" name="urgency" value="flexible"></td>
                                                <td>Flexible</td>
                                                <td>SAR <span id="rate_flexible">{{ number_format($product->flexible_rate, 2) }}</span></td>
                                                <td>{{ $product->flexible_production_days ?? 5 }} Days</td>
                                                <td>{{ $product->delivery_days ?? 1 }} Day</td>
                                            </tr>
                                            @endif
                                            @if($product->urgent_rate)
                                            <tr data-urgency="urgent">
                                                <td><input type="radio" name="urgency" value="urgent"></td>
                                                <td>Urgent</td>
                                                <td>SAR <span id="rate_urgent">{{ number_format($product->urgent_rate, 2) }}</span></td>
                                                <td>{{ $product->urgent_production_days ?? 1 }} Day</td>
                                                <td>{{ $product->delivery_days ?? 1 }} Day</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="right-box">
                                <p><strong>Subtotal:</strong> <span class="float-right">SAR <span id="subtotal">0.00</span></span></p>
                                <p><strong>Tax (15%):</strong> <span class="float-right">SAR <span id="tax">0.00</span></span></p>
                                <p class="total-price"><strong>Total:</strong> <span class="float-right">SAR <span id="finalPrice">0.00</span></span></p>
                                <button class="btn btn-primary btn-block btn-lg">Add to cart</button>
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
                            </a>
                        </figure>
                        <div class="product-details">
                            <h3 class="product-title"><a href="{{ route('product.show', $related->slug) }}">{{ $related->name }}</a></h3>
                            <div class="price-box">
                                <span class="product-price">SAR {{ $related->price }}</span>
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

                $('#customQuantity').change(function() {
                    if (this.checked) {
                        $('#quantityWrapper').html('<input type="number" id="quantityField" class="form-control" value="100" min="100">');
                    } else {
                        $('#quantityWrapper').html('<select class="form-control" id="quantityField"><option value="100">100</option><option value="250">250</option><option value="500">500</option><option value="1000">1000</option></select>');
                    }
                    calculatePrice();
                });

                // Pricing Calculation
                const baseRate = {{ $product->discount_price ?? $product->price }};
                const flexRate = {{ $product->flexible_rate ?? 0 }};
                const urgentRate = {{ $product->urgent_rate ?? 0 }};

                function calculatePrice() {
                    let qty = parseInt($('#quantityField').val()) || 0;
                    let numDesigns = parseInt($('#num_designs').val()) || 1;
                    let urgency = $('input[name="urgency"]:checked').val();
                    let rate = baseRate;

                    if (urgency === 'flexible' && flexRate > 0) rate = flexRate;
                    if (urgency === 'urgent' && urgentRate > 0) rate = urgentRate;

                    let subtotal = (qty / 100) * rate * numDesigns;
                    let tax = subtotal * 0.15;
                    let total = subtotal + tax;

                    $('#subtotal').text(subtotal.toFixed(2));
                    $('#tax').text(tax.toFixed(2));
                    $('#finalPrice').text(total.toFixed(2));
                }

                $(document).on('input change', '#quantityField, #num_designs, input[name="urgency"]', calculatePrice);
                calculatePrice();
            });
        </script>
    @endpush
@endsection
