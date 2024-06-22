@extends('layouts.client.master')

@section('title', 'Thanh toán')

@section('content')

    <main class="site-main main-container no-sidebar" style="padding-top: 140px">
        <div class="container">
            <div class="row">
                <div class="main-content col-md-12">
                    <div class="page-main-content">
                        <div class="akasha">
                            <form name="checkout" method="post" class="checkout akasha-checkout"
                                action="{{ route('route_FrontEnd_Create_Checkout') }}" enctype="multipart/form-data"
                                novalidate="novalidate">
                                @csrf
                                <div class="col2-set" id="customer_details">
                                    <div class="col-1">
                                        <div class="akasha-billing-fields">
                                            <h3>Thông tin đơn hàng</h3>
                                            @if (Session::get('user_profile'))
                                                @foreach (Session::get('user_profile') as $user)
                                                    <div class="akasha-billing-fields__field-wrapper">
                                                        <p class="form-row form-row-wide validate-required"
                                                            id="billing_first_name_field" data-priority="10"><label
                                                                for="billing_first_name" class="">Họ&nbsp;<abbr
                                                                    class="required" title="required">*</abbr></label><span
                                                                class="akasha-input-wrapper"><input type="text"
                                                                    class="input-text " name="firstName"
                                                                    id="billing_first_name" placeholder=""
                                                                    value="{{ $user['firstName'] }}" required>
                                                                @error('firstName')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </span>
                                                        </p>
                                                        <p class="form-row form-row-wide validate-required"
                                                            id="billing_last_name_field" data-priority="20"><label
                                                                for="billing_last_name" class="">Tên&nbsp;<abbr
                                                                    class="required" title="required">*</abbr></label><span
                                                                class="akasha-input-wrapper"><input type="text"
                                                                    class="input-text " name="lastname"
                                                                    id="billing_last_name" placeholder=""
                                                                    value="{{ $user['lastname'] }}" required>
                                                                @error('lastname')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </span>
                                                        </p>
                                                        <p class="form-row form-row-wide validate-required validate-email"
                                                            id="billing_email_field" data-priority="110"><label
                                                                for="billing_email" class="">Email
                                                                &nbsp;<abbr class="required"
                                                                    title="required">*</abbr></label><span
                                                                class="akasha-input-wrapper"><input type="email"
                                                                    class="input-text " name="email" id="billing_email"
                                                                    placeholder="" value="{{ $user['email'] }}"
                                                                    required></span>
                                                            @error('email')
                                                            <div>
                                                                <p class="text-danger">{{ $message }}</p>
                                                            </div>
                                                        @enderror
                                                        </p>
                                                        <p class="form-row form-row-wide validate-required validate-phone"
                                                            id="billing_phone_field" data-priority="100"><label
                                                                for="billing_phone" class="">Số điện thoại&nbsp;<abbr
                                                                    class="required" title="required">*</abbr></label><span
                                                                class="akasha-input-wrapper"><input type="number"
                                                                    class="input-text " name="phone" id="billing_phone"
                                                                    placeholder="" value="{{ $user['phone'] }}"
                                                                    required></span>
                                                            @error('phone')
                                                            <div>
                                                                <p class="text-danger">{{ $message }}</p>
                                                            </div>
                                                        @enderror
                                                        </p>
                                                        <p class="form-row form-row-wide adchair-field validate-required"
                                                            id="billing_adchair_1_field" data-priority="50"><label
                                                                for="billing_adchair_1" class="">Địa chỉ&nbsp;<abbr
                                                                    class="required" title="required">*</abbr></label><span
                                                                class="akasha-input-wrapper"><input type="text"
                                                                    class="input-text " name="address"
                                                                    id="billing_adchair_1" placeholder="Địa chỉ"
                                                                    value="{{ $user['address'] }}" required></span>
                                                            @error('address')
                                                            <div>
                                                                <p class="text-danger">{{ $message }}</p>
                                                            </div>
                                                        @enderror
                                                        </p>
                                                        <p class="form-row notes" id="order_comments_field"
                                                            data-priority="">
                                                            <label for="order_comments" class="">Ghi
                                                                chú&nbsp;</label><span class="akasha-input-wrapper">
                                                                <textarea name="note" class="input-text " id="order_comments" placeholder="" rows="1" cols="2"></textarea>
                                                            </span>
                                                        </p>
                                                    </div>
                                                @endforeach
                                            @endif
                                            @if (!isset($user))
                                                <div class="akasha-billing-fields__field-wrapper">
                                                    <p class="form-row form-row-first validate-required"
                                                        id="billing_first_name_field" data-priority="10"><label
                                                            for="billing_first_name" class="">Họ&nbsp;<abbr
                                                                class="required" title="required">*</abbr></label><span
                                                            class="akasha-input-wrapper"><input type="text"
                                                                class="input-text " name="firstName"
                                                                id="billing_first_name" placeholder="" required></span>
                                                        @error('firstName')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                    </p>
                                                    <p class="form-row form-row-last validate-required"
                                                        id="billing_last_name_field" data-priority="20"><label
                                                            for="billing_last_name" class="">Tên&nbsp;<abbr
                                                                class="required" title="required">*</abbr></label><span
                                                            class="akasha-input-wrapper"><input type="text"
                                                                class="input-text " name="lastname"
                                                                id="billing_last_name" required></span>
                                                        @error('lastname')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                    </p>
                                                    <p class="form-row form-row-wide validate-required validate-email"
                                                        id="billing_email_field" data-priority="110"><label
                                                            for="billing_email" class="">Email
                                                            &nbsp;<abbr class="required"
                                                                title="required">*</abbr></label><span
                                                            class="akasha-input-wrapper"><input type="email"
                                                                class="input-text " name="email" id="billing_email"
                                                                placeholder="" required></span>
                                                        @error('email')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                    </p>
                                                    <p class="form-row form-row-wide validate-required validate-phone"
                                                        id="billing_phone_field" data-priority="100"><label
                                                            for="billing_phone" class="">Số điện thoại&nbsp;<abbr
                                                                class="required" title="required">*</abbr></label><span
                                                            class="akasha-input-wrapper"><input type="number"
                                                                class="input-text " name="phone" id="billing_phone"
                                                                placeholder="" required></span>
                                                        @error('phone')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                    </p>
                                                    <p class="form-row form-row-wide adchair-field validate-required"
                                                        id="billing_adchair_1_field" data-priority="50"><label
                                                            for="billing_adchair_1" class="">Địa chỉ&nbsp;<abbr
                                                                class="required" title="required">*</abbr></label><span
                                                            class="akasha-input-wrapper"><input type="text"
                                                                class="input-text " name="address" id="billing_adchair_1"
                                                                placeholder="Địa chỉ" required></span>
                                                        @error('address')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                    </p>
                                                    <p class="form-row notes" id="order_comments_field" data-priority="">
                                                        <label for="order_comments" class="">Ghi
                                                            chú&nbsp;</label><span class="akasha-input-wrapper">
                                                            <textarea name="note" class="input-text " id="order_comments" placeholder="" rows="1" cols="2"></textarea>
                                                        </span>
                                                    </p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <h3 id="order_review_heading">Đơn hàng</h3>
                                <div id="order_review" class="akasha-checkout-review-order">
                                    <table class="shop_table akasha-checkout-review-order-table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Sản phẩm</th>
                                                <th class="product-total">Giá</th>
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
                                                    <tr class="cart_item">
                                                        <td class="product-name">
                                                            {{ $item[2] }}&nbsp;&nbsp; <strong
                                                                class="product-quantity">×
                                                                {{ $item[4] }}</strong></td>
                                                        <td class="product-total">
                                                            <span class="akasha-Price-amount amount"><span
                                                                    class="akasha-Price-currencySymbol"></span>{{ number_format($item[6]) }}</span>
                                                        </td>
                                                    </tr>
                                                @endfor
                                            @endif
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Tạm tính</th>
                                                @php
                                                    $cart = session('cart');
                                                @endphp
                                                @if (isset($cart) && is_array($cart))
                                                    <td data-title="Subtotal"><span
                                                            class="akasha-Price-amount amount"><span
                                                                class="akasha-Price-currencySymbol"></span>{{ number_format($tong) }}</span>
                                                    </td>
                                                @else
                                                    <td data-title="Subtotal"><span
                                                            class="akasha-Price-amount amount"><span
                                                                class="akasha-Price-currencySymbol"></span>0</span>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr class="order-total">
                                                <th>Tổng</th>
                                                @php
                                                    $cart = session('cart');
                                                @endphp
                                                @if (isset($cart) && is_array($cart))
                                                    <td data-title="Subtotal"><span
                                                            class="akasha-Price-amount amount"><span
                                                                class="akasha-Price-currencySymbol"></span>{{ number_format($tong) }}</span>
                                                    </td>
                                                @else
                                                    <td><strong><span class="akasha-Price-amount amount"><span
                                                                    class="akasha-Price-currencySymbol"></span>0</span></strong>
                                                    </td>
                                                @endif

                                            </tr>
                                        </tfoot>
                                    </table>
                                    <input type="hidden" name="lang" value="en">
                                    <div id="payment" class="akasha-checkout-payment">
                                        <ul class="wc_payment_methods payment_methods methods">
                                            <li class="wc_payment_method payment_method_cod">
                                                <input id="payment_method_cod" type="radio" class="input-radio"
                                                    name="payment_type" value="offline" data-order_button_text="">
                                                <label for="payment_method_cod">
                                                    Tiền mặt </label>
                                                <div class="payment_box payment_method_cod" style="display:none;">
                                                    <p>Nhận hàng và thanh toán</p>
                                                </div>
                                            </li>
                                            <li class="wc_payment_method payment_method_bacs">
                                                <input id="payment_method_bacs" type="radio" class="input-radio"
                                                    name="payment_type" value="online" data-order_button_text="">
                                                <label for="payment_method_bacs">
                                                    Chuyển khoản </label>
                                                <div class="payment_box payment_method_bacs">
                                                    <p>STK: 00008888</p>
                                                    <p>Ngân hàng: MB</p>
                                                    <p>Chủ tài khoản: NGUYEN PHONG TAN LOC</p>
                                                </div>
                                            </li>
                                            @error('payment_type')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </ul>
                                        <div class="form-row place-order">
                                            <div class="akasha-terms-and-conditions-wrapper">
                                                <div class="akasha-privacy-policy-text">
                                                    <p> <a href="#" class="akasha-privacy-policy-link"
                                                            target="_blank">Đọc kĩ hướng dẫn và điều khoản của chúng
                                                            tôi</a>.</p>
                                                </div>
                                            </div>
                                            <button type="submit" class="button alt" name="akasha_checkout_place_order"
                                                id="place_order" value="Place order" data-value="Place order">Thanh toán
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection
