<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left d-none d-sm-block">
                <p class="top-message text-uppercase">
    {{ __('messages.free_returns') }}
</p>

            </div>
            <div class="header-right header-dropdowns ml-0 ml-sm-auto w-sm-100">
                <div class="header-dropdown dropdown-expanded d-none d-lg-block">
               
                    <a href="#">{{ __('messages.links') }}</a>

                    <div class="header-menu">
                        <ul>
                            <li><a href="{{route('dashboard')}}">{{ __('messages.my_account') }}</a></li>
                            <li><a href="{{ route('about.index') }}">{{ __('messages.about_us') }}</a></li>
                            <li><a href="{{ route('blogs.index') }}">{{ __('messages.blog') }}</a></li>
                            <li><a href="{{route('wishlist.index')}}">{{ __('messages.my_wishlist') }}</a></li>
                            <li><a href="{{ route('cart.index') }}">{{ __('messages.cart') }}</a></li>
                            <li><a href="{{ route('track.order') }}">{{ __('messages.track_order') }}</a></li>
                            <li><a href="{{ route('register') }}">{{ __('messages.register') }}</a></li>
                        </ul>
                    </div>
                </div>
                <span class="separator"></span>
              <div class="header-dropdown">
    <a href="#">
        @if(app()->getLocale() == 'ar')
            <i class="flag-sa flag"></i> العربية
        @elseif(app()->getLocale() == 'ur')
            <i class="flag-pk flag"></i> اردو
        @else
            <i class="flag-us flag"></i> ENG
        @endif
    </a>

    <div class="header-menu">
        <ul>
            <li>
                <a href="{{ route('lang.switch', 'en') }}">
                    <i class="flag-us flag mr-2"></i> English
                </a>
            </li>

            <li>
                <a href="{{ route('lang.switch', 'ar') }}">
                    <i class="flag-sa flag mr-2"></i> العربية
                </a>
            </li>

            <li>
                <a href="{{ route('lang.switch', 'ur') }}">
                    <i class="flag-pk flag mr-2"></i> اردو
                </a>
            </li>
        </ul>
    </div>
