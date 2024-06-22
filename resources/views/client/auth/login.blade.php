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
        Trang đăng nhập
    </title>

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/bootstrap.css') }}" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('client/assets/css/login.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('client/assets/css/responsive.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="quay_ve">
        <a href="{{ route('route_FrontEnd_Home') }}"><-- Trang chủ</a>
    </div>
    <div class="login-container">
        <span>
            <img src="https://img.upanh.tv/2023/07/12/Suit_able_auto_x2.jpg" alt="Suit_able_auto_x2.jpg" border="0">
        </span>
        <h2>Đăng nhập</h2>
        <form id="form1" name="form1" method="post">
            <div align="center">
                <h2><strong></strong>
                </h2>
            </div>
            <table width="100%" border="0" align="center">
                <tr>
                    <th scope="row">
                        <div align="left">Tên tài khoản: </div>
                    </th>
                    <td><input type="text" name="txtUser" /></td>
                </tr>
                <tr>
                    <th scope="row">
                        <div align="left">Mật khẩu: </div>
                    </th>
                    <td><input type="password" name="txtPass" /></td>
                </tr>
                <tr>
                    <th colspan="2" scope="row"><input type="submit" name="login" value="Đăng nhập" /></th>
                </tr>
            </table>
            <p align="center">&nbsp;</p>
        </form>
    </div>
</body>

</html>
