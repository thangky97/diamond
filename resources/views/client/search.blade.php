@extends('layouts.client.master')

@section('title', 'Tìm kiếm')

@section('content')

    <section class='shop_section layout_padding'>

        <div class='container'>
            <div class='heading_container heading_center'>
                <h2>
                    Kết quả tìm kiếm sản phẩm
                </h2>
            </div>

            <div class='row'>
                @foreach ($listProduct as $item)
                    <div class='col-sm-6 col-md-4 col-lg-3'>
                        <div class='box'>
                            <a class='nav-link' href="{{ route('route_FrontEnd_Product_Detail', ['id' => $item->id]) }}">
                                <div class='img-box'>

                                    <img src="{{ asset($item->image) ? '' . Storage::url($item->image) : $item->name }}"
                                        alt=''>

                                </div>
                                <h6>
                                    {{ $item->name }}<br>
                                </h6>

                                {{-- //giá cũ --}}
                                <div class='detail-box'>
                                    <h6>
                                        <span>
                                            <strike>
                                                {{ number_format($item->price) }} <br>
                                            </strike>
                                        </span>
                                    </h6>


                                    {{-- //giá mới --}}
                                    <h6>
                                        {{ number_format($item->price - $item->discount) }}
                                        <span>
                                            <br>
                                        </span>
                                    </h6>
                                </div>
                                <div class='detail-box'>
                                    <span>
                                        Đã mua: {{ $item->luotmua }}<br>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
