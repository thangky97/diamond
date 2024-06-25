@extends('layouts.client.master')

@section('title', 'Giỏ hàng')

@section('content')
    <div>
        <form action="{{ route('route_FrontEnd_Checkout') }}" method="POST">
            @csrf
            <div class="container_san_pham_da_them">
                <h2>Giỏ hàng của bạn</h2>
                <table>
                    <tr class="table_san_pham">
                        <th>Ảnh</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng cộng</th>
                    </tr>
                    @php
                        $cart = session('cart');
                        $tong = 0;
                    @endphp
                    @if ($cart)
                        @foreach ($cart as $item)
                            @php
                                $tong += $item[7];
                            @endphp
                            <tr class="table_san_pham">
                                <td><img src="{{ asset($item[1]) ? '' . Storage::url($item[1]) : $item[2] }}" alt=""
                                        width="40" height="40"></td>
                                <td>{{ $item[2] }}</td>
                                <td>{{ $item[4] }}</td>
                                <td>{{ number_format($item[6]) }}</td>
                                <td>{{ number_format($item[7]) }}</td>
                            </tr>
                        @endforeach
                    @endif
                </table>
                <button class="checkout-btn" name='them_don_hang' type="submit">Thanh toán</button>
            </div>
        </form>
    </div>
@endsection
