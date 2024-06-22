@extends('layouts.client.master')

@section('title', 'Đăng nhập')

@section('content')

    <main class="site-main  main-container no-sidebar" style="padding-top: 140px">
        <div class="container">
            <div class="row">
                <div class="main-content col-md-12">
                    <div class="page-main-content">
                        <div class="akasha">
                            <div class="akasha-notices-wrapper"></div>
                            <div class="u-columns col2-set" id="customer_login">
                                <div class="u-column1 col-1">
                                    <h2>Đăng nhập</h2>
                                    <form class="akasha-form akasha-form-login login"
                                        action="{{ route('route_FrontEnd_Login_Post') }}" method="post">
                                        @csrf
                                        @if (Session::has('success'))
                                            <div class="alert alert-success alert-dismissible" role="alert">
                                                <strong>{{ Session::get('success') }}</strong>
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                            </div>
                                        @endif
                                        @if (Session::has('error'))
                                            <div
                                                class="alert alert-danger solid alert-end-icon alert-dismissible fade show">
                                                <span><i class="mdi mdi-help"></i></span>
                                                <strong>{{ Session::get('error') }}</strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="btn-close">
                                                </button>
                                            </div>
                                        @endif
                                        <p class="akasha-form-row akasha-form-row--wide form-row form-row-wide">
                                            <label for="username">Email&nbsp;<span class="required">*</span></label>
                                            <input type="text" class="akasha-Input akasha-Input--text input-text"
                                                name="email" id="username" autocomplete="username"
                                                value="{{ old('email', isset($request['email']) ? $request['email'] : '') }}">
                                            @error('email')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                        </p>
                                        <p class="akasha-form-row akasha-form-row--wide form-row form-row-wide">
                                            <label for="password">Password&nbsp;<span class="required">*</span></label>
                                            <input class="akasha-Input akasha-Input--text input-text" type="password"
                                                name="password" id="password" autocomplete="current-password">
                                            @error('password')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                        </p>
                                        <p class="form-row">
                                            <button type="submit" class="akasha-Button button">Đăng nhập
                                            </button>
                                            {{-- <a class="btn btn-block btn-sm btn-facebook transition-3d-hover"
                                                href="{{ route('getLoginGoogle') }}">
                                                <span class="fa fa-google mr-2"></span>
                                                Google
                                            </a> --}}
                                        <div class="akasha-socials style-01">
                                            <div class="content-socials">
                                                <ul class="socials-list">
                                                    <li><a href="{{ route('getLoginGoogle') }}">
                                                            <i class="fa fa-google"></i>
                                                        </a></li>
                                                    <li><a href="#">
                                                            <i class="fa fa-facebook"></i>
                                                        </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        {{-- <a class="btn btn-block btn-sm btn-google transition-3d-hover ml-5 mt-0"
                                                href="#">
                                                <span class="fa fa-facebook-f mr-2"></span>
                                                Facebook
                                            </a> --}}
                                        </p>
                                        <p class="akasha-LostPassword lost_password">
                                            <a href="{{route('forgetPassword')}}">Quên mật khẩu?</a>
                                        </p>
                                    </form>
                                </div>
                                <div class="u-column2 col-2">
                                    <h2>Đăng ký</h2>
                                    <form action="{{ route('postRegister') }}" method="post"
                                        class="akasha-form akasha-form-register register">
                                        @csrf
                                        @if (Session::has('success'))
                                            <div class="alert alert-success alert-dismissible" role="alert">
                                                <strong>{{ Session::get('success') }}</strong>
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                            </div>
                                        @endif
                                        @if (Session::has('error'))
                                            <div
                                                class="alert alert-danger solid alert-end-icon alert-dismissible fade show">
                                                <span><i class="mdi mdi-help"></i></span>
                                                <strong>{{ Session::get('error') }}</strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="btn-close">
                                                </button>
                                            </div>
                                        @endif
                                        <p class="akasha-form-row akasha-form-row--wide form-row form-row-wide">
                                            <label for="name">Tên&nbsp;<span class="required">*</span></label>
                                            <input type="text" class="akasha-Input akasha-Input--text input-text"
                                                name="username" id="name" autocomplete="name"
                                                value="{{ old('username', isset($request['username']) ? $request['username'] : '') }}">
                                            @error('username')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                        </p>
                                        <p class="akasha-form-row akasha-form-row--wide form-row form-row-wide">
                                            <label for="reg_email">Email&nbsp;<span class="required">*</span></label>
                                            <input type="email" class="akasha-Input akasha-Input--text input-text"
                                                name="email" id="reg_email" autocomplete="email"
                                                value="{{ old('email', isset($request['email']) ? $request['email'] : '') }}">
                                            @error('email')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                        </p>
                                        <p class="akasha-form-row akasha-form-row--wide form-row form-row-wide">
                                            <label for="password">Password&nbsp;<span class="required">*</span></label>
                                            <input type="password" class="akasha-Input akasha-Input--text input-text"
                                                name="password" id="password" autocomplete="password" value="">
                                            @error('password')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                        </p>
                                        <p class="akasha-FormRow form-row">
                                            <button type="submit" class="akasha-Button button">Đăng ký
                                            </button>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
