@extends('layouts.client.master')

@section('title', 'Trang chủ')

@section('content')

    {{-- <div class="banner-wrapper has_background">
        <img src="{{ asset('client/assets/images/banner-for-all2.jpg') }}"
            class="img-responsive attachment-1920x447 size-1920x447" alt="img">
        <div class="banner-wrapper-inner">
            <h1 class="page-title">Sản phẩm</h1>
        </div>
    </div> --}}

    <div class="main-container shop-page left-sidebar" style="padding-top: 160px">
        <div class="container">
            <div class="row">
                <div class="main-content col-xl-9 col-lg-8 col-md-8 col-sm-12 has-sidebar">
                    <div class=" auto-clear equal-container better-height akasha-products">
                        <ul class="row products columns-3">
                            @foreach ($listProduct as $product)
                                <li class="product-item product-item rows-space-20  style-01 post-28 product type-product status-publish has-post-thumbnail product_cat-light product_cat-chair product_cat-sofas product_tag-light product_tag-sock  instock sale featured shipping-taxable purchasable product-type-simple"
                                    style="width: 100%">
                                    <div class="product-inner tooltip-left" style="display: flex;">
                                        <div class="product-thumb" style="width: 350px; margin-bottom: 0px">
                                            <a class="thumb-link"
                                                href="{{ route('route_FrontEnd_Product_Detail', ['id' => $product->id]) }}">
                                                <img class="img-responsive"
                                                    src="{{ asset($product->image) ? '' . Storage::url($product->image) : $product->name }}"
                                                    alt="{{ $product->name }}" width="600" height="778"
                                                    style="border-radius: 6px">
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
                                            </div>
                                        </div>
                                        <div class="product-info equal-elem" style="margin-left: 30px; width: 50%">
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
                                            <div class="akasha-product-details__short-description">
                                                <p>{{ $product->short_desc }}</p>
                                            </div>
                                            <form class="variations_form cart"
                                                action="{{ route('route_FrontEnd_Add_Cart') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="single_variation_wrap">
                                                    <div class="akasha-variation single_variation"></div>
                                                    <div class="akasha-variation-add-to-cart variations_button">
                                                        <div class="quantity">
                                                            <span class="qty-label">Số lượng:</span>
                                                            <div class="control">
                                                                {{-- <a class="btn-number qtyminus quantity-minus" href="#">-</a> --}}
                                                                <input type="number" min="1" name="amount"
                                                                    value="1" class="input-qty input-text qty text"
                                                                    size="4">
                                                                {{-- <a class="btn-number qtyplus quantity-plus" href="#">+</a> --}}
                                                            </div>
                                                        </div>
                                                        <button
                                                            class="single_add_to_cart_button button alt akasha-variation-selection-needed">
                                                            Thêm vào giỏ hàng
                                                        </button>
                                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                                        <input type="hidden" name="name" value="{{ $product->name }}">
                                                        <input type="hidden" name="price" value="{{ $product->price }}">
                                                        <input type="hidden" name="discount"
                                                            value="{{ $product->discount }}">
                                                        <input type="hidden" name="image" value="{{ $product->image }}">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="sidebar col-xl-3 col-lg-4 col-md-4 col-sm-12">
                    <div id="widget-area" class="widget-area shop-sidebar">
                        <div id="akasha_layered_nav-6" class="widget akasha widget_layered_nav akasha-widget-layered-nav">
                            <h2 class="widgettitle"><a href="/">Danh mục</a><span class="arrow"></span></h2>
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
