<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('assets/img/favicon/safari-pinned-tab.svg') }}" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Fontawesome -->
    <link type="text/css" href="{{ asset('vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!-- Volt CSS -->
    <link type="text/css" href="{{ asset('css/volt.css') }}" rel="stylesheet">   
</head>
<body>
    
    <main>
        <section class="vh-100 d-flex align-items-center justify-content-center">
            <div class="container">
                <div class="row align-items-center ">
                    <div class="col-12 col-lg-5 order-2 order-lg-1 text-center text-lg-left">
                        <h1 class="mt-5">Sepertinya ada masalah yang <span class="text-primary">Serius</span> disini</h1>
                        <p class="lead my-4">Database tidak bisa terkoneksi dengan baik. Mohon Tunggu !</p>
                        <a class="btn btn-primary animate-hover" href="{{ route('home') }}"><i class="fas fa-chevron-left mr-3 pl-2 animate-left-3"></i>Go back home</a>
                    </div>
                    <div class="col-12 col-lg-7 order-1 order-lg-2 text-center d-flex align-items-center justify-content-center">
                        <img class="img-fluid w-75" src="{{ asset('assets/img/illustrations/500.svg') }}" alt="500 Server Error">
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Core -->
    <script src="{{ asset('vendor/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Vendor JS -->
    <script src="{{ asset('vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>

    <!-- Slider -->
    <script src="{{ asset('vendor/nouislider/distribute/nouislider.min.js') }}"></script>

    <!-- Jarallax -->
    <script src="{{ asset('vendor/jarallax/dist/jarallax.min.js') }}"></script>

    <!-- Smooth scroll -->
    <script src="{{ asset('vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>

    <!-- Count up -->
    <script src="{{ asset('vendor/countup.js/dist/countUp.umd.js') }}"></script>

    <!-- Charts -->
    <script src="{{ asset('vendor/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>

    <!-- Datepicker -->
    <script src="{{ asset('vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>

    <!-- Simplebar -->
    <script src="{{ asset('vendor/simplebar/dist/simplebar.min.js') }}"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- Volt JS -->
    <script src="{{ asset('assets/js/volt.js') }}"></script>
    
</body>
</html>
