<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                
                @if (Auth::check())
                @if (Auth::user()->role === 0)
                <li class="menu-title">Main</li>

                <li>
                    <a href="{{ route('route_BackEnd_Dashboard') }}" class="waves-effect">
                        <i class="ti-home"></i><span class="badge rounded-pill bg-primary float-end">1</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                {{-- <li class="menu-title">Quản lý hệ thống</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-cogs"></i>
                        <span>Quản lý hệ thống</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="">Nội dung hệ thống</a></li>
                        <li><a href="javascript: void(0);" class="has-arrow">Banner</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="">Danh sách banner</a></li>
                                <li><a href="">Tạo mới</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}


                <li class="menu-title">Người dùng</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-user-md"></i>
                        <span>Khách hàng</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('route_BackEnd_Customers_List') }}">Danh sách khách hàng</a></li>
                        <li><a href="{{ route('route_BackEnd_Customers_Create') }}">Tạo mới</a></li>
                    </ul>
                </li>

                <li class="menu-title">Sản phẩm</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fab fa-shopify"></i>
                        <span>Sản phẩm</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('route_BackEnd_Products_List') }}">Danh sách sản phẩm</a></li>
                        <li><a href="{{ route('route_BackEnd_Products_Create') }}">Tạo mới</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-space-shuttle"></i>
                        <span>Danh mục sản phẩm</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('route_BackEnd_Category_Product_List') }}">Danh mục sản phẩm</a></li>
                        <li><a href="{{ route('route_BackEnd_Category_Product_Create') }}">Tạo mới</a></li>
                    </ul>
                </li>

                <li class="menu-title">Đơn hàng</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-phone-ring"></i>
                        <span>Đơn hàng</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('route_BackEnd_Orders_List') }}">Danh sách đơn hàng</a></li>
                    </ul>
                </li>

                <li class="menu-title">Đánh giá</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-phone-ring"></i>
                        <span>Comment</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('route_BackEnd_Comment_List') }}">Danh sách comment</a></li>
                    </ul>
                </li>

                <li class="menu-title">Tin tức</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-archive"></i>
                        <span>Bài viết</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('route_BackEnd_News_List') }}">Danh sách bài viết</a></li>
                        <li><a href="{{ route('route_BackEnd_News_Create') }}">Tạo mới</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-archive"></i>
                        <span>Danh mục bài viết</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('route_BackEnd_Category_News_List') }}">Danh mục bài viết</a></li>
                        <li><a href="{{ route('route_BackEnd_Category_News_Create') }}">Tạo mới</a></li>
                    </ul>
                </li>

                @elseif (Auth::user()->role === 1)
                <li class="menu-title">Sản phẩm</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fab fa-shopify"></i>
                        <span>Sản phẩm</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('route_BackEnd_Products_List') }}">Danh sách sản phẩm</a></li>
                        <li><a href="{{ route('route_BackEnd_Products_Create') }}">Tạo mới</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-space-shuttle"></i>
                        <span>Danh mục sản phẩm</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('route_BackEnd_Category_Product_List') }}">Danh mục sản phẩm</a></li>
                        <li><a href="{{ route('route_BackEnd_Category_Product_Create') }}">Tạo mới</a></li>
                    </ul>
                </li>
                {{-- Order --}}
                {{-- @elseif (Auth::user()->role === 2) --}}
                @elseif (Auth::user()->role === 3)
                <li class="menu-title">Tin tức</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-archive"></i>
                        <span>Bài viết</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('route_BackEnd_News_List') }}">Danh sách bài viết</a></li>
                        <li><a href="{{ route('route_BackEnd_News_Create') }}">Tạo mới</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-archive"></i>
                        <span>Danh mục bài viết</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('route_BackEnd_Category_News_List') }}">Danh mục bài viết</a></li>
                        <li><a href="{{ route('route_BackEnd_Category_News_Create') }}">Tạo mới</a></li>
                    </ul>
                </li>
                @endif
                @endif

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
