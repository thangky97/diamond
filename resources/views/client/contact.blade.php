@extends('layouts.client.master')

@section('title', 'Liên hệ')

@section('content')

    <div class="banner-wrapper has_background">
        <img src="assets/images/banner-for-all2.jpg" class="img-responsive attachment-1920x447 size-1920x447" alt="img">
        <div class="banner-wrapper-inner">
            <h1 class="page-title">Contact</h1>
            <div role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                <ul class="trail-items breadcrumb">
                    <li class="trail-item trail-begin"><a href="index.html"><span>Home</span></a></li>
                    <li class="trail-item trail-end active"><span>Contact</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="site-main main-container no-sidebar">
        <div class="section-041">
            <div class="container">
                <div class="akasha-google-maps" id="akasha-google-maps" data-hue="" data-lightness="1" data-map-style="2"
                    data-saturation="-99" data-longitude="-73.985130" data-latitude="40.758896" data-pin-icon=""
                    data-zoom="14" data-map-type="ROADMAP"></div>
            </div>
        </div>
        <div class="section-042">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 offset-xl-1 col-xl-10 col-lg-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="az_custom_heading">WP SHOP THEME</h4>
                                <p>3100 West Cary Street Richmond, Virginia 23221<br>
                                    P: 804.355.4383 F: 804.367.7901</p>
                                <h4 class="az_custom_heading">Store Hours</h4>
                                <p>Monday-Saturday 11am-7pm ET<br>
                                    Sunday 11am-6pm ET</p>
                                <h4 class="az_custom_heading">Specialist Hours</h4>
                                <p>Monday-Friday 9am-5pm ET</p>
                            </div>
                            <div class="col-md-6">
                                <div role="form" class="wpcf7">
                                    <form class="wpcf7-form">
                                        <p><label> Name *<br>
                                                <span class="wpcf7-form-control-wrap your-name">
                                                    <input name="your-name" value="" size="40"
                                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                        type="text"></span>
                                            </label></p>
                                        <p><label> Email *<br>
                                                <span class="wpcf7-form-control-wrap your-email">
                                                    <input name="your-email" value="" size="40"
                                                        class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                                        type="email"></span>
                                            </label></p>
                                        <p><label> Your Message *<br>
                                                <span class="wpcf7-form-control-wrap your-message">
                                                    <textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea"></textarea>
                                                </span>
                                            </label></p>
                                        <p><input value="Send" class="wpcf7-form-control wpcf7-submit" type="submit"></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
