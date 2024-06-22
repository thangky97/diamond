@extends('layouts.client.master')

@section('title', 'Chi tiết sản phẩm')

@section('content')

    <div class="single-thumb-vertical main-container shop-page no-sidebar" style="padding-top: 140px">
        <div class="container">
            <div class="row">
                <div class="main-content col-md-12">
                    <div class="akasha-notices-wrapper"></div>
                    <div id="product-27"
                        class="post-27 product type-product status-publish has-post-thumbnail product_cat-table product_cat-new-arrivals product_cat-lamp product_tag-table product_tag-sock first instock shipping-taxable purchasable product-type-variable has-default-attributes">
                        <div class="main-contain-summary">
                            <div class="contain-left has-gallery">
                                <div class="single-left">
                                    <div
                                        class="akasha-product-gallery akasha-product-gallery--with-images akasha-product-gallery--columns-4 images">
                                        <a href="#" class="akasha-product-gallery__trigger"></a>
                                        <div class="flex-viewport">
                                            <figure class="akasha-product-gallery__wrapper">
                                                <div class="akasha-product-gallery__image">
                                                    <img alt="img"
                                                        src="{{ asset($product->image) ? '' . Storage::url($product->image) : $product->name }}">
                                                </div>
                                                <div class="akasha-product-gallery__image">
                                                    <img src="{{ asset($product->image) ? '' . Storage::url($product->image) : $product->name }}"
                                                        alt="img">
                                                </div>
                                                <div class="akasha-product-gallery__image">
                                                    <img src="{{ asset($product->image) ? '' . Storage::url($product->image) : $product->name }}"
                                                        class="" alt="img">
                                                </div>
                                                <div class="akasha-product-gallery__image">
                                                    <img src="{{ asset($product->image) ? '' . Storage::url($product->image) : $product->name }}"
                                                        class="" alt="img">
                                                </div>
                                            </figure>
                                        </div>
                                        <ol class="flex-control-nav flex-control-thumbs">
                                            <li><img src="{{ asset($product->image) ? '' . Storage::url($product->image) : $product->name }}"
                                                    alt="img">
                                            </li>
                                            <li><img src="{{ asset($product->image) ? '' . Storage::url($product->image) : $product->name }}"
                                                    alt="img">
                                            </li>
                                            <li><img src="{{ asset($product->image) ? '' . Storage::url($product->image) : $product->name }}"
                                                    alt="img">
                                            </li>
                                            <li><img src="{{ asset($product->image) ? '' . Storage::url($product->image) : $product->name }}"
                                                    alt="img">
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                                <div class="summary entry-summary">
                                    <div class="flash">
                                        <span class="onnew"><span class="text">New</span></span>
                                    </div>
                                    <h1 class="product_title entry-title">{{ $product->name }}</h1>
                                    <p class="price">
                                        @if ($product->discount)
                                            <del><span class="akasha-Price-amount amount"><span
                                                        class="akasha-Price-currencySymbol"></span>{{ number_format($product->discount) }}</span></del>
                                        @endif <span class="akasha-Price-amount amount"><span
                                                class="akasha-Price-currencySymbol"></span>{{ number_format($product->price - $product->discount) }}</span>
                                    </p>
                                    {{-- <p class="stock in-stock">
                                        Availability: <span> In stock</span>
                                    </p> --}}
                                    <div class="akasha-product-details__short-description">
                                        <p>{{ $product->short_desc }}</p>
                                    </div>
                                    <form class="variations_form cart" action="{{ route('route_FrontEnd_Add_Cart') }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="single_variation_wrap">
                                            <div class="akasha-variation single_variation"></div>
                                            <div class="akasha-variation-add-to-cart variations_button">
                                                <div class="quantity">
                                                    <span class="qty-label">Số lượng:</span>
                                                    <div class="control">
                                                        {{-- <a class="btn-number qtyminus quantity-minus" href="#">-</a> --}}
                                                        <input type="number" min="1" name="amount" value="1"
                                                            class="input-qty input-text qty text" size="4">
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
                                                <input type="hidden" name="discount" value="{{ $product->discount }}">
                                                <input type="hidden" name="image" value="{{ $product->image }}">
                                            </div>
                                        </div>
                                    </form>
                                    <div class="akasha-share-socials">
                                        <h5 class="social-heading">Share: </h5>
                                        <a target="_blank" class="facebook" href="#">
                                            <i class="fa fa-facebook-f"></i>
                                        </a>
                                        <a target="_blank" class="twitter" href="#"><i class="fa fa-twitter"></i>
                                        </a>
                                        <a target="_blank" class="pinterest" href="#"> <i class="fa fa-pinterest"></i>
                                        </a>
                                        <a target="_blank" class="googleplus" href="#"><i
                                                class="fa fa-google-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="single-product-policy">
                                <div class="akasha-iconbox style-01">
                                    <div class="iconbox-inner">
                                        <div class="icon">
                                            <span class="flaticon-rocket-ship"></span>
                                            <span class="flaticon-rocket-ship"></span>
                                        </div>
                                        <div class="content">
                                            <h4 class="title">Fast Shipping.</h4>
                                            <div class="desc">With sites in 5 languages, we ship to over 200
                                                countries
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="akasha-iconbox style-01">
                                    <div class="iconbox-inner">
                                        <div class="icon">
                                            <span class="flaticon-padlock"></span>
                                            <span class="flaticon-padlock"></span>
                                        </div>
                                        <div class="content">
                                            <h4 class="title">Safe delivery</h4>
                                            <div class="desc">Pay with the world’s most popular, secure
                                                payment methods.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="akasha-iconbox style-01">
                                    <div class="iconbox-inner">
                                        <div class="icon">
                                            <span class="flaticon-recycle"></span>
                                            <span class="flaticon-recycle"></span>
                                        </div>
                                        <div class="content">
                                            <h4 class="title">365 Days Return</h4>
                                            <div class="desc">Round-the-clock assistance for a shopping
                                                experience.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="akasha-tabs akasha-tabs-wrapper">
                            <ul class="tabs dreaming-tabs" role="tablist">
                                <li class="description_tab active" id="tab-title-description" role="tab"
                                    aria-controls="tab-description">
                                    <a href="#tab-description">Mô tả</a>
                                </li>
                                @php
                                    $commentCount = 0;
                                @endphp
                                @foreach ($comment as $cmt)
                                    @if ($cmt->product_id == $product->id)
                                        @php
                                            $commentCount++;
                                        @endphp
                                    @endif
                                @endforeach
                                <li class="reviews_tab" id="tab-title-reviews" role="tab"
                                    aria-controls="tab-reviews">
                                    <a href="#tab-reviews">Bình luận ({{ $commentCount }})</a>
                                </li>
                            </ul>
                            <div class="akasha-Tabs-panel akasha-Tabs-panel--description panel entry-content akasha-tab"
                                id="tab-description" role="tabpanel" aria-labelledby="tab-title-description">
                                <h2>Mô tả</h2>
                                <div class="container-table">
                                    <div class="container-cell">
                                        <h2 class="az_custom_heading">{{ $product->description }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="akasha-Tabs-panel akasha-Tabs-panel--reviews panel entry-content akasha-tab"
                                id="tab-reviews" role="tabpanel" aria-labelledby="tab-title-reviews">
                                <div id="reviews" class="akasha-Reviews">
                                    <div id="comments">
                                        <h2 class="akasha-Reviews-title">Bình luận</h2>
                                    </div>
                                    <div id="review_form_wrapper">
                                        <div id="review_form">
                                            <div id="respond" class="comment-respond">
                                                @foreach ($comment as $item)
                                                    <div style="display: flex; justify-content: space-between;">
                                                        <h6>{{ $item->name }}<small> -
                                                                <i>{{ $item->date }}</i></small>
                                                        </h6>

                                                        @if (Auth::check())
                                                            @if (Auth::user()->id == $item->user_id)
                                                                <form action="{{ route('commentDelete', $item->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class='btn btn-danger'
                                                                        onclick="return confirm('Bạn có chắc muốn xóa không?')">Xoá</button>
                                                                </form>
                                                            @else
                                                            @endif
                                                        @endif

                                                    </div>
                                                    <p class="comment-notes"><span
                                                            id="email-notes">{{ $item->content }}</span>
                                                @endforeach

                                                <form
                                                    action="{{ isset($content_comment) ? route('updateComment', $content_comment->id) : route('createComment') }}
                                                        "
                                                    method="POST" enctype="multipart/form-data" id="commentform"
                                                    class="comment-form">
                                                    @csrf
                                                    @if (isset($content_comment))
                                                        @method('PUT')
                                                    @endif
                                                    <p class="comment-form-comment"><label for="comment">Bình
                                                            luận&nbsp;<span class="required">*</span></label>
                                                        <textarea id="comment" name="content" cols="45" rows="8">{{ isset($content_comment) ? $content_comment->content : old('content') }}</textarea>
                                                        @error('content')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                    </p>
                                                    @if (Auth::check())
                                                        <div class="form-group mb-0">
                                                            <input type="hidden" class="form-control" name="user_id"
                                                                value="{{ Auth::user()->id }}">
                                                            <input type="hidden" class="form-control" name="name"
                                                                value="{{ Auth::user()->username }}">
                                                            <input type="hidden" class="form-control" name="email"
                                                                value="{{ Auth::user()->email }}">
                                                            <input type="hidden" class="form-control" name="product_id"
                                                                value="{{ $product->id }}">
                                                            <input type="text" name="status" value="1" hidden>
                                                            <input type="text" name="date"
                                                                value="{{ date('Y-m-d') }}" hidden>
                                                            <input type="text" name="created_at"
                                                                value="{{ date('Y-m-d H:i:s', strtotime('now')) }}"
                                                                hidden>
                                                            <button
                                                                class="btn btn-primary px-3">{{ isset($content_comment) ? 'Cập nhật' : 'Gửi' }}</button>
                                                        </div>
                                                    @else
                                                        <p style="color: red">Vui lòng đăng nhập để bình luận!</p>
                                                    @endif
                                                </form>
                                            </div><!-- #respond -->
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 dreaming_related-product">
                    <div class="block-title">
                        <h2 class="product-grid-title">
                            <span>Related Products</span>
                        </h2>
                    </div>
                    <div class="owl-slick owl-products equal-container better-height"
                        data-slick="{&quot;arrows&quot;:false,&quot;slidesMargin&quot;:30,&quot;dots&quot;:true,&quot;infinite&quot;:false,&quot;slidesToShow&quot;:4}"
                        data-responsive="[{&quot;breakpoint&quot;:480,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1500,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;30&quot;}}]">
                        <div
                            class="product-item style-01 post-27 product type-product status-publish has-post-thumbnail product_cat-table product_cat-new-arrivals product_cat-lamp product_tag-table product_tag-sock  instock shipping-taxable purchasable product-type-variable has-default-attributes ">
                            <div class="product-inner tooltip-left">
                                <div class="product-thumb">
                                    <a class="thumb-link" href="#" tabindex="0">
                                        <img class="img-responsive"
                                            src="{{ asset('client/assets/images/apro101-1-600x778.jpg') }}"
                                            alt="Long Oversized" width="600" height="778">
                                    </a>
                                    <div class="flash"><span class="onnew"><span class="text">New</span></span></div>
                                    <div class="group-button">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <div class="yith-wcwl-add-button show">
                                                <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                            </div>
                                        </div>
                                        <div class="akasha product compare-button">
                                            <a href="#" class="compare button">Compare</a>
                                        </div>
                                        <a href="#" class="button yith-wcqv-button">Quick View</a>
                                        <div class="add-to-cart">
                                            <a href="#" class="button product_type_variable add_to_cart_button">Add
                                                to
                                                cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info equal-elem">
                                    <h3 class="product-name product_title">
                                        <a href="#" tabindex="0">Long Oversized</a>
                                    </h3>
                                    <div class="rating-wapper nostar">
                                        <div class="star-rating"><span style="width:0%">Rated <strong
                                                    class="rating">0</strong> out of 5</span></div>
                                        <span class="review">(0)</span>
                                    </div>
                                    <span class="price"><span class="akasha-Price-amount amount"><span
                                                class="akasha-Price-currencySymbol">$</span>60.00</span></span>
                                </div>
                            </div>
                        </div>
                        <div
                            class="product-item style-01 post-30 product type-product status-publish has-post-thumbnail product_cat-light product_cat-bed product_cat-specials product_tag-light product_tag-table product_tag-sock last instock featured downloadable shipping-taxable purchasable product-type-simple  ">
                            <div class="product-inner tooltip-left">
                                <div class="product-thumb">
                                    <a class="thumb-link" href="#" tabindex="0">
                                        <img class="img-responsive"
                                            src="{{ asset('client/assets/images/apro41-1-600x778.jpg') }}"
                                            alt="Brown Shirt" width="600" height="778">
                                    </a>
                                    <div class="flash">
                                        <span class="onnew"><span class="text">New</span></span>
                                    </div>
                                    <div class="group-button">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <div class="yith-wcwl-add-button show">
                                                <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                            </div>
                                        </div>
                                        <div class="akasha product compare-button">
                                            <a href="#" class="compare button">Compare</a>
                                        </div>
                                        <a href="#" class="button yith-wcqv-button">Quick View</a>
                                        <div class="add-to-cart">
                                            <a href="#" class="button product_type_variable add_to_cart_button">Add
                                                to
                                                cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info equal-elem">
                                    <h3 class="product-name product_title">
                                        <a href="#" tabindex="0">Brown Shirt</a>
                                    </h3>
                                    <div class="rating-wapper nostar">
                                        <div class="star-rating"><span style="width:0%">Rated <strong
                                                    class="rating">0</strong> out of 5</span></div>
                                        <span class="review">(0)</span>
                                    </div>
                                    <span class="price"><span class="akasha-Price-amount amount"><span
                                                class="akasha-Price-currencySymbol">$</span>134.00</span></span>
                                </div>
                            </div>
                        </div>
                        <div
                            class="product-item style-01 post-35 product type-product status-publish has-post-thumbnail product_cat-chair product_cat-new-arrivals product_cat-lamp product_tag-light product_tag-hat product_tag-sock first instock shipping-taxable purchasable product-type-simple  ">
                            <div class="product-inner tooltip-left">
                                <div class="product-thumb">
                                    <a class="thumb-link" href="#" tabindex="0">
                                        <img class="img-responsive"
                                            src="{{ asset('client/assets/images/apro151-1-600x778.jpg') }}"
                                            alt="Utility Pockets" width="600" height="778">
                                    </a>
                                    <div class="flash">
                                        <span class="onsale"><span class="number">-11%</span></span>
                                        <span class="onnew"><span class="text">New</span></span>
                                    </div>
                                    <div class="group-button">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <div class="yith-wcwl-add-button show">
                                                <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                            </div>
                                        </div>
                                        <div class="akasha product compare-button">
                                            <a href="#" class="compare button">Compare</a>
                                        </div>
                                        <a href="#" class="button yith-wcqv-button">Quick View</a>
                                        <div class="add-to-cart">
                                            <a href="#" class="button product_type_variable add_to_cart_button">Add
                                                to
                                                cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info equal-elem">
                                    <h3 class="product-name product_title">
                                        <a href="#" tabindex="0">Utility Pockets</a>
                                    </h3>
                                    <div class="rating-wapper nostar">
                                        <div class="star-rating"><span style="width:0%">Rated <strong
                                                    class="rating">0</strong> out of 5</span></div>
                                        <span class="review">(0)</span>
                                    </div>
                                    <span class="price"><del><span class="akasha-Price-amount amount"><span
                                                    class="akasha-Price-currencySymbol">$</span>89.00</span></del>
                                        <ins><span class="akasha-Price-amount amount"><span
                                                    class="akasha-Price-currencySymbol">$</span>79.00</span></ins></span>
                                </div>
                            </div>
                        </div>
                        <div
                            class="product-item style-01 post-25 product type-product status-publish has-post-thumbnail product_cat-light product_cat-chair product_cat-specials product_tag-light product_tag-sock  instock sale featured shipping-taxable purchasable product-type-simple ">
                            <div class="product-inner tooltip-left">
                                <div class="product-thumb">
                                    <a class="thumb-link" href="#" tabindex="-1">
                                        <img class="img-responsive"
                                            src="{{ asset('client/assets/images/apro13-1-600x778.jpg') }}"
                                            alt="Black Shirt" width="600" height="778">
                                    </a>
                                    <div class="flash">
                                        <span class="onnew"><span class="text">New</span></span>
                                    </div>
                                    <div class="group-button">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <div class="yith-wcwl-add-button show">
                                                <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                            </div>
                                        </div>
                                        <div class="akasha product compare-button">
                                            <a href="#" class="compare button">Compare</a>
                                        </div>
                                        <a href="#" class="button yith-wcqv-button">Quick View</a>
                                        <div class="add-to-cart">
                                            <a href="#" class="button product_type_variable add_to_cart_button">Add
                                                to
                                                cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info equal-elem">
                                    <h3 class="product-name product_title">
                                        <a href="#" tabindex="-1">Black Shirt</a>
                                    </h3>
                                    <div class="rating-wapper nostar">
                                        <div class="star-rating"><span style="width:0%">Rated <strong
                                                    class="rating">0</strong> out of 5</span></div>
                                        <span class="review">(0)</span>
                                    </div>
                                    <span class="price"><span class="akasha-Price-amount amount"><span
                                                class="akasha-Price-currencySymbol">$</span>109.00</span></span>
                                </div>
                            </div>
                        </div>
                        <div
                            class="product-item style-01 post-93 product type-product status-publish has-post-thumbnail product_cat-light product_cat-table product_cat-new-arrivals product_tag-table product_tag-sock last instock shipping-taxable purchasable product-type-simple ">
                            <div class="product-inner tooltip-left">
                                <div class="product-thumb">
                                    <a class="thumb-link" href="#" tabindex="-1">
                                        <img class="img-responsive"
                                            src="{{ asset('client/assets/images/apro181-2-600x778.jpg') }}"
                                            alt="Floral Stripe" width="600" height="778">
                                    </a>
                                    <div class="flash">
                                        <span class="onnew"><span class="text">New</span></span>
                                    </div>
                                    <div class="group-button">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <div class="yith-wcwl-add-button show">
                                                <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                            </div>
                                        </div>
                                        <div class="akasha product compare-button">
                                            <a href="#" class="compare button">Compare</a>
                                        </div>
                                        <a href="#" class="button yith-wcqv-button">Quick View</a>
                                        <div class="add-to-cart">
                                            <a href="#" class="button product_type_variable add_to_cart_button">Add
                                                to
                                                cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info equal-elem">
                                    <h3 class="product-name product_title">
                                        <a href="#" tabindex="-1">City
                                            life jumpers</a>
                                    </h3>
                                    <div class="rating-wapper nostar">
                                        <div class="star-rating"><span style="width:0%">Rated <strong
                                                    class="rating">0</strong> out of 5</span></div>
                                        <span class="review">(0)</span>
                                    </div>
                                    <span class="price"><span class="akasha-Price-amount amount"><span
                                                class="akasha-Price-currencySymbol">$</span>98.00</span></span>
                                </div>
                            </div>
                        </div>
                        <div
                            class="product-item style-01 post-22 product type-product status-publish has-post-thumbnail product_cat-table product_cat-bed product_cat-lamp product_tag-table product_tag-hat product_tag-sock first instock featured downloadable shipping-taxable purchasable product-type-simple ">
                            <div class="product-inner tooltip-left">
                                <div class="product-thumb">
                                    <a class="thumb-link" href="#" tabindex="-1">
                                        <img class="img-responsive"
                                            src="{{ asset('client/assets/images/apro171-1-600x778.jpg') }}"
                                            alt="Knitted Stripe " width="600" height="778">
                                    </a>
                                    <div class="flash">
                                        <span class="onnew"><span class="text">New</span></span>
                                    </div>
                                    <form class="variations_form cart">
                                        <table class="variations">
                                            <tbody>
                                                <tr>
                                                    <td class="value">
                                                        <select title="box_style" data-attributetype="box_style"
                                                            data-id="pa_color" class="attribute-select "
                                                            name="attribute_pa_color"
                                                            data-attribute_name="attribute_pa_color"
                                                            data-show_option_none="yes" tabindex="-1">
                                                            <option data-type="" data-pa_color="" value="">Choose
                                                                an
                                                                option
                                                            </option>
                                                            <option data-width="30" data-height="30" data-type="color"
                                                                data-pa_color="#ff63cb" value="pink"
                                                                class="attached enabled">Pink
                                                            </option>
                                                            <option data-width="30" data-height="30" data-type="color"
                                                                data-pa_color="#a825ea" value="purple"
                                                                class="attached enabled">Purple
                                                            </option>
                                                            <option data-width="30" data-height="30" data-type="color"
                                                                data-pa_color="#db2b00" value="red"
                                                                class="attached enabled">Red
                                                            </option>
                                                        </select>
                                                        <div class="data-val attribute-pa_color"
                                                            data-attributetype="box_style"><a class="change-value color"
                                                                href="#" style="background: #ff63cb;"
                                                                data-value="pink"></a><a class="change-value color"
                                                                href="#" style="background: #a825ea;"
                                                                data-value="purple"></a><a class="change-value color"
                                                                href="#" style="background: #db2b00;"
                                                                data-value="red"></a></div>
                                                        <a class="reset_variations" href="#" tabindex="-1"
                                                            style="visibility: hidden;">Clear</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                    <div class="group-button">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <div class="yith-wcwl-add-button show">
                                                <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                            </div>
                                        </div>
                                        <div class="akasha product compare-button">
                                            <a href="#" class="compare button">Compare</a>
                                        </div>
                                        <a href="#" class="button yith-wcqv-button">Quick View</a>
                                        <div class="add-to-cart">
                                            <a href="#"
                                                class="button product_type_variable add_to_cart_button">Select
                                                options</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info equal-elem">
                                    <h3 class="product-name product_title">
                                        <a href="#" tabindex="-1">Knitted Stripe </a>
                                    </h3>
                                    <div class="rating-wapper nostar">
                                        <div class="star-rating"><span style="width:0%">Rated <strong
                                                    class="rating">0</strong> out of 5</span></div>
                                        <span class="review">(0)</span>
                                    </div>
                                    <span class="price"><span class="akasha-Price-amount amount"><span
                                                class="akasha-Price-currencySymbol">$</span>105.00</span> – <span
                                            class="akasha-Price-amount amount"><span
                                                class="akasha-Price-currencySymbol">$</span>110.00</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
