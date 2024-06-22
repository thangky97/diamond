@extends('layouts.client.master')

@section('title', 'Giỏ hàng')

@section('content')

    <main class="site-main main-container no-sidebar" style="padding-top: 140px">
        <div class="container">
            <div class="row">
                <div class="main-content col-md-12">
                    <div class="page-main-content">
                        <div class="akasha">
                            <div class="akasha-notices-wrapper"></div>
                            <form class="akasha-cart-form">
                                <table class="shop_table shop_table_responsive cart akasha-cart-form__contents"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><a onclick="return confirm('Bạn có chắc muốn xóa hết đơn hàng không?')"
                                                    href="{{ route('cartDeleteAll') }}">Xóa</i></a></th>
                                            {{-- <th class="product-remove">&nbsp;</th> --}}
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Sản phẩm</th>
                                            <th class="product-price">Giá</th>
                                            <th class="product-quantity">Số lượng</th>
                                            <th class="product-subtotal">Tổng giá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $cart = session('cart');
                                            $tong = 0;
                                        @endphp

                                        @if ($cart)
                                            @for ($i = 0; $i < count($cart); $i++)
                                                @php
                                                    $item = $cart[$i];
                                                    $tong += $item[7];
                                                @endphp
                                                {{-- <input type="hidden" {{ $tong += $item[7] }}> --}}
                                                {{-- <span> {{ $tong += $item[7] }}</span> --}}
                                                {{-- Hiển thị thông tin cho mỗi mục trong giỏ hàng --}}
                                                <tr class="akasha-cart-form__cart-item cart_item">
                                                    <td class="product-remove">
                                                        <a class="remove"
                                                            onclick="return confirm('Bạn có chắc muốn xóa không?')"
                                                            href="{{ route('cartDelete', $item[0]) }}">×</a>
                                                    </td>
                                                    <td class="product-thumbnail">
                                                        <img class="attachment-akasha_thumbnail size-akasha_thumbnail"
                                                            src="{{ asset($item[1]) ? '' . Storage::url($item[1]) : $item[2] }}"
                                                            alt="" width="600" height="778">
                                                    </td>
                                                    <td class="product-name" data-title="Product">
                                                        {{ $item[2] }}
                                                    </td>
                                                    <td class="product-price" data-title="Price">
                                                        <span class="akasha-Price-amount amount"><span
                                                                class="akasha-Price-currencySymbol"></span>{{ number_format($item[6]) }}</span>
                                                    </td>
                                                    <td class="product-quantity" data-title="Quantity">
                                                        <div class="quantity">
                                                            <div class="control">
                                                                <a class="btn-number qtyminus quantity-minus"
                                                                    href="#">-</a>
                                                                <input type="text" value="{{ $item[4] }}"
                                                                    title="Qty" class="input-qty input-text qty text">
                                                                <a class="btn-number qtyplus quantity-plus"
                                                                    href="#">+</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="product-subtotal" data-title="Total">
                                                        <span class="akasha-Price-amount amount"><span
                                                                class="akasha-Price-currencySymbol"></span>{{ number_format($item[7]) }}</span>
                                                    </td>
                                                </tr>
                                            @endfor
                                        @endif

                                    </tbody>
                                </table>
                            </form>
                            <div class="cart-collaterals">
                                <div class="cart_totals ">
                                    <h2>Tổng giỏ hàng</h2>
                                    <table class="shop_table shop_table_responsive" cellspacing="0">
                                        <tbody>
                                            <tr class="cart-subtotal">
                                                <th>Tạm tính</th>
                                                @php
                                                    $cart = session('cart');
                                                @endphp
                                                @if (isset($cart) && is_array($cart))
                                                    <td data-title="Subtotal"><span class="akasha-Price-amount amount"><span
                                                                class="akasha-Price-currencySymbol"></span>{{ number_format($tong) }}</span>
                                                    </td>
                                                @else
                                                    <td data-title="Subtotal"><span class="akasha-Price-amount amount"><span
                                                                class="akasha-Price-currencySymbol"></span>0</span>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr class="cart-subtotal">
                                                <th>Phí ship</th>
                                                <td data-title="Subtotal"><span class="akasha-Price-amount amount"><span
                                                            class="akasha-Price-currencySymbol"></span>0</span>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Tổng</th>
                                                @php
                                                    $cart = session('cart');
                                                @endphp
                                                @if (isset($cart) && is_array($cart))
                                                    <td data-title="Total"><strong><span
                                                                class="akasha-Price-amount amount"><span
                                                                    class="akasha-Price-currencySymbol"></span>{{ number_format($tong) }}</span></strong>
                                                    </td>
                                                @else
                                                    <td data-title="Total"><strong><span
                                                                class="akasha-Price-amount amount"><span
                                                                    class="akasha-Price-currencySymbol"></span>0</span></strong>
                                                    </td>
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>
                                    {{-- <form action="{{ route('route_FrontEnd_Checkout') }}" method="get"> --}}
                                    {{-- <button class="btn btn-block btn-info font-weight-bold my-3 py-3">Thanh toán</button> --}}
                                    <div class="akasha-proceed-to-checkout">
                                        <a href="{{ route('route_FrontEnd_Checkout') }}"
                                            class="checkout-button button alt akasha-forward">
                                            Tiến hành thanh toán</a>
                                        {{-- <button type="submit" class="checkout-button button alt akasha-forward">Tiến
                                                hành thanh toán</button> --}}
                                    </div>
                                    {{-- </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
