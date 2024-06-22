<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamingtheme.kiendaotac.com/html/akasha/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Apr 2024 15:16:25 GMT -->

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('client/assets/images/favicon.png') }}" />
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/animate.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/chosen.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/jquery.scrollbar.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/lightbox.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/magnific-popup.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/slick.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/fonts/flaticon.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/megamenu.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/dreaming-attribute.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/style.css') }}" />
    <title>@yield('title') </title>
</head>

<body>
    @include('layouts.client.header')

    @yield('content')

    @include('layouts.client.footer')

    <a href="#" class="backtotop active">
        <i class="fa fa-angle-up"></i>
    </a>
    <script src="{{ asset('client/assets/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/chosen.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/countdown.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/slick.js') }}"></script>
    <script src="{{ asset('client/assets/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/threesixty.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/mobilemenu.js') }}"></script>
    <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyC3nDHy1dARR-Pa_2jjPCjvsOR4bcILYsM'></script>
    <script src="{{ asset('client/assets/js/functions.js') }}"></script>
</body>

</html>
