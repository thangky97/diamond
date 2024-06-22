@extends('layouts.client.master')

@section('title', 'Bất động sản')

@section('content')

    {{-- <div class="banner-wrapper has_background">
        <img src="{{ asset('client/assets/images/banner-for-all2.jpg') }}"
            class="img-responsive attachment-1920x447 size-1920x447" alt="img">
        <div class="banner-wrapper-inner">
            <h1 class="page-title">Sản phẩm</h1>
        </div>
    </div> --}}
    <div class="main-container shop-page left-sidebar" style="padding-top: 140px">
        <div class="container">
            <div class="row">
                <div class="main-content col-xl-9 col-lg-8 col-md-8 col-sm-12 has-sidebar">
                    <div class="shop-control shop-before-control">
                        <form class="akasha-ordering" method="get">
                            <select title="product_cat" name="orderby" class="orderby">
                                <option value="menu_order" selected="selected">Default sorting</option>
                                <option value="popularity">Sort by popularity</option>
                                <option value="rating">Sort by average rating</option>
                                <option value="date">Sort by latest</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                        </form>
                        <form class="per-page-form">
                            <label>
                                <select class="option-perpage">
                                    <option value="12" selected="">
                                        Show 12
                                    </option>
                                    <option value="5">
                                        Show 05
                                    </option>
                                    <option value="10">
                                        Show 10
                                    </option>
                                    <option value="12">
                                        Show 12
                                    </option>
                                    <option value="15">
                                        Show 15
                                    </option>
                                    <option value="20">
                                        Show All
                                    </option>
                                </select>
                            </label>
                        </form>
                    </div>
                    <div class=" auto-clear equal-container better-height akasha-products">
                        <ul class="row products columns-3">
                            @foreach ($products as $product)
                                <li class="product-item wow fadeInUp product-item rows-space-30 col-bg-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-ts-6 style-01 post-24 product type-product status-publish has-post-thumbnail product_cat-chair product_cat-table product_cat-new-arrivals product_tag-light product_tag-hat product_tag-sock first instock featured shipping-taxable purchasable product-type-variable has-default-attributes"
                                    data-wow-duration="1s" data-wow-delay="0ms" data-wow="fadeInUp">
                                    <div class="product-inner tooltip-left">
                                        <div class="product-thumb">
                                            <a class="thumb-link"
                                                href="{{ route('route_FrontEnd_Product_Detail', ['id' => $product->id]) }}">
                                                <img class="img-responsive" style="height: 180px"
                                                    src="{{ asset($product->image) ? '' . Storage::url($product->image) : $product->name }}"
                                                    alt="{{ $product->name }}" width="600" height="778">
                                            </a>
                                            <div class="flash">
                                                @if ($product->discount)
                                                    @php
                                                        $discountPercentage =
                                                            ($product->discount / $product->price) * 100;
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
                                                        <input type="hidden" name="discount"
                                                            value="{{ $product->discount }}">
                                                        <input type="hidden" name="image" value="{{ $product->image }}">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="product-info equal-elem">
                                            <h3 class="product-name product_title">
                                                <a
                                                    href="{{ route('route_FrontEnd_Product_Detail', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                            </h3>
                                            <span class="price">
                                                @if ($product->discount)
                                                    <del><span class="akasha-Price-amount amount"><span
                                                                class="akasha-Price-currencySymbol"></span>{{ number_format($product->discount) }}</span></del>
                                                @endif
                                                <ins><span class="akasha-Price-amount amount"><span
                                                            class="akasha-Price-currencySymbol"></span>{{ number_format($product->price - $product->discount) }}</span></ins>
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="shop-control shop-after-control">
                        <nav class="akasha-pagination">
                            <span class="page-numbers current">1</span>
                            <a class="page-numbers" href="#">2</a>
                            <a class="next page-numbers" href="#">Next</a>
                        </nav>
                        <p class="akasha-result-count">Showing 1–12 of 20 results</p>
                    </div>
                </div>
                <div class="sidebar col-xl-3 col-lg-4 col-md-4 col-sm-12">
                    <div id="widget-area" class="widget-area shop-sidebar">
                        <div id="akasha_product_search-2" class="widget akasha widget_product_search">
                            <form class="akasha-product-search">
                                <input id="akasha-product-search-field-0" class="search-field"
                                    placeholder="Search products…" value="" name="s" type="search">
                                <button type="submit" value="Search">Search</button>
                            </form>
                        </div>
                        <div id="akasha_layered_nav-6" class="widget akasha widget_layered_nav akasha-widget-layered-nav">
                            <h2 class="widgettitle"><a href="{{ route('route_FrontEnd_Product') }}">Danh mục</a><span
                                    class="arrow"></span></h2>
                            <ul class="akasha-widget-layered-nav-list">
                                @foreach ($categoryProduct as $cate)
                                    <li class="akasha-widget-layered-nav-list__item akasha-layered-nav-term ">
                                        <a rel="nofollow"
                                            href="{{ route('route_FrontEnd_Category', ['id' => $cate->id]) }}">{{ $cate->name }}</a>
                                        {{-- <span class="count">(1)</span> --}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!-- .widget-area -->
                </div>
            </div>
        </div>
    </div>

@endsection
