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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title>
        Trang chủ - SuitAble
    </title>
    <style>
        /* Ẩn viền của video */
        video {
            outline: none;
        }
    </style>

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/bootstrap.css') }}" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('client/assets/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('client/assets/css/responsive.css') }}" rel="stylesheet" />
</head>

<body>
    <div id="preloader">
        <video id="status" autoplay muted>
            <source src="{{ asset('client/asset/images/intro.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <!-- header -->
    @include('layouts.client.header')

    <!-- content -->
    @yield('content')

    <!-- footer -->

    @include('layouts.client.footer')

    <script src="{{ asset('client/assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('client/assets/js/custom.js') }}"></script>
    <script>
        $(window).on('load', function() {
            $('#status').delay(4000).fadeOut('fast');
            $('#preloader').delay(3000).fadeOut('fast');
            $('body').delay(4000).css({
                'overflow': 'visible'
            });
        })
    </script>

</body>

</html>
