<header id="header" class="header style-02 header-dark header-transparent header-sticky" style="background-color: #fff">
    <div class="header-wrap-stick">
        <div class="header-position">
            <div class="header-middle">
                <div class="akasha-menu-wapper"></div>
                <div class="header-middle-inner">
                    <div class="header-search-menu">
                        <div class="block-menu-bar">
                            <a class="menu-bar menu-toggle" href="#">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>
                    <div class="header-logo-nav">
                        <div class="header-logo">
                            <a href="index.html"><img alt="Akasha" src="{{ asset('client/assets/images/logo.png') }}"
                                    class="logo"></a>
                        </div>
                        <div class="box-header-nav menu-nocenter">
                            <ul id="menu-primary-menu"
                                class="clone-main-menu akasha-clone-mobile-menu akasha-nav main-menu">
                                <li id="menu-item-230"
                                    class="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-230 parent parent-megamenu item-megamenu menu-item-has-children">
                                    <a class="akasha-menu-item-title" title="Home" href="/">Trang chủ</a>
                                </li>
                                <li id="menu-item-228"
                                    class="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-228 parent parent-megamenu item-megamenu menu-item-has-children">
                                    <a class="akasha-menu-item-title" title="Shop"
                                        href="{{ route('route_FrontEnd_Product') }}">Bất động sản</a>
                                </li>
                                <li id="menu-item-229"
                                    class="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-229 parent parent-megamenu item-megamenu menu-item-has-children">
                                    <a class="akasha-menu-item-title" title="Elements"
                                        href="{{ route('route_FrontEnd_News') }}">Bài viết</a>
                                </li>
                                <li id="menu-item-996"
                                    class="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-996 parent parent-megamenu item-megamenu menu-item-has-children">
                                    <a class="akasha-menu-item-title" title="Blog" href="#">Liên hệ</a>
                                </li>
                                <li id="menu-item-237"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-237 parent">
                                    <a class="akasha-menu-item-title" title="Pages" href="#">Về chúng tôi</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="header-control">
                        <div class="header-control-inner">
                            <div class="meta-dreaming">
                                <div class="header-search akasha-dropdown">
                                    <div class="header-search-inner" data-akasha="akasha-dropdown">
                                        <a href="#" class="link-dropdown block-link">
                                            <span class="flaticon-magnifying-glass-1"></span>
                                        </a>
                                    </div>
                                    <div class="block-search">
                                        <form action="{{ route('route_FrontEnd_Home') }}" role="search" method="get"
                                            class="form-search block-search-form akasha-live-search-form">
                                            @csrf
                                            <div class="form-content search-box results-search">
                                                <div class="inner">
                                                    <input autocomplete="off" class="searchfield txt-livesearch input"
                                                        name="name" value="{{ $name }}"
                                                        placeholder="Nhập tên sản phẩm..." type="text">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn-submit">
                                                <span class="flaticon-magnifying-glass-1"></span>
                                            </button>
                                        </form><!-- block search -->
                                    </div>
                                </div>
                                <div class="akasha-dropdown-close">x</div>
                                <div class="menu-item block-user block-dreaming akasha-dropdown">
                                    @if (Auth::check())
                                        @if (Auth::user()->lastName)
                                            <img class="rounded-circle block-link" style="height: 30px; width: 30px"
                                                src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}">
                                        @else
                                            <img class="rounded-circle block-link" style="height: 30px; width: 30px"
                                                src="{{ asset(Auth::user()->avatar) ? '' . Storage::url(Auth::user()->avatar) : Auth::user()->name }}"
                                                alt="{{ Auth::user()->name }}">
                                        @endif
                                    @else
                                        <a class="block-link" href="#">
                                            <span class="flaticon-profile"></span>
                                        </a>
                                    @endif

                                    <ul class="sub-menu">
                                        @if (!Auth::check())
                                            <li
                                                class="menu-item akasha-MyAccount-navigation-link akasha-MyAccount-navigation-link--dashboard is-active">
                                                <a href="{{ route('route_FrontEnd_Login') }}">Đăng nhập</a>
                                            </li>
                                        @endif
                                        <li
                                            class="menu-item akasha-MyAccount-navigation-link akasha-MyAccount-navigation-link--customer-logout">
                                            <a href="{{ route('logout-user') }}">Đăng xuất</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="block-minicart block-dreaming akasha-mini-cart">
                                    <div class="block-cart-link">
                                        <a class="block-link" href="{{ route('route_FrontEnd_Cart') }}">
                                            <span class="flaticon-bag"></span>
                                            <span class="count">
                                                @php
                                                    $cart = session('cart');
                                                @endphp
                                                @if (isset($cart) && is_array($cart))
                                                    {{ $numberOfItemsInCart }}
                                                @else
                                                    0
                                                @endif
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-mobile">
        <div class="header-mobile-left">
            <div class="block-menu-bar">
                <a class="menu-bar menu-toggle" href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>
            <div class="header-search akasha-dropdown">
                <div class="header-search-inner" data-akasha="akasha-dropdown">
                    <a href="#" class="link-dropdown block-link">
                        <span class="flaticon-magnifying-glass-1"></span>
                    </a>
                </div>
                <div class="block-search">
                    <form action="{{ route('route_FrontEnd_Home') }}" role="search" method="get"
                        class="form-search block-search-form akasha-live-search-form">
                        @csrf
                        <div class="form-content search-box results-search">
                            <div class="inner">
                                <input autocomplete="off" class="searchfield txt-livesearch input" name="name"
                                    value="{{ $name }}" placeholder="Nhập tên sản phẩm..." type="text">
                            </div>
                        </div>
                        <button type="submit" class="btn-submit">
                            <span class="flaticon-magnifying-glass-1"></span>
                        </button>
                    </form><!-- block search -->
                </div>
            </div>
        </div>
        <div class="header-mobile-mid">
            <div class="header-logo">
                <a href="index.html"><img alt="Akasha" src="{{ asset('client/assets/images/logo.png') }}"
                        class="logo"></a>
            </div>
        </div>
        <div class="header-mobile-right">
            <div class="header-control-inner">
                <div class="meta-dreaming">
                    <div class="menu-item block-user block-dreaming akasha-dropdown">
                        @if (Auth::check())
                            @if (Auth::user()->lastName)
                                <img class="rounded-circle block-link" style="height: 30px; width: 30px"
                                    src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}">
                            @else
                                <img class="rounded-circle block-link" style="height: 30px; width: 30px"
                                    src="{{ asset(Auth::user()->avatar) ? '' . Storage::url(Auth::user()->avatar) : Auth::user()->name }}"
                                    alt="{{ Auth::user()->name }}">
                            @endif
                        @else
                            <a class="block-link" href="#">
                                <span class="flaticon-profile"></span>
                            </a>
                        @endif

                        <ul class="sub-menu">
                            @if (!Auth::check())
                                <li
                                    class="menu-item akasha-MyAccount-navigation-link akasha-MyAccount-navigation-link--dashboard is-active">
                                    <a href="{{ route('route_FrontEnd_Login') }}">Đăng nhập</a>
                                </li>
                            @endif
                            <li
                                class="menu-item akasha-MyAccount-navigation-link akasha-MyAccount-navigation-link--customer-logout">
                                <a href="{{ route('logout-user') }}">Đăng xuất</a>
                            </li>
                        </ul>
                    </div>
                    <div class="block-minicart block-dreaming akasha-mini-cart akasha-dropdown">
                        <div class="shopcart-dropdown block-cart-link" data-akasha="akasha-dropdown">
                            <a class="block-link" href="{{ route('route_FrontEnd_Cart') }}">
                                <span class="flaticon-bag"></span>
                                <span class="count">
                                    @php
                                        $cart = session('cart');
                                    @endphp
                                    @if (isset($cart) && is_array($cart))
                                        {{ $numberOfItemsInCart }}
                                    @else
                                        0
                                    @endif
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
