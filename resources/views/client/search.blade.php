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
                <div class='col-sm-6 col-md-4 col-lg-3'>
                    <div class='box'>
                        <a class='nav-link' href=''>
                            <div class='img-box'>

                                <img src='$row[hinhanh1]' alt=''>
                            </div>
                            <h6>
                                <br>
                            </h6>

                            {{-- //giá cũ --}}
                            <div class='detail-box'>

                                <h6>
                                    ₫
                                    <span>
                                        <strike><br>
                                        </strike>
                                    </span>
                                </h6>


                                {{-- //giá mới --}}
                                <h6>
                                    ₫
                                    <span>
                                        <br>
                                    </span>
                                </h6>
                            </div>
                            <div class='detail-box'>
                                <span>
                                    Đã mua: <br>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