</div>


                <div class="header-dropdown mr-auto mr-sm-3 mr-md-0">
                    <a href="#">USD</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">SAR</a></li>
                            <li><a href="#">USD</a></li>
                            <li><a href="#">PKR</a></li>
                        </ul>
                    </div>
                </div>

                <span class="separator"></span>

                <div class="social-icons">
                    <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"></a>
                    <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"></a>
                    <a href="#" class="social-icon social-instagram icon-instagram" target="_blank"></a>
                </div>
            </div>
        </div>
    </div>

    <div class="header-middle sticky-header" data-sticky-options="{'mobile': true}">
        <div class="container">
            <div class="header-left col-lg-2 w-auto pl-0">
                <button class="mobile-menu-toggler text-primary mr-2" type="button">
                    <i class="fas fa-bars"></i>
                </button>
                <a href="{{route('home')}}" class="logo">
                    <img src="{{ asset('assets/images/logo.png') }}" width="111" height="44" alt="Porto Logo">
                </a>
            </div>

            <div class="header-right w-lg-max">
                <div
                    class="header-icon header-search header-search-inline header-search-category w-lg-max text-right mt-0">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper">
                            <input type="search" class="form-control" name="q" id="q" placeholder="{{ __('messages.search') }}" required>
                            <div class="select-custom">
                                <select id="cat" name="cat">
                                    <option value="">{{ __('messages.all_categories') }}</option>
                                    <option value="4">{{ __('messages.most_popular') }}</option>
                                    <option value="12">Markete Materials</option>
                                    <option value="13">Formate Printing</option>
                                    <option value="66">Packing & Box</option>
                                    <option value="67">Promo Products</option>
                                    <option value="5">Apparel & Wearables</option>
                                    <option value="21">Event Brand</option>
                                </select>
                            </div>
                            <button class="btn icon-magnifier p-0" title="search" type="submit"></button>
                        </div>
                    </form>
                </div>

                <div class="header-contact d-none d-lg-flex pl-4 pr-4">
                    <img alt="phone" src="{{ asset('assets/images/phone.png') }}" width="30" height="30" class="pb-1">
                    <h6><span>{{ __('messages.call_us_now') }}</span><a href="tel:#" class="text-dark font1">+966557834154</a></h6>
                </div>

                <a href="#" class="header-icon" title="login"><i class="icon-user-2"></i></a>

                <a href="#" class="header-icon" title="wishlist"><i class="icon-wishlist-2"></i></a>

                <div class="dropdown cart-dropdown">
                    <a href="#" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="minicart-icon"></i>
                        <span class="cart-count badge-circle">3</span>
                    </a>

                    <div class="cart-overlay"></div>

                    <div class="dropdown-menu mobile-cart">
                        <a href="#" title="Close (Esc)" class="btn-close">×</a>

                        <div class="dropdownmenu-wrapper custom-scrollbar">
                            <div class="dropdown-cart-header">{{ __('messages.shopping_cart') }}</div>
                            <div class="dropdown-cart-products">
                                <div class="product">
                                    <div class="product-details">
                                        <h4 class="product-title">
                                            <a href="#">Business Card Front & Back</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty">1</span> × $99.00
                                        </span>
                                    </div>

                                    <figure class="product-image-container">
                                        <a href="#" class="product-image">
                                            <img src="{{ asset('assets/images/products/product-1.jpg') }}" alt="product"
                                                width="80" height="80">
                                        </a>

                                        <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                    </figure>
                                </div>

                                <div class="product">
                                    <div class="product-details">
                                        <h4 class="product-title">
                                            <a href="#">Professional Roll up Banner Design</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty">1</span> × $35.00
                                        </span>
                                    </div>

                                    <figure class="product-image-container">
                                        <a href="#" class="product-image">
                                            <img src="{{ asset('assets/images/products/product-2.jpg') }}" alt="product"
                                                width="80" height="80">
                                        </a>

                                        <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                    </figure>
                                </div>

                                <div class="product">
                                    <div class="product-details">
                                        <h4 class="product-title">
                                            <a href="#">Postcard Printing</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty">1</span> × $35.00
                                        </span>
                                    </div>

                                    <figure class="product-image-container">
                                        <a href="#" class="product-image">
                                            <img src="{{ asset('assets/images/products/product-3.jpg') }}" alt="product"
                                                width="80" height="80">
                                        </a>
                                        <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                    </figure>
                                </div>
                            </div>

                            <div class="dropdown-cart-total">
                                <span>{{ __('messages.subtotal') }}:</span>

                                <span class="cart-total-price float-right">$134.00</span>
                            </div>

                            <div class="dropdown-cart-action">
                                <a href="#" class="btn btn-gray btn-block view-cart">{{ __('messages.view_cart') }}</a>
                                <a href="#" class="btn btn-dark btn-block">{{ __('messages.checkout') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom sticky-header d-none d-lg-block" data-sticky-options="{'mobile': false}">
        <div class="container">
            <nav class="main-nav w-100">
                <ul class="menu">
                    <li class="active">
                        <a href="{{ route('category.index') }}">{{ __('messages.categories') }}</a>
                        <h3>{{ __('messages.categories') }}</h3>

                        <div class="megamenu megamenu-fixed-width megamenu-3cols">
                            <div class="row">
                                <div class="col-lg-4">
                                    <a href="#" class="nolink">Categories</a>
                                    <h3>{{ __('messages.categories') }}</h3>

                                    <ul class="submenu">
                                        <li><a href="{{ route('category.index') }}">Categories</a></li>
                                    </ul>
                                </div>

                                <div class="col-lg-4 p-0">
                                    <div class="menu-banner">
                                        <figure>
                                            <img src="{{ asset('assets/images/menu-banner.jpg') }}" width="192"
                                                height="313" alt="Menu banner">
                                        </figure>
                                        <div class="banner-content">
                                            <h4>
                                                <span class="">UP TO</span><br />
                                                <b class="">50%</b>
                                                <i>OFF</i>
                                            </h4>
                                            <a href="{{ route('category.index') }}" class="btn btn-sm btn-dark">SHOP
                                                NOW</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('category.index') }}">{{ __('messages.most_popular') }}</a>
                        <div class="megamenu megamenu-fixed-width megamenu-3cols">
                            <div class="row">
                                <div class="col-lg-4">
                                    <a href="#" class="nolink">{{ __('messages.business_cards') }}</a>
                                    <ul class="submenu">
                                        <li><a href="{{ route('category.index') }}">{{ __('messages.business_cards') }}</a></li>
                                        <li><a href="#">{{ __('messages.standard_cards') }}</a></li>
                                        <li><a href="#">{{ __('messages.premium_cards') }}</a></li>
                                        <li><a href="#">{{ __('messages.special_finishes') }}</a></li>
                                        <li><a href="#">{{ __('messages.nfc_cards') }}</a></li>
                                        <li><a href="#">{{ __('messages.special_offers') }}</a></li>
                                        <li><a href="#">{{ __('messages.smooth_finish') }}</a></li>
                                        <li><a href="#">{{ __('messages.textured_finish') }}</a></li>
                                        <li><a href="#">{{ __('messages.specialty_textured') }}</a></li>
                                        <li><a href="#">{{ __('messages.holders_more') }}</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4">
                                    <a href="#" class="nolink">{{ __('messages.letterheads') }}</a>
                                    <ul class="submenu">
                                        <li><a href="#">{{ __('messages.standard_letterhead') }}</a></li>
                                        <li><a href="#">{{ __('messages.textured_finish_lh') }}</a></li>
                                        <li><a href="#">{{ __('messages.smooth_finish_lh') }}</a></li>
                                        <li><a href="#">{{ __('messages.specialty_textured_lh') }}</a></li>
                                        <li><a href="#">{{ __('messages.special_offers_lh') }}</a></li>
                                        <li><a href="#">{{ __('messages.recycled_lh') }}</a></li>
                                        <a href="#" class="nolink">{{ __('messages.nfc_cards') }}</a>
                                        <a href="#" class="nolink">{{ __('messages.folders') }}</a>
                                        <li><a href="#">{{ __('messages.standard') }}</a></li>
                                        <li><a href="#">{{ __('messages.premium') }}</a></li>
                                        <li><a href="#">{{ __('messages.special_offers') }}</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 p-0">
                                    <div class="menu-banner">
                                        <figure>
                                            <img src="{{ asset('assets/images/menu-banner.jpg') }}" width="192"
                                                height="313" alt="Menu banner">
                                        </figure>
                                        <div class="banner-content">
                                            <h4>
                                                <span class="">UP TO</span><br />
                                                <b class="">50%</b>
                                                <i>OFF</i>
                                            </h4>
                                            <a href="{{ route('category.index') }}" class="btn btn-sm btn-dark">SHOP
                                                NOW</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <a href="{{ route('category.index') }}">{{ __('messages.market_materials') }}</a>
                        <div class="megamenu megamenu-fixed-width megamenu-3cols">
                            <div class="row">
                                <div class="col-lg-4">
                                    <a href="#" class="nolink">{{ __('messages.flyers') }}</a>
                                    <ul class="submenu">
                                        <li><a href="#">{{ __('messages.standard') }}-</a></li>
                                        <li><a href="#">{{ __('messages.smooth_finish') }}-</a></li>
                                        <li><a href="#">{{ __('messages.special_finishes') }}-</a></li>
                                        <li><a href="#">{{ __('messages.textured_finish') }}-</a></li>
                                        <li><a href="#">{{ __('messages.specialty_textured') }}-</a></li>
                                        <li><a href="#">{{ __('messages.special_offers') }}-</a></li>
                                        <li><a href="#">{{ __('messages.recycled_lh') }}.</a></li>
                                        <a href="#" class="nolink">{{ __('messages.brochures') }}</a>
                                        <li><a href="#">{{ __('messages.standard') }}</a></li>
                                        <li><a href="#">{{ __('messages.premium') }}</a></li>
                                        <a href="#" class="nolink">{{ __('messages.stickers_labels') }}</a>
                                        <li><a href="#">{{ __('messages.vinyl_labels') }}</a></li>
                                        <li><a href="#">{{ __('messages.paper_labels') }}</a></li>
                                        <li><a href="#">{{ __('messages.roll_labels') }}</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4">
                                    <a href="#" class="nolink">{{ __('messages.letterheads') }}</a>
                                    <ul class="submenu">
                                        <li><a href="#">{{ __('messages.standard_letterhead') }}</a></li>
                                        <li><a href="#">{{ __('messages.textured_finish_lh') }}</a></li>
                                        <li><a href="#">{{ __('messages.smooth_finish_lh') }}</a></li>
                                        <li><a href="#">{{ __('messages.specialty_textured_lh') }}</a></li>
                                        <li><a href="#">{{ __('messages.special_offers_lh') }}</a></li>
                                        <li><a href="#">{{ __('messages.recycled_lh') }}</a></li>
                                        <a href="#" class="nolink">{{ __('messages.nfc_cards') }}</a>
                                        <a href="#" class="nolink">{{ __('messages.folders') }}</a>
                                        <li><a href="#">{{ __('messages.standard') }}</a></li>
                                        <li><a href="#">{{ __('messages.premium') }}</a></li>
                                        <li><a href="#">{{ __('messages.special_offers') }}</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 p-0">
                                    <div class="menu-banner">
                                        <figure>
                                            <img src="{{ asset('assets/images/menu-banner.jpg') }}" width="192"
                                                height="313" alt="Menu banner">
                                        </figure>
                                        <div class="banner-content">
                                            <h4>
                                                <span class="">UP TO</span><br />
                                                <b class="">50%</b>
                                                <i>OFF</i>
                                            </h4>
                                            <a href="{{ route('category.index') }}" class="btn btn-sm btn-dark">SHOP
                                                NOW</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <a href="{{ route('category.index') }}">{{ __('messages.format_printing') }}</a>
                        <div class="megamenu megamenu-fixed-width megamenu-3cols">
                            <div class="row">
                                <div class="col-lg-4">
                                    <a href="#" class="nolink">{{ __('messages.posters_banners_menu') }}</a>
                                    <ul class="submenu">
                                        <li><a href="#">{{ __('messages.posters') }}</a></li>
                                        <li><a href="#">{{ __('messages.vinyl_graphics') }}</a></li>
                                        <li><a href="#">{{ __('messages.vision_film') }}</a></li>
                                        <li><a href="#">{{ __('messages.flex_banners') }}</a></li>
                                        <li><a href="#">{{ __('messages.backlit_prints') }}</a></li>
                                        <li><a href="#">{{ __('messages.whiteboard_film') }}</a></li>
                                        <a href="#" class="nolink">{{ __('messages.wallpapers') }}</a>
                                        <a href="#" class="nolink">{{ __('messages.canvas_prints') }}</a>
                                        <li><a href="#">{{ __('messages.canvas_prints') }}</a></li>
                                        <li><a href="#">{{ __('messages.canvas_frame') }}</a></li>
                                        <a href="#" class="nolink">{{ __('messages.rollups') }}</a>
                                        <li><a href="#">{{ __('messages.standard') }}</a></li>
                                        <li><a href="#">{{ __('messages.premium') }}</a></li>
                                        <li><a href="#">{{ __('messages.x_stand_banner') }}</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4">
                                    <a href="#" class="nolink">{{ __('messages.popups') }}</a>
                                    <ul class="submenu">
                                        <li><a href="#">{{ __('messages.popup_straight') }}</a></li>
                                        <li><a href="#">{{ __('messages.popup_curved') }}</a></li>
                                        <li><a href="#">{{ __('messages.promo_table') }}</a></li>
                                        <a href="#" class="nolink">{{ __('messages.displays') }}</a>
                                        <li><a href="#">{{ __('messages.acrylic_holders') }}</a></li>
                                        <li><a href="#">{{ __('messages.acrylic_plates') }}</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 p-0">
                                    <div class="menu-banner">
                                        <figure>
                                            <img src="{{ asset('assets/images/menu-banner.jpg') }}" width="192"
                                                height="313" alt="Menu banner">
                                        </figure>
                                        <div class="banner-content">
                                            <h4>
                                                <span class="">UP TO</span><br />
                                                <b class="">50%</b>
                                                <i>OFF</i>
                                            </h4>
                                            <a href="{{ route('category.index') }}" class="btn btn-sm btn-dark">SHOP
                                                NOW</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <a href="{{ route('category.index') }}">{{ __('messages.packing_box') }}</a>
                        <div class="megamenu megamenu-fixed-width megamenu-3cols">
                            <div class="row">
                                <div class="col-lg-4">
                                    <ul class="submenu">
                                        <li><a href="#">{{ __('messages.fancy_boxes') }}</a></li>
                                        <li><a href="#">{{ __('messages.corrugated_boxes') }}</a></li>
                                        <li><a href="#">{{ __('messages.gift_box') }}</a></li>
                                        <li><a href="#">{{ __('messages.fancy_gift_sets') }}</a></li>
                                        <li><a href="#">{{ __('messages.cube_boxes') }}</a></li>
                                        <li><a href="#">{{ __('messages.soft_boxes') }}</a></li>
                                    </ul>
                                </div>
                                <!-- <div class="col-lg-4 p-0"></div> -->
                                <div class="col-lg-4 p-0">
                                    <div class="menu-banner">
                                        <figure>
                                            <img src="{{ asset('assets/images/menu-banner.jpg') }}" width="192"
                                                height="313" alt="Menu banner">
                                        </figure>
                                        <div class="banner-content">
                                            <h4>
                                                <span class="">UP TO</span><br />
                                                <b class="">50%</b>
                                                <i>OFF</i>
                                            </h4>
                                            <a href="{{ route('category.index') }}" class="btn btn-sm btn-dark">SHOP
                                                NOW</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <a href="#">{{ __('messages.promo_products') }}</a>
                        <div class="megamenu megamenu-fixed-width megamenu-3cols">
                            <div class="row">
                                <div class="col-lg-4">
                                    <a href="#" class="nolink">{{ __('messages.mouse_pads') }}</a>
                                    <ul class="submenu">
                                        <li><a href="#">{{ __('messages.sublimation') }}</a>
                                        </li>
                                        <li><a href="">{{ __('messages.leather') }}</a>
                                        </li>
                                        <li><a href="">{{ __('messages.wireless') }}</a>
                                        </li>
                                        <a href="#" class="nolink">{{ __('messages.mugs') }}</a>
                                        <li><a href="category-list.html">{{ __('messages.water_bottles') }}</a></li>
                                        <li><a href="category-infinite-scroll.html">{{ __('messages.travel_mugs') }}</a>
                                        </li>
                                        <li><a href="#">{{ __('messages.mugs') }}</a></li>
                                        <li><a href="#">{{ __('messages.glassware') }}</a></li>
                                        <a href="#" class="nolink">{{ __('messages.pillows') }}</a>
                                        <a href="#" class="nolink">{{ __('messages.diaries') }}</a>
                                        <a href="#" class="nolink">{{ __('messages.pens') }}</a>
                                        <a href="#" class="nolink">{{ __('messages.usb_drives') }}</a>
                                        <a href="#" class="nolink">{{ __('messages.powerbanks') }}</a>
                                        <a href="#" class="nolink">{{ __('messages.stress_balls') }}</a>
                                    </ul>
                                </div>
                                <div class="col-lg-4">
                                    <ul class="submenu">
                                        <li><a href="category-list.html">{{ __('messages.balloons') }}</a></li>
                                        <li><a href="category-infinite-scroll.html">{{ __('messages.ribbons') }}</a>
                                        </li>
                                        <li><a href="#">{{ __('messages.thermal_mugs') }}</a></li>
                                        <li><a href="#">{{ __('messages.tea_coaster') }}</a></li>
                                        <li><a href="#">{{ __('messages.mobile_accessories') }}</a></li>
                                        <li><a href="#">{{ __('messages.card_cases') }}</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 p-0">
                                    <div class="menu-banner">
                                        <figure>
                                            <img src="{{ asset('assets/images/menu-banner.jpg') }}" width="192"
                                                height="313" alt="Menu banner">
                                        </figure>
                                        <div class="banner-content">
                                            <h4>
                                                <span class="">UP TO</span><br />
                                                <b class="">50%</b>
                                                <i>OFF</i>
                                            </h4>
                                            <a href="{{ route('category.index') }}" class="btn btn-sm btn-dark">SHOP
                                                NOW</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <a href="#">{{ __('messages.apparel_wearables') }}</a>
                        <div class="megamenu megamenu-fixed-width megamenu-3cols">
                            <div class="row">
                                <div class="col-lg-4">
                                    <a href="#" class="nolink">{{ __('messages.safety_products') }}</a>
                                    <a href="#" class="nolink">{{ __('messages.shirts') }}</a>
                                    <a href="#" class="nolink">{{ __('messages.caps') }}</a>
                                    <a href="#" class="nolink">{{ __('messages.badges') }}</a>
                                    <a href="#" class="nolink">{{ __('messages.lanyard') }}</a>
                                </div>
                                <div class="col-lg-4 p-0">
                                    <div class="menu-banner">
                                        <figure>
                                            <img src="{{ asset('assets/images/menu-banner.jpg') }}" width="192"
                                                height="313" alt="Menu banner">
                                        </figure>
                                        <div class="banner-content">
                                            <h4>
                                                <span class="">UP TO</span><br />
                                                <b class="">50%</b>
                                                <i>OFF</i>
                                            </h4>
                                            <a href="{{ route('category.index') }}" class="btn btn-sm btn-dark">SHOP
                                                NOW</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <a href="#">{{ __('messages.event_brand') }}</a>
                        <div class="megamenu megamenu-fixed-width megamenu-3cols">
                            <div class="row">
                                <div class="col-lg-4">
                                    <a href="#" class="nolink">{{ __('messages.photobooks') }}</a>
                                    <a href="#" class="nolink">{{ __('messages.trophy_awards') }}</a>
                                    <a href="#" class="nolink">{{ __('messages.promo_bags') }}</a>
                                    <a href="#" class="nolink">{{ __('messages.exhibition_events') }}</a>
                                </div>
                                <div class="col-lg-4 p-0">
                                    <div class="menu-banner">
                                        <figure>
                                            <img src="{{ asset('assets/images/menu-banner.jpg') }}" width="192"
                                                height="313" alt="Menu banner">
                                        </figure>
                                        <div class="banner-content">
                                            <h4>
                                                <span class="">UP TO</span><br />
                                                <b class="">50%</b>
                                                <i>OFF</i>
                                            </h4>
                                            <a href="{{ route('category.index') }}" class="btn btn-sm btn-dark">SHOP
                                                NOW</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
