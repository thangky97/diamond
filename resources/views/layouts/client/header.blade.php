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
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
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
                            <li><a class="nav-link" href="doitra.php">Chính sách đổi trả</a></li>
                            <li><a class="nav-link" href="baohanh.php">Chính sách bảo hành</a></li>
                            <li><a class="nav-link" href="thanhvien.php">Chính sách thành viên</a></li>
                            <li><a class="nav-link" href="vanchuyen.php">Chính sách vận chuyển</a></li>
                            <li><a class="nav-link" href="muahang.php">Hướng dẫn mua hàng</a></li>
                            <li><a class="nav-link" href="baoquan.php">Hướng dẫn bảo quản</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="user_option">

                    <a href="{{ route('route_FrontEnd_Login') }}">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>
                            Đăng nhập
                        </span>
                    </a>
                    <a href="register.php">
                        <i class="fa fa-user2" aria-hidden="true"></i>
                        <span>
                            Đăng kí
                        </span>
                    </a>

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
                    <form action="search.php" method="get" class="form-inline">
                        <input type="text" value="" placeholder="Nội dung tìm kiếm" name="noidungtimkiem"
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
    <!-- slider section -->

    <section class="slider_section animate__animated animate__fadeIn">
        <div class="slider_container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="detail-box">
                                        <h1>
                                            Welcome To Our <br>
                                            SuitAble Shop
                                        </h1>
                                        <p>
                                            SuitAble là một thương hiệu thời trang trẻ được thành lập vào tháng 7
                                            năm 2023.
                                        </p>
                                        <a href="lienhe.php">
                                            Liên hệ với chúng tôi
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-5 ">
                                    <div class="img-box">
                                        <img src="{{ asset('client/assets/images/anhbia1.png') }}" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="detail-box">
                                        <h1>
                                            Welcome To Our <br>
                                            SuitAble Shop
                                        </h1>
                                        <p>
                                            Với quan điểm bảo vệ môi trường SuitAble luôn sử dụng những chất liệu
                                            thân thiện với môi trường(sợi Cotton).
                                        </p>
                                        <a href="lienhe.php">
                                            Liên hệ với chúng tôi
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-5 ">
                                    <div class="img-box">
                                        <img src="{{ asset('client/assets/images/anhbia2.png') }}" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="detail-box">
                                        <h1>
                                            Welcome To Our <br>
                                            SuitAble Shop
                                        </h1>
                                        <p>
                                            Đến với SuitAble, chúng tôi sẽ giúp bạn trở nên trẻ trung, phong cách
                                            thông qua thời trang.
                                        </p>
                                        <a href="lienhe.php">
                                            Liên hệ với chúng tôi
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-5 ">
                                    <div class="img-box">
                                        <img src="{{ asset('client/assets/images/anhbia3.png') }}" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel_btn-box">
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                        data-slide="prev">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <img src="{{ asset('client/assets/images/line.png') }}" alt="" />
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                        data-slide="next">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
