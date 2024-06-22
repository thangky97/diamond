@extends('layouts.client.master')

@section('title', 'Trang chủ')

@section('content')

    <div class="fullwidth-template">
        <div class="slide-home-01">
            <div class="response-product product-list-owl owl-slick equal-container better-height"
                data-slick="{&quot;arrows&quot;:false,&quot;slidesMargin&quot;:0,&quot;dots&quot;:true,&quot;infinite&quot;:false,&quot;speed&quot;:300,&quot;slidesToShow&quot;:1,&quot;rows&quot;:1}"
                data-responsive="[{&quot;breakpoint&quot;:480,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;0&quot;}},{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;0&quot;}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;0&quot;}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;0&quot;}},{&quot;breakpoint&quot;:1500,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;0&quot;}}]">
                <div class="slide-wrap">
                    <img src="{{ asset('client/assets/images/banner1.jpg') }}" alt="image">
                    <div class="slide-info">
                        <div class="container">
                            <div class="slide-inner">
                                <h5>Limited Colletion</h5>
                                <h1>Dreamy</h1>
                                <h2>& Lovely</h2>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide-wrap">
                    <img src="{{ asset('client/assets/images/banner2.jpg') }}" alt="image">
                    <div class="slide-info">
                        <div class="container">
                            <div class="slide-inner">
                                <h5>Best Selling</h5>
                                <h1><span>Glamorous</h1>
                                <h2>& Cute</h2>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-001">
            <div class="container">
                <div class="akasha-heading style-01">
                    <div class="heading-inner">
                        <h3 class="title">Bất động sản mới nhất</h3>
                    </div>
                </div>
                <div class="akasha-products style-02">
                    <div class="response-product product-list-owl owl-slick equal-container better-height"
                        data-slick="{&quot;arrows&quot;:false,&quot;slidesMargin&quot;:30,&quot;dots&quot;:true,&quot;infinite&quot;:false,&quot;speed&quot;:300,&quot;slidesToShow&quot;:4,&quot;rows&quot;:2}"
                        data-responsive="[{&quot;breakpoint&quot;:480,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1500,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesMargin&quot;:&quot;30&quot;}}]">

                        @foreach ($listProduct as $product)
                            <div
                                class="product-item recent-product style-01 rows-space-30 post-36 product type-product status-publish has-post-thumbnail product_cat-table product_cat-bed product_tag-light product_tag-table product_tag-sock  instock sale shipping-taxable purchasable product-type-simple">
                                <div class="product-inner tooltip-left">
                                    <div class="product-thumb">
                                        <a class="thumb-link"
                                            href="{{ route('route_FrontEnd_Product_Detail', ['id' => $product->id]) }}"
                                            tabindex="0">
                                            <img class="img-responsive" style="height: 180px"
                                                src="{{ asset($product->image) ? '' . Storage::url($product->image) : $product->name }}"
                                                alt="{{ $product->name }}" width="270" height="350">
                                        </a>
                                        <div class="flash">
                                            @if ($product->discount)
                                                @php
                                                    $discountPercentage = ($product->discount / $product->price) * 100;
                                                @endphp
                                                <span class="onsale"><span
                                                        class="number">{{ round($discountPercentage, 2) }}%</span></span>
                                            @endif
                                            <span class="onnew"><span class="text">New</span></span>
                                        </div>
                                        <div class="group-button">
                                            <form action="{{ route('route_FrontEnd_Add_Cart') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="add-to-cart">
                                                    <button class="button product_type_simple add_to_cart_button">Cart<i
                                                            class="fa fa-cart"></i></button>
                                                    <input type="hidden" name="amount" value="1">
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                                    <input type="hidden" name="discount" value="{{ $product->discount }}">
                                                    <input type="hidden" name="image" value="{{ $product->image }}">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="product-info equal-elem">
                                        <h3 class="product-name product_title">
                                            <a href="{{ route('route_FrontEnd_Product_Detail', ['id' => $product->id]) }}"
                                                tabindex="-1">{{ $product->name }}</a>
                                        </h3>
                                        {{-- <div class="rating-wapper nostar">
                                        <div class="star-rating"><span style="width:0%">Rated <strong
                                                    class="rating">0</strong> out of 5</span></div>
                                        <span class="review">(0)</span>
                                    </div> --}}
                                        <span class="price">
                                            @if ($product->discount)
                                                <del><span class="akasha-Price-amount amount"><span
                                                            class="akasha-Price-currencySymbol"></span>{{ number_format($product->discount) }}</span></del>
                                            @endif
                                            <ins><span class="akasha-Price-amount amount"><span
                                                        class="akasha-Price-currencySymbol"></span>{{ number_format($product->price) }}</span></ins>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="akasha-banner style-02 left-center">
                <div class="banner-inner">
                    <figure class="banner-thumb">
                        <img src="{{ asset('client/assets/images/banner101.jpg') }}" class="attachment-full size-full"
                            alt="img">
                    </figure>
                    <div class="banner-info container">
                        <div class="banner-content">
                            <div class="title-wrap">
                                <div class="banner-label">
                                    Ngày lễ ưu đãi
                                </div>
                                <h6 class="title">
                                    Đại tiệc giảm giá </h6>
                            </div>
                            <div class="button-wrap">
                                <div class="subtitle">
                                    Lorem ipsum dolor sit amet consectetur adipiscing elit justo
                                </div>
                                <a class="button" target="_self" href="#"><span>Mua ngay</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-001">
            <div class="container">
                <div class="akasha-heading style-01">
                    <div class="heading-inner">
                        <h3 class="title">Bất động sản khuyến mại</h3>
                    </div>
                </div>
                <div class="akasha-products style-01">
                    <div class="response-product product-list-owl owl-slick equal-container better-height"
                        data-slick="{&quot;arrows&quot;:true,&quot;slidesMargin&quot;:30,&quot;dots&quot;:true,&quot;infinite&quot;:false,&quot;speed&quot;:300,&quot;slidesToShow&quot;:4,&quot;rows&quot;:1}"
                        data-responsive="[{&quot;breakpoint&quot;:480,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1500,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesMargin&quot;:&quot;30&quot;}}]">
                        @foreach ($productDiscount as $proDisc)
                            <div
                                class="product-item recent-product style-01 rows-space-0 post-36 product type-product status-publish has-post-thumbnail product_cat-table product_cat-bed product_tag-light product_tag-table product_tag-sock  instock sale shipping-taxable purchasable product-type-simple">
                                <div class="product-inner tooltip-left">
                                    <div class="product-thumb">
                                        <a class="thumb-link"
                                            href="{{ route('route_FrontEnd_Product_Detail', ['id' => $proDisc->id]) }}"
                                            tabindex="-1">
                                            <img class="img-responsive" style="height: 180px"
                                                src="{{ asset($proDisc->image) ? '' . Storage::url($proDisc->image) : $proDisc->name }}"
                                                alt="{{ $proDisc->name }}" width="270" height="350">
                                        </a>
                                        <div class="flash">
                                            @if ($proDisc->discount)
                                                @php
                                                    $discountPercentage = ($proDisc->discount / $proDisc->price) * 100;
                                                @endphp
                                                <span class="onsale"><span
                                                        class="number">{{ round($discountPercentage, 2) }}%</span></span>
                                            @endif
                                            <span class="onnew"><span class="text">New</span></span>
                                        </div>
                                        <div class="group-button">
                                            <form action="{{ route('route_FrontEnd_Add_Cart') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="add-to-cart">
                                                    <button class="button product_type_simple add_to_cart_button">Cart<i
                                                            class="fa fa-cart"></i></button>
                                                    <input type="hidden" name="amount" value="1">
                                                    <input type="hidden" name="id" value="{{ $proDisc->id }}">
                                                    <input type="hidden" name="name" value="{{ $proDisc->name }}">
                                                    <input type="hidden" name="price" value="{{ $proDisc->price }}">
                                                    <input type="hidden" name="discount"
                                                        value="{{ $proDisc->discount }}">
                                                    <input type="hidden" name="image" value="{{ $proDisc->image }}">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="product-info equal-elem">
                                        <h3 class="product-name product_title">
                                            <a href="{{ route('route_FrontEnd_Product_Detail', ['id' => $proDisc->id]) }}"
                                                tabindex="-1">{{ $proDisc->name }}</a>
                                        </h3>
                                        <span class="price">
                                            @if ($proDisc->discount)
                                                <del><span class="akasha-Price-amount amount"><span
                                                            class="akasha-Price-currencySymbol"></span>{{ number_format($proDisc->discount) }}</span></del>
                                            @endif
                                            <ins><span class="akasha-Price-amount amount"><span
                                                        class="akasha-Price-currencySymbol"></span>{{ number_format($proDisc->price) }}</span></ins>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="section-038">
            <div class="akasha-banner style-07 left-center">
                <div class="banner-inner">
                    <figure class="banner-thumb">
                        <img src="{{ asset('client/assets/images/banner28.jpg') }}" class="attachment-full size-full"
                            alt="img">
                    </figure>
                    <div class="banner-info container">
                        <div class="banner-content">
                            <div class="title-wrap">
                                <div class="banner-label">
                                    30/4 - 1/5
                                </div>
                                <h6 class="title">
                                    Mới </h6>
                            </div>
                            <div class="cate">
                                Giảm tới 10%
                            </div>
                            <div class="button-wrap">
                                <div class="subtitle">
                                    Mus venenatis habitasse leo malesuada lacus commodo faucibus torquent donec
                                </div>
                                <a class="button" target="_self" href="#"><span>Mua ngay</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-001">
            <div class="container">
                <div class="akasha-heading style-01">
                    <div class="heading-inner">
                        <h3 class="title">
                            Tin tức </h3>
                    </div>
                </div>
                <div class="akasha-blog style-01">
                    <div class="blog-list-owl owl-slick equal-container better-height"
                        data-slick="{&quot;arrows&quot;:false,&quot;slidesMargin&quot;:30,&quot;dots&quot;:true,&quot;infinite&quot;:false,&quot;speed&quot;:300,&quot;slidesToShow&quot;:3,&quot;rows&quot;:1}"
                        data-responsive="[{&quot;breakpoint&quot;:480,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1500,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;30&quot;}}]">
                        @foreach ($news as $new)
                            <article
                                class="post-item post-grid rows-space-0 post-195 post type-post status-publish format-standard has-post-thumbnail hentry category-light category-table category-life-style tag-light tag-life-style">
                                <div class="post-inner blog-grid">
                                    <div class="post-thumb">
                                        <a href="{{ route('route_FrontEnd_News_Detail', ['id' => $new->id]) }}"
                                            tabindex="0">
                                            <img src="{{ asset($new->images) ? '' . Storage::url($new->images) : $new->title }}"
                                                class="img-responsive attachment-370x330 size-370x330"
                                                alt="{{ $new->title }}" width="370" height="330"
                                                style="height: 250px"> </a>
                                        <a class="datebox" href="#" tabindex="0">
                                            <span>19</span>
                                            <span>Dec</span>
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <div class="post-meta">
                                            <div class="post-author">
                                                Đăng bởi:<a href="#" tabindex="0">
                                                    {{ $new->admin->username }}</a>
                                            </div>
                                            {{-- <div class="post-comment-icon">
                                            <a href="#" tabindex="0">
                                                0 </a>
                                        </div> --}}
                                        </div>
                                        <div class="post-info equal-elem">
                                            <h2 class="post-title"><a
                                                    href="{{ route('route_FrontEnd_News_Detail', ['id' => $new->id]) }}"
                                                    tabindex="0">{{ $new->title }}</a>
                                            </h2>
                                            {{ $new->short_desc }}
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="section-014">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="akasha-iconbox style-02">
                            <div class="iconbox-inner">
                                <div class="icon">
                                    <span class="flaticon-rocket-ship"></span>
                                </div>
                                <div class="content">
                                    <h4 class="title">Worldwide Delivery</h4>
                                    <div class="desc">With sites in 5 languages, we ship to over 200 countries &amp;
                                        regions.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="akasha-iconbox style-02">
                            <div class="iconbox-inner">
                                <div class="icon">
                                    <span class="flaticon-padlock"></span>
                                </div>
                                <div class="content">
                                    <h4 class="title">Safe Shipping</h4>
                                    <div class="desc">Pay with the world’s most popular and secure payment methods.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="akasha-iconbox style-02">
                            <div class="iconbox-inner">
                                <div class="icon">
                                    <span class="flaticon-recycle"></span>
                                </div>
                                <div class="content">
                                    <h4 class="title">365 Days Return</h4>
                                    <div class="desc">Round-the-clock assistance for a smooth shopping experience.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="akasha-iconbox style-02">
                            <div class="iconbox-inner">
                                <div class="icon">
                                    <span class="flaticon-support"></span>
                                </div>
                                <div class="content">
                                    <h4 class="title">Shop Confidence</h4>
                                    <div class="desc">Our Buyer Protection covers your purchase from click to
                                        delivery.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-008">
            <div class="akasha-instagram style-01">
                <div class="instagram-owl owl-slick"
                    data-slick="{&quot;arrows&quot;:false,&quot;slidesMargin&quot;:15,&quot;dots&quot;:false,&quot;infinite&quot;:false,&quot;speed&quot;:300,&quot;slidesToShow&quot;:5,&quot;rows&quot;:1}"
                    data-responsive="[{&quot;breakpoint&quot;:480,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesMargin&quot;:&quot;15&quot;}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesMargin&quot;:&quot;15&quot;}},{&quot;breakpoint&quot;:1500,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesMargin&quot;:&quot;15&quot;}}]">
                    <div class="rows-space-0">
                        <a target="_blank" href="#" class="item" tabindex="0">
                            <img class="img-responsive lazy" src="{{ asset('client/assets/images/cate1.jpg') }}"
                                alt="Home 01">
                        </a>
                    </div>
                    <div class="rows-space-0">
                        <a target="_blank" href="#" class="item" tabindex="0">
                            <img class="img-responsive lazy" src="{{ asset('client/assets/images/cate2.jpg') }}"
                                alt="Home 01">
                        </a>
                    </div>
                    <div class="rows-space-0">
                        <a target="_blank" href="#" class="item" tabindex="0">
                            <img class="img-responsive lazy" src="{{ asset('client/assets/images/cate3.jpg') }}"
                                alt="Home 01">
                        </a>
                    </div>
                    <div class="rows-space-0">
                        <a target="_blank" href="#" class="item" tabindex="0">
                            <img class="img-responsive lazy" src="{{ asset('client/assets/images/cate4.jpg') }}"
                                alt="Home 01">
                        </a>
                    </div>
                    <div class="rows-space-0">
                        <a target="_blank" href="#" class="item" tabindex="0">
                            <img class="img-responsive lazy" src="{{ asset('client/assets/images/cate5.jpg') }}"
                                alt="Home 01">
                        </a>
                    </div>
                    <div class="rows-space-0">
                        <a target="_blank" href="#" class="item" tabindex="-1">
                            <img class="img-responsive lazy" src="{{ asset('client/assets/images/cate6.jpg') }}"
                                alt="Home 01">
                        </a>
                    </div>
                    <div class="rows-space-0">
                        <a target="_blank" href="#" class="item" tabindex="-1">
                            <img class="img-responsive lazy" src="{{ asset('client/assets/images/cate7.jpg') }}"
                                alt="Home 01">
                        </a>
                    </div>
                    <div class="rows-space-0">
                        <a target="_blank" href="#" class="item" tabindex="-1">
                            <img class="img-responsive lazy" src="{{ asset('client/assets/images/cate8.jpg') }}"
                                alt="Home 01">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
