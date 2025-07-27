<!doctype html>
<html lang="en">

<head>
    <title>JobBoard &mdash; Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />
    <link rel="shortcut icon" href="ftco-32x32.png')}}">
    <link rel="stylesheet" href="{{ asset('client/css/custom-bs.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('client/fonts/line-icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/animate.min.css') }}">
    <link href="{{ asset('client/css/quill.snow.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('client/css/style.css') }}">
</head>

<body id="top">
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    @include('client.blocks.navigation')
    @yield('content')
    @include('client.blocks.footer')

    </div>

    <!-- SCRIPTS -->
    <script src="{{ asset('client/js/jquery.min.js') }}"></script>
    <script src="{{ asset('client/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('client/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('client/js/stickyfill.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.easing.1.3.js') }}"></script>

    <script src="{{ asset('client/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('client/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('client/js/quill.min.js') }}"></script>

    <script src="{{ asset('client/js/bootstrap-select.min.js') }}"></script>

    <script src="{{ asset('client/js/custom.js') }}"></script>

    @yield('my-js')
</body>

</html>
