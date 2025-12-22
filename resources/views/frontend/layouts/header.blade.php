<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left d-none d-sm-block">
                <p class="top-message text-uppercase">FREE Returns. Standard Shipping Orders $99+</p>
            </div>
            <div class="header-right header-dropdowns ml-0 ml-sm-auto w-sm-100">
                <div class="header-dropdown dropdown-expanded d-none d-lg-block">
                    <a href="#">Links</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="{{route('dashboard')}}">My Account</a></li>
                            <li><a href="{{ route('about.index') }}">About Us</a></li>
                            <li><a href="{{ route('blogs.index') }}">Blog</a></li>
                            <li><a href="{{route('wishlist.index')}}">My Wishlist</a></li>
                            <li><a href="{{ route('cart.index') }}">Cart</a></li>
                            <li><a href="{{ route('track.order') }}">Track Order</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        </ul>
                    </div>
                </div>
                <span class="separator"></span>
                <div class="header-dropdown">
                    <a href="#"><i class="flag-us flag"></i>ENG</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#"><i class="flag-us flag mr-2"></i>English</a>
                            </li>
                            <li><a href="#"><i class="flag-sa flag mr-2"></i>العربية</a></li>
                            <li><a href="#"><i class="flag-pk flag mr-2"></i>اردو</a></li>
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
                            <input type="search" class="form-control" name="q" id="q" placeholder="Search..." required>
                            <div class="select-custom">
                                <select id="cat" name="cat">
                                    <option value="">All Categories</option>
                                    <option value="4">Most Popular</option>
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
                    <h6><span>Call us now</span><a href="tel:#" class="text-dark font1">+966557834154</a></h6>
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
                            <div class="dropdown-cart-header">Shopping Cart</div>
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
                                <span>SUBTOTAL:</span>

                                <span class="cart-total-price float-right">$134.00</span>
                            </div>

                            <div class="dropdown-cart-action">
                                <a href="#" class="btn btn-gray btn-block view-cart">View
                                    Cart</a>
                                <a href="#" class="btn btn-dark btn-block">Checkout</a>
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
                        <a href="{{ route('category.index') }}">Categories</a>
                        <div class="megamenu megamenu-fixed-width megamenu-3cols">
                            <div class="row">
                                <div class="col-lg-4">
                                    <a href="#" class="nolink">Categories</a>
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
                        <a href="{{ route('category.index') }}">Most Popular</a>
                        <div class="megamenu megamenu-fixed-width megamenu-3cols">
                            <div class="row">
                                <div class="col-lg-4">
                                    <a href="#" class="nolink">Business Cards</a>
                                    <ul class="submenu">
                                        <li><a href="{{ route('category.index') }}">Business Cards</a></li>
                                        <li><a href="#">Standard Cards</a></li>
                                        <li><a href="#">Premium Cards</a></li>
                                        <li><a href="#">Special Finishes</a></li>
                                        <li><a href="#">NFC Cards</a></li>
                                        <li><a href="#">Special offers</a></li>
                                        <li><a href="#">Smooth finish</a></li>
                                        <li><a href="#">Textured finish</a></li>
                                        <li><a href="#">Specialty textured</a></li>
                                        <li><a href="#">Holders & More</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4">
                                    <a href="#" class="nolink">Letterheads</a>
                                    <ul class="submenu">
                                        <li><a href="#">Standard letterhead</a></li>
                                        <li><a href="#">Textured Finish LH</a></li>
                                        <li><a href="#">Smooth Finish LH</a></li>
                                        <li><a href="#">Specialty Textured LH</a></li>
                                        <li><a href="#">Special offers LH</a></li>
                                        <li><a href="#">♻️Recycled LH</a></li>
                                        <a href="#" class="nolink">NFC Business Cards</a>
                                        <a href="#" class="nolink">Folders</a>
                                        <li><a href="#">Standard</a></li>
                                        <li><a href="#">Premium</a></li>
                                        <li><a href="#">Special offers.</a></li>
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
                        <a href="{{ route('category.index') }}">Markete Materials</a>
                        <div class="megamenu megamenu-fixed-width megamenu-3cols">
                            <div class="row">
                                <div class="col-lg-4">
                                    <a href="#" class="nolink">Flyers</a>
                                    <ul class="submenu">
                                        <li><a href="#">Standard-</a></li>
                                        <li><a href="#">Smooth finish-</a></li>
                                        <li><a href="#">Special Finishes-</a></li>
                                        <li><a href="#">Textured finish-</a></li>
                                        <li><a href="#">Specialty textured-</a></li>
                                        <li><a href="#">Special offers-</a></li>
                                        <li><a href="#">♻️Recycled.</a></li>
                                        <a href="#" class="nolink">Brochures</a>
                                        <li><a href="#">Standard</a></li>
                                        <li><a href="#">Premium</a></li>
                                        <a href="#" class="nolink">Stickers/Labels</a>
                                        <li><a href="#">Vinyl Labels</a></li>
                                        <li><a href="#">Paper Lables</a></li>
                                        <li><a href="#">Roll Lables</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4">
                                    <a href="#" class="nolink">Letterheads</a>
                                    <ul class="submenu">
                                        <li><a href="#">Standard letterhead</a></li>
                                        <li><a href="#">Textured Finish LH</a></li>
                                        <li><a href="#">Smooth Finish LH</a></li>
                                        <li><a href="#">Specialty Textured LH</a></li>
                                        <li><a href="#">Special offers LH</a></li>
                                        <li><a href="#">♻️Recycled LH</a></li>
                                        <a href="#" class="nolink">NFC Business Cards</a>
                                        <a href="#" class="nolink">Folders</a>
                                        <li><a href="#">Standard</a></li>
                                        <li><a href="#">Premium</a></li>
                                        <li><a href="#">Special offers.</a></li>
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
                        <a href="{{ route('category.index') }}">Formate Printing</a>
                        <div class="megamenu megamenu-fixed-width megamenu-3cols">
                            <div class="row">
                                <div class="col-lg-4">
                                    <a href="#" class="nolink">Posters & Banners</a>
                                    <ul class="submenu">
                                        <li><a href="#">Posters</a></li>
                                        <li><a href="#">3M Vinyl Graphics</a></li>
                                        <li><a href="#">One Way Vision Film</a></li>
                                        <li><a href="#">Flex Banners</a></li>
                                        <li><a href="#">Backlit Prints</a></li>
                                        <li><a href="#">Whiteboard Film</a></li>
                                        <a href="#" class="nolink">Wallpapers</a>
                                        <a href="#" class="nolink">Canvas Printing</a>
                                        <li><a href="#">Canvas Prints</a></li>
                                        <li><a href="#">Canvas With Frame</a></li>
                                        <a href="#" class="nolink">Rollups</a>
                                        <li><a href="#">Standard</a></li>
                                        <li><a href="#">Premium</a></li>
                                        <li><a href="#">X-Stand Banner</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4">
                                    <a href="#" class="nolink">Popups</a>
                                    <ul class="submenu">
                                        <li><a href="#">Pop-Up Display Straight</a></li>
                                        <li><a href="#">Pop-Up Display Curved</a></li>
                                        <li><a href="#">Promotional Table</a></li>
                                        <a href="#" class="nolink">Displays</a>
                                        <li><a href="#">Acrylic Sign Holders</a></li>
                                        <li><a href="#">Acrylic Name Plates & Desk Stands</a></li>
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
                        <a href="{{ route('category.index') }}">Packing & Box</a>
                        <div class="megamenu megamenu-fixed-width megamenu-3cols">
                            <div class="row">
                                <div class="col-lg-4">
                                    <ul class="submenu">
                                        <li><a href="#">Fancy Boxes</a></li>
                                        <li><a href="#">Corrugated Boxes</a></li>
                                        <li><a href="#">Gift Box</a></li>
                                        <li><a href="#">Fancy Gift Sets</a></li>
                                        <li><a href="#">Cube Boxes</a></li>
                                        <li><a href="#">Soft Boxes</a></li>
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
                        <a href="#">Promo Products</a>
                        <div class="megamenu megamenu-fixed-width megamenu-3cols">
                            <div class="row">
                                <div class="col-lg-4">
                                    <a href="#" class="nolink">Mouse Pads</a>
                                    <ul class="submenu">
                                        <li><a href="#">Sublimation</a>
                                        </li>
                                        <li><a href="">Leather</a>
                                        </li>
                                        <li><a href="">Wireless</a>
                                        </li>
                                        <a href="#" class="nolink">Mugs</a>
                                        <li><a href="category-list.html">Water Bottles</a></li>
                                        <li><a href="category-infinite-scroll.html">Travel Mugs & Tumblers</a>
                                        </li>
                                        <li><a href="#">Mugs</a></li>
                                        <li><a href="#">Glassware</a></li>
                                        <a href="#" class="nolink">Pillows</a>
                                        <a href="#" class="nolink">Diaries/Agendas</a>
                                        <a href="#" class="nolink">Pens</a>
                                        <a href="#" class="nolink">USB Flash Drives</a>
                                        <a href="#" class="nolink">Powerbanks</a>
                                        <a href="#" class="nolink">Stress Balls</a>
                                    </ul>
                                </div>
                                <div class="col-lg-4">
                                    <ul class="submenu">
                                        <li><a href="category-list.html">Balloons</a></li>
                                        <li><a href="category-infinite-scroll.html">Ribbons</a>
                                        </li>
                                        <li><a href="#">Thermal Mugs and Bottles</a></li>
                                        <li><a href="#">Tea Coaster</a></li>
                                        <li><a href="#">Mobile Accessories</a></li>
                                        <li><a href="#">Business Cards Cases</a></li>
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
                        <a href="#">Apparel & Wearables</a>
                        <div class="megamenu megamenu-fixed-width megamenu-3cols">
                            <div class="row">
                                <div class="col-lg-4">
                                    <a href="#" class="nolink">Safety Products</a>
                                    <a href="#" class="nolink">Shirts</a>
                                    <a href="#" class="nolink">Caps</a>
                                    <a href="#" class="nolink">Badges</a>
                                    <a href="#" class="nolink">Lanyard</a>
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
                        <a href="#">Event Brand</a>
                        <div class="megamenu megamenu-fixed-width megamenu-3cols">
                            <div class="row">
                                <div class="col-lg-4">
                                    <a href="#" class="nolink">Photobooks</a>
                                    <a href="#" class="nolink">Trophy Awards & Mementos</a>
                                    <a href="#" class="nolink">Promotional Bags</a>
                                    <a href="#" class="nolink">Exhibition & Events</a>
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
