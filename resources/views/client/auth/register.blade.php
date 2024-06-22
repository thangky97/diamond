<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('client/assets/images/favicon.png') }}" type="image/x-icon">

    <title>
        Đăng ký
    </title>

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/bootstrap.css') }}" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('client/assets/css/register.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="quay_ve">
        <a href="{{ route('route_FrontEnd_Home') }}"><-- Trang chủ</a>
    </div>
    <div class="login-container">
        <span>
            <img src="https://img.upanh.tv/2023/07/12/Suit_able_auto_x2.jpg" alt="Suit_able_auto_x2.jpg" border="0">
        </span>
        <h2>Đăng ký</h2>
        <form id="form1" name="form1" action="{{ route('postRegister') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <strong>{{ Session::get('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger solid alert-end-icon alert-dismissible fade show">
                    <span><i class="mdi mdi-help"></i></span>
                    <strong>{{ Session::get('error') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    </button>
                </div>
            @endif
            <table width="100%" border="0" align="center">
                <tr>
                    <th scope="row">
                        <div align="left">Tên tài khoản: </div>
                    </th>
                    <td><input type="text" name="username"
                            value="{{ old('username', isset($request['username']) ? $request['username'] : '') }}" />
                        @error('username')
                            <div>
                                <p class="text-danger">{{ $message }}</p>
                            </div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <div align="left">Email: </div>
                    </th>
                    <td><input type="email" name="email"
                            value="{{ old('email', isset($request['email']) ? $request['email'] : '') }}" />
                        @error('email')
                            <div>
                                <p class="text-danger">{{ $message }}</p>
                            </div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <div align="left">Số điện thoại </div>
                    </th>
                    <td><input type="number" name="phone" />
                        @error('password')
                            <div>
                                <p class="text-danger">{{ $message }}</p>
                            </div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <div align="left">Mật khẩu: </div>
                    </th>
                    <td><input type="password" name="password" />
                        @error('password')
                            <div>
                                <p class="text-danger">{{ $message }}</p>
                            </div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th colspan="2" scope="row"><button type="submit" style="border: 1px solid #212529;">Đăng
                            ký</button></th>
                </tr>
            </table>
            <p align="center">&nbsp;</p>
        </form>
    </div>
</body>

</html>
