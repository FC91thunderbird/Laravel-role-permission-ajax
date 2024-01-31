<header class="header-main_area header-main_area-3">
    <div class="header-middle_area d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-middle_wrap">
                        <div class="header-contact_area">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('user/images/menu/logo/4.png') }}" alt="Hiraola's Header Logo">
                            </a>
                        </div>
                        <div class="header-bottom_area">

                            <div class="col-lg-12 d-none d-lg-flex justify-content-center position-static">
                                <div class="main-menu_area">
                                    <nav>
                                        <ul>
                                            <li class="dropdown-holder"><a href="index.html">Home</a>
                                            </li>

                                            <li><a href="about-us.html">About Us</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="shop-left-sidebar.html">Jewellery</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                        </div>
                        <div class="header-right_area">
                            <ul>
                                @guest
                                @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @endif
                                @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ ucfirst(Auth::user()->name) }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        @if(Auth::user()->role->name === 'admin')
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}" >Dashboard</a>
                                       @endif
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endguest

                                <!-- <li>
                                    <a href="{{ route('login') }}" class="wishlist-btn">Login
                                    </a>
                                </li> -->
                                <li>
                                    <a href="#searchBar" class="search-btn toolbar-btn">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white d-lg-none d-block">
                                        <i class="ion-navicon"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#miniCart" class="minicart-btn toolbar-btn">
                                        <i class="ion-bag"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom_area header-bottom_area-2 header-sticky stick white--color">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-4">
                    <div class="header-logo">
                        <a href="index.html">
                            <img src="{{ asset('user/images/menu/logo/2.png') }}" alt="Hiraola's Header Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 d-none d-lg-block position-static">
                    <div class="main-menu_area">
                        <nav>
                            <ul>
                                <li class="dropdown-holder"><a href="index.html">Home</a>
                                </li>

                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 col-md-8 col-sm-8">
                    <div class="header-right_area">
                        <ul>
                        @guest
                                @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @endif
                                @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ ucfirst(Auth::user()->name) }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        @if(Auth::user()->role->name === 'admin')
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}" >Dashboard</a>
                                       @endif
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endguest
                            <li>
                                <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white d-lg-none d-block">
                                    <i class="ion-navicon"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#miniCart" class="minicart-btn toolbar-btn">
                                    <i class="ion-bag"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-minicart_wrapper" id="miniCart">
        <div class="offcanvas-menu-inner">
            <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
            <div class="minicart-content">
                <div class="minicart-heading">
                    <h4>Shopping Cart</h4>
                </div>
                <ul class="minicart-list">
                    <li class="minicart-product">
                        <a class="product-item_remove" href="javascript:void(0)"><i class="ion-android-close"></i></a>
                        <div class="product-item_img">
                            <img src="{{ asset('user/images/product/small-size/2-1.jpg') }}" alt="Hiraola's Product Image">
                        </div>
                        <div class="product-item_content">
                            <a class="product-item_title" href="shop-left-sidebar.html">Magni dolorum vel</a>
                            <span class="product-item_quantity">1 x $120.80</span>
                        </div>
                    </li>
                    <li class="minicart-product">
                        <a class="product-item_remove" href="javascript:void(0)"><i class="ion-android-close"></i></a>
                        <div class="product-item_img">
                            <img src="{{ asset('user/images/product/small-size/2-2.jpg') }}" alt="Hiraola's Product Image">
                        </div>
                        <div class="product-item_content">
                            <a class="product-item_title" href="shop-left-sidebar.html">Eius accusantium omnis</a>
                            <span class="product-item_quantity">1 x $120.80</span>
                        </div>
                    </li>
                    <li class="minicart-product">
                        <a class="product-item_remove" href="javascript:void(0)"><i class="ion-android-close"></i></a>
                        <div class="product-item_img">
                            <img src="{{ asset('user/images/product/small-size/2-3.jpg') }}" alt="Hiraola's Product Image">
                        </div>
                        <div class="product-item_content">
                            <a class="product-item_title" href="shop-left-sidebar.html">Aperiam adipisci dolorem</a>
                            <span class="product-item_quantity">1 x $120.80</span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="minicart-item_total">
                <span>Subtotal</span>
                <span class="ammount">$360.00</span>
            </div>
            <div class="minicart-btn_area">
                <a href="cart.html" class="hiraola-btn hiraola-btn_dark hiraola-btn_fullwidth">Minicart</a>
            </div>
            <div class="minicart-btn_area">
                <a href="checkout.html" class="hiraola-btn hiraola-btn_dark hiraola-btn_fullwidth">Checkout</a>
            </div>
        </div>
    </div>
    <div class="offcanvas-search_wrapper" id="searchBar">
        <div class="offcanvas-menu-inner">
            <div class="container">
                <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
                <!-- Begin Offcanvas Search Area -->
                <div class="offcanvas-search">
                    <form action="#" class="hm-searchbox">
                        <input type="text" placeholder="Search for item...">
                        <button class="search_btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                    </form>
                </div>
                <!-- Offcanvas Search Area End Here -->
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu_wrapper" id="mobileMenu">
        <div class="offcanvas-menu-inner">
            <div class="container">
                <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
                <div class="offcanvas-inner_search">
                    <form action="#" class="hm-searchbox">
                        <input type="text" placeholder="Search for item...">
                        <button class="search_btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                    </form>
                </div>
                <nav class="offcanvas-navigation">
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children active"><a href="#"><span class="mm-text">Home</span></a>
                        </li>

                    </ul>
                </nav>
                <nav class="offcanvas-navigation user-setting_area">
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children active">
                            <a href="#">
                                <span class="mm-text">User
                                    Setting
                                </span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="my-account.html">
                                        <span class="mm-text">My Account</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="login-register.html">
                                        <span class="mm-text">Login | Register</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>