<div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.php">
                <span>
                    <img src="https://img.upanh.tv/2023/07/12/Suit_able_auto_x2.jpg" alt="Suit_able_auto_x2.jpg"
                        border="0">
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""></span>
            </button>

            <div class="collapse navbar-collapse innerpage_navbar" id="navbarSupportedContent">
                <ul class="navbar-nav  ">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('route_FrontEnd_Home') }}">Home <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ao.php">
                            áo
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="quan.php">
                            quần
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="bosuutap.php">
                            bộ sưu tập
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lienhe.php">liên hệ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">chăm sóc khách hàng</a>
                        <ul class="sub-menu1">
                            <li><a class="nav-link" href="{{ route('route_FrontEnd_Doi_Tra') }}">Chính sách đổi trả</a>
                            </li>
                            <li><a class="nav-link" href="{{ route('route_FrontEnd_Bao_Hanh') }}">Chính sách bảo
                                    hành</a></li>
                            <li><a class="nav-link" href="{{ route('route_FrontEnd_Thanh_Vien') }}">Chính sách thành
                                    viên</a></li>
                            <li><a class="nav-link" href="{{ route('route_FrontEnd_Van_Chuyen') }}">Chính sách vận
                                    chuyển</a></li>
                            <li><a class="nav-link" href="{{ route('route_FrontEnd_Mua_Hang') }}">Hướng dẫn mua hàng</a>
                            </li>
                            <li><a class="nav-link" href="{{ route('route_FrontEnd_Bao_Quan') }}">Hướng dẫn bảo
                                    quản</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="user_option">

                    @if (Auth::check())
                        <a href="#">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>
                                {{ Auth::user()->username }}
                            </span>
                        </a>
                        <a href="{{ route('logout-user') }}">
                            <i class="fa fa-user2" aria-hidden="true"></i>
                            <span>
                                Đăng xuất
                            </span>
                        </a>
                    @else
                        <a href="{{ route('route_FrontEnd_Login') }}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>
                                Đăng nhập
                            </span>
                        </a>
                        <a href="{{ route('getRegister') }}">
                            <i class="fa fa-user2" aria-hidden="true"></i>
                            <span>
                                Đăng kí
                            </span>
                        </a>
                    @endif

                    <!-- Giỏ hàng -->
                    <div class="header__cart">
                        <div class="header__cart-wrap">
                            <i class="fa fa-shopping-bag"></i>
                            <span class="header__cart-notice">
                            </span>
                            <!-- No cart: header__cart-list--no-cart -->
                            <div class="header__cart-list">
                                <img src="./no-cart.png" alt="" class="header__cart-no-cart-img">
                                <span class="header__cart-list-no-cart-msg">
                                    Chưa có sản phẩm
                                </span>

                                <h4 class="header__cart-heading">Sản phẩm đã thêm</h4>
                                <ul class="header__cart-list-item">
                                    <!-- cart item -->

                                    <li class="header__cart-item">
                                        <img src="" alt="" class="header__cart-img">
                                        <div class="header__cart-item-info">
                                            <div class="header__cart-item-head">
                                                <h5 class="header__cart-item-name"></h5>
                                                <div class="header__cart-item-price-wrap">
                                                    <span class="header__cart-item-price"></span>
                                                    <span class="header__cart-item-multiply">x</span>
                                                    <span class="header__cart-item-qnt"></span>
                                                </div>
                                            </div>
                                            <div class="header__cart-item-body">
                                                <span class="header__cart-item-description">
                                                    Phân loại:
                                                </span>
                                                <form action="index.php" method='post' enctype='multipart/form-data'>
                                                    <span class="header__cart-item-remove">
                                                        <input type='hidden' id='xoa_SP' name='id_xoa_sp'
                                                            value="">
                                                        <button class="btn nav_delete-btn" name='xoa_sp'
                                                            type="submit">
                                                            Xóa
                                                        </button>
                                                    </span>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <a href="gio-hang.php" class="header__cart-view-cart btn btn--primary">Xem giỏ
                                    hàng</a>
                            </div>
                        </div>


                    </div>
                    <form action="{{ route('route_FrontEnd_Home') }}" method="get" class="form-inline">
                        @csrf
                        <input type="text" name="name" value="{{ $name }}" placeholder="Tên sản phẩm"
                            id="Timkiem" style="font-size: 12px; border: none; padding: 6px; margin-right: 12px;">
                        <button class="btn nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <!-- end header section -->

</div>
