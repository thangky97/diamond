@extends('layouts.client.master')

@section('title', 'Chi tiết sản phẩm')

@section('content')

    <section class='client_section layout_padding'>
        <div class='container'>
            <div class='heading_container heading_center'>
                <h2>
                    {{ $product->name }}
                </h2>
            </div>
        </div>
        <div class='container px-0'>
            <div id='customCarousel2' class='carousel  carousel-fade' data-ride='carousel'>
                <div class='carousel-inner'>
                    <div class='carousel-item active'>
                        <div class='box'>
                            <div class='client_info'>
                                <div class='client_name'>
                                    <h5>

                                    </h5>
                                    <h6>

                                    </h6>
                                </div>
                                <i class='fa fa-quote-left' aria-hidden='true'></i>
                            </div>
                            <img class='coihang'
                                src="{{ asset($product->image) ? '' . Storage::url($product->image) : $product->name }}">
                        </div>
                    </div>
                    <div class='carousel-item'>
                        <div class='box'>
                            <div class='client_info'>
                                <div class='client_name'>
                                    <h5>

                                    </h5>
                                    <h6>

                                    </h6>
                                </div>
                                <i class='fa fa-quote-left' aria-hidden='true'></i>
                            </div>
                            <img class='coihang'
                                src="{{ asset($product->image1) ? '' . Storage::url($product->image1) : $product->name }}">
                        </div>
                    </div>
                    <div class='carousel-item'>
                        <div class='box'>
                            <div class='client_info'>
                                <div class='client_name'>
                                    <h5>

                                    </h5>
                                    <h6>

                                    </h6>
                                </div>
                                <i class='fa fa-quote-left' aria-hidden='true'></i>
                            </div>
                            <img class='coihang'
                                src="{{ asset($product->image2) ? '' . Storage::url($product->image2) : $product->name }}">
                        </div>
                    </div>

                </div>
                <div class='carousel_btn-box'>
                    <a class='carousel-control-prev' href='#customCarousel2' role='button' data-slide='prev'>
                        <i class='fa fa-angle-left' aria-hidden='true'></i>
                        <span class='sr-only'>Previous</span>
                    </a>
                    <a class='carousel-control-next' href='#customCarousel2' role='button' data-slide='next'>
                        <i class='fa fa-angle-right' aria-hidden='true'></i>
                        <span class='sr-only'>Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <header id='san_pham'>
        <div class='mua'>
            <h3 class='gia'> {{ number_format($product->price) }} vnđ</h3>
            {{-- <p class='ts'>Màu sắc:</p> --}}

            {{-- <div class='bxcolor'>
                <label>
                    <button onclick={changeMauSac('Trắng')} onclick='toggleSelected(this)'>Trắng </button>
                </label>
                </divS <div class='bxcolor'>
                <label>
                    <button onclick={changeMauSac('Đen')} onclick='toggleSelected(this)'> Đen </button>
                </label>
            </div> --}}

            {{-- <p class='ts'>Size:</p>
            <div class='bx box3'><input type='button' value='size S' onclick={changeSize('S')}></div>
            <div class='bx box4'><input type='button' value='size M' onclick={changeSize('M')}></div>
            <div class='bx box5'><input type='button' value='size L' onclick={changeSize('L')}></div>
            <div class='bx box6'><input type='button' value='size XL' onclick={changeSize('XL')}></div>
            <div class='bx box6'><input type='button' value='size XXL' onclick={changeSize('XXL')}></div> --}}



            <div class='so_luong'>
                <p class='ts'>Số lượng:</p>
                <button class='bs' onclick='changeQuantity(-1)'>-</button>
                <p type="number" name="amount" min="1" value="1">1</p>
                <button class='bs' onclick='changeQuantity(1)'>+</button>
            </div>
            <div>
                <form action="{{ route('route_FrontEnd_Add_Cart') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <button class='them'>
                        Thêm vào giỏ hàng
                    </button>
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="hidden" name="discount" value="{{ $product->discount }}">
                    <input type="hidden" name="image" value="{{ $product->image }}">
                </form>
            </div>
        </div>
        <div class='mo_ta'>
            <h3>Thông tin</h3>
            <p></p>
            <p>{!! $product->description !!}</p>
    </header>

    <!-- bình luận đánh giá sản phẩm -->
    <section class='client_section layout_padding'>
        <div class='container'>
            <div class='heading_container heading_center'>
                <h2>Đánh giá từ khách hàng</h2>
            </div>
        </div>
        </div>
        <form action='#' method='post' class='form-inline'>
            <input class='input_danh_gia' type='text' value='' placeholder='Nhận xét của bạn' name='danhgia'
                id='danhgia' style='font-size: 80%; width: 70%; height: 50px'>
            <button class='btn nav_search-btn' type='submit' <i class='fa fa-search' aria-hidden='true'></i>
            </button>
        </form>
    </section>

    </div>

@endsection
