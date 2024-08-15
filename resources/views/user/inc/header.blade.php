<header class="header-area header-style-1 header-height-2">


    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{ url('/') }}"><img src="{{ asset('front_assets/imgs/logo/logo.png') }}"
                            alt="logo')}}"></a>
                </div>
                <div class="header-right">
                    <div class="search-style-1">
                        <form action="#">
                            <input type="text" placeholder="Search for items..." id="searchBox" autocomplete="off">
                        </form>
                        <div id="results"></div>

                        {{-- <input type="text" id="searchBox" placeholder="Search products..." autocomplete="off">
                        <div id="resultsContainer"></div> --}}
                    </div>


                    <div class="row product-grid-4" style="display:none;">
                        <div class="product-item" data-name="Colorful Pattern Shirts">
                            <img src="{{ asset('front_assets/imgs/shop/product-1-1.jpg') }}"
                                alt="Colorful Pattern Shirts">
                            <div>Colorful Pattern Shirts</div>
                        </div>
                        <div class="product-item" data-name="Plain Color Pocket Shirts">
                            <img src="{{ asset('front_assets/imgs/shop/product-2-1.jpg') }}"
                                alt="Plain Color Pocket Shirts">
                            <div>Plain Color Pocket Shirts</div>
                        </div>
                        <!-- Add more products here -->
                    </div>




                    <div class="header-action-right">
                        <div class="header-action-2">
                            @if (Auth::check())
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="{{ route('profile.edit') }}">
                                        <span class="pro-count"
                                            style="background-color: green; margin-right: 13px; margin-top: 7px;"></span>
                                    </a>
                                    {{ strtoupper(Auth::user()->name) }}
                                </div>
                            @endif



                            @if (Route::has('login'))
                                <nav class="-mx-3 flex flex-1 justify-end">
                                    @auth



                                        <div class="header-action-icon-2">
                                            <a href="{{ url('/') }}">
                                                <i class="bi bi-person"></i>
                                            </a>
                                            <div class="dropdown-content">
                                                <a href="{{ route('profile.edit') }}"><i
                                                        class="fa-solid fa-user"></i>&nbsp&nbsp&nbsp;Profile</a>
                                                <a href="cart.html"><i
                                                        class="fa-solid fa-cart-shopping"></i>&nbsp&nbsp&nbsp;Cart</a>
                                                <a href="order.html"><i
                                                        class="fa-solid fa-box-archive"></i>&nbsp&nbsp&nbsp;Orders</a>
                                                <a href="Wishlist.html"><i
                                                        class="fa-solid fa-heart"></i>&nbsp&nbsp&nbsp;Wishlist</a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="header-action-icon-2">
                                            <a href="{{ route('login') }}">
                                                <i class="bi bi-person"></i>
                                            </a>
                                            <div class="dropdown-content">


                                                @if (Route::has('register'))
                                                    <a href="{{ route('login') }}"><i
                                                            class="fa-solid fa-user"></i>&nbsp;&nbsp;&nbsp;Sign In</a>
                                                    <a href="{{ route('register') }}"><i
                                                            class="fa-solid fa-user"></i>&nbsp;&nbsp;&nbsp;Register</a>
                                                    <a href="Wishlist.html"><i
                                                            class="fa-solid fa-heart"></i>&nbsp;&nbsp;&nbsp;Wishlist</a>
                                                @endif



                                            </div>
                                        </div>


                                    @endauth
                                </nav>
                            @endif

                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="cart.html">
                                    <i class="bi bi-cart"></i>
                                    <span class="pro-count blue">2</span>

                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="product-details.html"><img alt="Surfside Media"
                                                        src="{{ asset('front_assets/imgs/shop/thumbnail-3.jpg') }}"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="product-details.html">Daisy Casual Bag</a></h4>
                                                <h4><span>1 × </span>$800.00</h4>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="product-details.html"><img alt="Surfside Media"
                                                        src="{{ asset('front_assets/imgs/shop/thumbnail-2.jpg') }}"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="product-details.html">Corduroy Shirts</a></h4>
                                                <h4><span>1 × </span>$3200.00</h4>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span>$4000.00</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="cart.html" class="outline">View cart</a>
                                            <a href="checkout.html">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="header-action-icon-2">
                                <a href="{{ route('register') }}">
                                    <i class="bi bi-shop-window"></i>

                                </a>
                            </div>

                            <div class="header-action-icon-2">
                                <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                                  Return Order 
                                  </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Return Order</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3">
                                
                
                <div class="col-md-12">
                    <label for="inputFirstName" class="form-label">Order Id</label>
                    <input type="email" class="form-control" id="inputFirstName">
                </div>
                 
                <div class="col-md-12">
                    <label for="inputFirstName" class="form-label">Upload Video file</label>
                    <input type="file" class="form-control" id="inputFirstName">
                </div>
            

                <div class="col-md-12">
                    <label for="inputFirstName" class="form-label">Why Return Product</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                </div>

            



                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="sou()" class="btn btn-primary">Upload Video</button>
                  </div>

            </form>
        </div>
       
      </div>
    </div>
  </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="index.html"><img src="{{ asset('front_assets/imgs/logo/logo.png') }}" alt="logo')}}"></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categori-button-active" href="#">
                            <span class="fi-rs-apps"></span> Browse Categories
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-large">
                            {{-- #This Function use to navigation Bar and adderss is app\Halpers\common.php --}}
                            {!! getTopNavCat() !!}

                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                        <nav>
                            <ul>
                                <li><a class="active" href="index.html">Home </a></li>
                                <!-- <li><a href="about.html">About</a></li> -->
                                <!-- <li><a href="shop.html">Shop</a></li> -->
                                <li class="position-static"><a href="#">Our Collections <i
                                            class="fi-rs-angle-down"></i></a>
                                    <ul class="mega-menu">
                                        {!! ourCollections() !!}


                                        <li class="sub-mega-menu sub-mega-menu-width-34">
                                            <div class="menu-banner-wrap">
                                                <a href="product-details.html"><img
                                                        src="{{ asset('front_assets/imgs/banner/menu-banner.jpg') }}"
                                                        alt="Surfside Media"></a>
                                                <div class="menu-banner-content">
                                                    <h4>Hot deals</h4>
                                                    <h3>Don't miss<br> Trending</h3>
                                                    <div class="menu-banner-price">
                                                        <span class="new-price text-success">Save to 50%</span>
                                                    </div>
                                                    <div class="menu-banner-btn">
                                                        <a href="product-details.html">Shop now</a>
                                                    </div>
                                                </div>
                                                <div class="menu-banner-discount">
                                                    <h3>
                                                        <span>35%</span>
                                                        off
                                                    </h3>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                                <li><a href="contact.html">Contact</a></li>

                            </ul>
                        </nav>
                    </div>
                </div>
                {{-- Mobile Navber --}}
                <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%
                </p>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        @if (Route::has('login'))
                            @auth
                                <div class="header-action-icon-2">
                                    <a href="{{ route('profile.edit') }}">
                                        <i class="fa-solid fa-user"></i>
                                    </a>
                                    <div class="dropdown-content">
                                        <a href="{{ route('profile.edit') }}"><i
                                                class="fa-solid fa-user"></i>&nbsp&nbsp&nbsp;Profile</a>
                                        <a href="cart.html"><i
                                                class="fa-solid fa-cart-shopping"></i>&nbsp&nbsp&nbsp;Cart</a>
                                        <a href="order.html"><i
                                                class="fa-solid fa-box-archive"></i>&nbsp&nbsp&nbsp;Orders</a>
                                        <a href="Wishlist.html"><i
                                                class="fa-solid fa-heart"></i>&nbsp&nbsp&nbsp;Wishlist</a>
                                    </div>
                                </div>
                            @else
                                <div class="header-action-icon-2">
                                    <a href="{{ route('login') }}">
                                        <i class="fa-solid fa-user"></i>
                                    </a>
                                    @if (Route::has('register'))
                                        <div class="dropdown-content">
                                            <a href="{{ route('login') }}"><i
                                                    class="fa-solid fa-user"></i>&nbsp;&nbsp;&nbsp;Sign In</a>
                                            <a href="{{ route('register') }}"><i
                                                    class="fa-solid fa-user"></i>&nbsp;&nbsp;&nbsp;Register</a>
                                            <a href="Wishlist.html"><i
                                                    class="fa-solid fa-heart"></i>&nbsp;&nbsp;&nbsp;Wishlist</a>
                                        </div>
                                    @endif



                                </div>

                            @endauth
                        @endif


                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="cart.html">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <span class="pro-count white">2</span>
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                <ul>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="product-details.html"><img alt="Surfside Media"
                                                    src="{{ asset('front_assets/imgs/shop/thumbnail-3.jpg') }}"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="product-details.html">Plain Striola Shirts</a></h4>
                                            <h3><span>1 × </span>$800.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="product-details.html"><img alt="Surfside Media"
                                                    src="{{ asset('front_assets/imgs/shop/thumbnail-4.jpg') }}"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="product-details.html">Macbook Pro 2022</a></h4>
                                            <h3><span>1 × </span>$3500.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="shopping-cart-footer">
                                    <div class="shopping-cart-total">
                                        <h4>Total <span>$383.00</span></h4>
                                    </div>
                                    <div class="shopping-cart-button">
                                        <a href="cart.html">View cart</a>
                                        <a href="shop-checkout.php">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="header-action-icon-2">
                            <a href="{{ route('register') }}">
                                <i class="fa-solid fa-store"></i>

                            </a>
                        </div>


                        <div class="header-action-icon-2 d-block d-lg-none">
                            <div class="burger-icon burger-icon-white">
                                <span class="burger-icon-top"></span>
                                <span class="burger-icon-mid"></span>
                                <span class="burger-icon-bottom"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="index.html"><img src="{{ asset('front_assets/imgs/logo/logo.png') }}" alt="logo')}}"></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input type="text" placeholder="Search for items…">
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>


            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <div class="main-categori-wrap mobile-header-border">
                    <a class="categori-button-active-2" href="#">
                        <span class="fi-rs-apps"></span> Browse Categories
                    </a>
                    <div class="categori-dropdown-wrap categori-dropdown-active-small">
                        <ul>
                            <li><a href="shop.html"><i class="surfsidemedia-font-dress"></i>Women's Clothing</a>
                            </li>
                            <li><a href="shop.html"><i class="surfsidemedia-font-tshirt"></i>Men's Clothing</a>
                            </li>
                            <li> <a href="shop.html"><i class="surfsidemedia-font-smartphone"></i> Cellphones</a>
                            </li>
                            <li><a href="shop.html"><i class="surfsidemedia-font-desktop"></i>Computer &
                                    Office</a></li>
                            <li><a href="shop.html"><i class="surfsidemedia-font-cpu"></i>Consumer Electronics</a>
                            </li>
                            <li><a href="shop.html"><i class="surfsidemedia-font-home"></i>Home & Garden</a></li>
                            <li><a href="shop.html"><i class="surfsidemedia-font-high-heels"></i>Shoes</a></li>
                            <li><a href="shop.html"><i class="surfsidemedia-font-teddy-bear"></i>Mother & Kids</a>
                            </li>
                            <li><a href="shop.html"><i class="surfsidemedia-font-kite"></i>Outdoor fun</a></li>
                        </ul>
                    </div>
                </div>
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                href="index.html">Home</a></li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                href="shop.html">shop</a></li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Our
                                Collections</a>
                            <ul class="dropdown">
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                        href="#">Women's Fashion</a>
                                    <ul class="dropdown">
                                        <li><a href="product-details.html">Dresses</a></li>
                                        <li><a href="product-details.html">Blouses & Shirts</a></li>
                                        <li><a href="product-details.html">Hoodies & Sweatshirts</a></li>
                                        <li><a href="product-details.html">Women's Sets</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                        href="#">Men's Fashion</a>
                                    <ul class="dropdown">
                                        <li><a href="product-details.html">Jackets</a></li>
                                        <li><a href="product-details.html">Casual Faux Leather</a></li>
                                        <li><a href="product-details.html">Genuine Leather</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                        href="#">Technology</a>
                                    <ul class="dropdown">
                                        <li><a href="product-details.html">Gaming Laptops</a></li>
                                        <li><a href="product-details.html">Ultraslim Laptops</a></li>
                                        <li><a href="product-details.html">Tablets</a></li>
                                        <li><a href="product-details.html">Laptop Accessories</a></li>
                                        <li><a href="product-details.html">Tablet Accessories</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                href="#">Language</a>
                            <ul class="dropdown">
                                <li><a href="#">English</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">German</a></li>
                                <li><a href="#">Spanish</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap mobile-header-border">
                <div class="single-mobile-header-info mt-30">
                    <a href="contact.html"> Our location </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="login.html">Log In </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="register.html">Sign Up</a>
                </div>
            </div>
            <div class="mobile-social-icon">
                <h5 class="mb-15 text-grey-4">Follow Us</h5>
                <a href="#"><img src="{{ asset('front_assets/imgs/theme/icons/icon-facebook.svg') }}"
                        alt=""></a>
                <a href="#"><img src="{{ asset('front_assets/imgs/theme/icons/icon-twitter.svg') }}"
                        alt=""></a>
                <a href="#"><img src="{{ asset('front_assets/imgs/theme/icons/icon-instagram.svg') }}"
                        alt=""></a>
                <a href="#"><img src="{{ asset('front_assets/imgs/theme/icons/icon-pinterest.svg') }}"
                        alt=""></a>
                <a href="#"><img src="{{ asset('front_assets/imgs/theme/icons/icon-youtube.svg') }}"
                        alt=""></a>
            </div>
        </div>
    </div>
</div>
