<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                @if (Auth::check())
                    @if (Auth::user()->role === 1)
                        <li class="menu-title">Main</li>

                        <li>
                            <a href="{{ route('route_BackEnd_Dashboard') }}" class="waves-effect">
                                <i class="ti-home"></i><span class="badge rounded-pill bg-primary float-end">1</span>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="menu-title">Người dùng</li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fas fa-user-md"></i>
                                <span>Người dùng</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('route_BackEnd_Customers_List') }}">Danh sách người dùng</a></li>
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
                                <li><a href="{{ route('route_BackEnd_Category_Product_List') }}">Danh mục sản phẩm</a>
                                </li>
                                <li><a href="{{ route('route_BackEnd_Category_Product_Create') }}">Tạo mới</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fas fa-space-shuttle"></i>
                                <span>Phiếu bảo hành</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('route_BackEnd_Warranty_List') }}">DS phiếu bảo
                                        hành</a>
                                </li>
                                <li><a href="{{ route('route_BackEnd_Warranty_Create') }}">Tạo mới</a></li>
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

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-phone-ring"></i>
                                <span>Liên hệ</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('route_BackEnd_Contact_List') }}">Danh sách liên hệ</a></li>
                            </ul>
                        </li>

                        <li class="menu-title">Voucher</li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-code"></i>
                                <span>Mã giảm giá</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('route_BackEnd_Voucher_List') }}">Danh sách voucher</a></li>
                            </ul>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('route_BackEnd_Voucher_Create') }}">Tạo mới</a></li>
                            </ul>
                        </li>

                        <li class="menu-title">Chứng nhận</li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-certificate"></i>
                                <span>Chứng nhận</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('route_BackEnd_Certificate_List') }}">Danh sách chứng nhận</a>
                                </li>
                            </ul>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('route_BackEnd_Certificate_Create') }}">Tạo mới</a></li>
                            </ul>
                        </li>
                    @endif
                @endif

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
