<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>
<div class="header__top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-7">
                <div class="header__top__left">
                    <p>E-shop website.</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-5">
                <div class="header__top__right">
                    <div class="header__top__links">
                        @if (Auth::user())
                            <a href="/client/dashboard">Account</a>
                        @else
                            <a href="{{ route('login') }}">Sign in</a>
                            <a href="{{ route('register') }}">Sign up</a>
                        @endif

                    </div>
                    <div class="header__top__hover">
                        <span>Usd <i class="arrow_carrot-down"></i></span>
                        <ul>
                            <li>USD</li>
                            <li>EUR</li>
                            <li>USD</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Offcanvas Menu Begin0 -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__option">
        <div class="offcanvas__links">
            <a href="{{ route('login') }}">Sign in</a>
            <a href="{{ route('register') }}">Sign up</a>
        </div>
        <div class="offcanvas__top__hover">
            <span>Usd <i class="arrow_carrot-down"></i></span>
            <ul>
                <li>USD</li>
                <li>EUR</li>
                <li>USD</li>
            </ul>
        </div>
    </div>
    <div class="offcanvas__nav__option">
        <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
        <a href="#"><img src="{{ asset('mainassets/img/icon/heart.png') }}" alt=""></a>
        <a>
            <form action="/cart" method="get">
                @csrf
                <button type="submit" class="p-0 border-0 bg-light m-0"><img
                        src="{{ asset('mainassets/img/icon/cart.png') }}" alt="">
            </form>
            <span>{{$num }}</span></button>
        </a>
        <div class="price">${{$tot }}</div>

    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__text">
        <p>E-shop website.</p>
    </div>
</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 ">
                <div class="header__logo">
                    <a class="text-dark h4" href="/">E-shop</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="active"><a href="/">Home</a></li>
                        <li><a href="/shop">Shop</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="/about">About Us</a></li>
                                <li><a href="/shop">Shop Details</a></li>
                                <li><a href="/cart">Shopping Cart</a></li>
                                <li><a href="/checkout">Check Out</a></li>
                                <li><a href="/blog-details">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a href="/blog">Blog</a></li>
                        <li><a href="/contact">Contacts</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option">
                    <a href="#" class="search-switch"><img src="{{ asset('mainassets/img/icon/search.png') }}"
                            alt=""></a>
                    <a href="#"><img src="{{ asset('mainassets/img/icon/heart.png') }}" alt=""></a>
                    <a>
                        <form action="/cart" method="get">
                            @csrf
                            <button type="submit" class="p-0 border-0 bg-light m-0"><img
                                    src="{{ asset('mainassets/img/icon/cart.png') }}" alt="">
                        </form>
                        <span>{{ $num }}</span></button>
                    </a>
                    <div class="price">${{$tot}}</div>
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>
<!-- Header Section End -->
