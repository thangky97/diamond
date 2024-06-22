@extends('layouts.client.master')

@section('title', 'Tin tức')

@section('content')

    {{-- <div class="banner-wrapper has_background">
        <img src="{{ asset('client/assets/images/banner-for-all2.jpg') }}"
            class="img-responsive attachment-1920x447 size-1920x447" alt="img">
        <div class="banner-wrapper-inner">
            <h1 class="page-title">Tin tức</h1>
        </div>
    </div> --}}
    <div class="main-container no-sidebar" style="padding-top: 140px">
        <!-- POST LAYOUT -->
        <div class="container">
            <div class="row">
                <div class="main-content col-md-12 col-sm-12">
                    <div class="blog-grid auto-clear content-post row">
                        @foreach ($news as $new)
                            <article
                                class="post-item post-grid col-bg-4 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-ts-12 post-195 post type-post status-publish format-standard has-post-thumbnail hentry category-light category-table category-life-style tag-light tag-life-style">
                                <div class="post-inner">
                                    <div class="post-thumb">
                                        <a href="{{ route('route_FrontEnd_News_Detail', ['id' => $new->id]) }}">
                                            <img style="height: 250px"
                                                src="{{ asset($new->images) ? '' . Storage::url($new->images) : $new->title }}"
                                                class="img-responsive attachment-370x330 size-370x330"
                                                alt="{{ $new->title }}" width="370" height="330"> </a>
                                        <a class="datebox" href="#">
                                            <span>19</span>
                                            <span>Dec</span>
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <div class="post-meta">
                                            <div class="post-author">
                                                Đăng bởi:<a href="#">
                                                    {{ $new->admin->username }} </a>
                                            </div>
                                        </div>
                                        <div class="post-info equal-elem">
                                            <h2 class="post-title"><a
                                                    href="{{ route('route_FrontEnd_News_Detail', ['id' => $new->id]) }}">{{ $new->title }}</a>
                                            </h2>
                                            {{ $new->short_desc }}
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                    <nav class="navigation pagination">
                        <div class="nav-links">
                            <span class="page-numbers current">1</span>
                            <a class="page-numbers" href="#">2</a>
                            <a class="next page-numbers" href="#"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

@endsection
