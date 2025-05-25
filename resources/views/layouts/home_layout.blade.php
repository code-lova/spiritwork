<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="website_name" content="@yield('website_name')">
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="@yield('website_name')">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @php
        $settings = App\Models\Settings::find(1);
    @endphp

    @php
        $logo = App\Models\LogoFavicon::find(1);
    @endphp

    <!--=====FAB ICON=======-->
    <link rel="shortcut icon" href="{{ asset('uploads/logofav/'. $logo->favicon) }}" type="image/x-icon">
    <!--===== CSS LINK =======-->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/owlcarousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <!-- Laravel Toastr Alert Css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


</head>
<body class="body1" style="overflow-x: hidden !important;">
    <!--===== PRELOADER STARTS =======-->
    <div class="preloader">
        <div class="loading-container">
        <div class="loading"></div>
        <div id="loading-icon"><img src="{{ asset('assets/img/logo/preloader.png') }}" alt="{{ $settings->site_name }}"></div>
        </div>
    </div>
    <!--===== PRELOADER ENDS =======-->
    <!--===== PROGRESS STARTS=======-->
    <div class="paginacontainer">
        <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
        </div>
    </div>
    <!--===== PROGRESS ENDS=======-->
    <!--=====HEADER START=======-->
    <header class="homepage4-body">
        <div id="vl-header-sticky" class="vl-header-area vl-transparent-header">
        <div class="container">
            <div class="row align-items-center row-bg1">
            <div class="col-lg-2 col-md-6 col-6">
                <div class="vl-logo">
                <a href="{{ route('homepage') }}">
                    <img src="{{ asset('uploads/logofav/'. $logo->logo) }}" alt="{{ $settings->site_name }}">
                </a>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div class="vl-main-menu text-center">
                    <nav class="vl-mobile-menu-active">
                        <ul>
                            <li class="has-dropdown">
                                <a href="{{ route('homepage') }}">Home</a>
                            </li>
                            <li class="has-dropdown">
                                <a href="{{ route('about.us') }}">About Us</a>
                            </li>
                            <li class="has-dropdown">
                                <a href="{{ route('contact.us') }}">Contact Us</a>
                            </li>
                            <li class="has-dropdown">
                                <a href="{{ route('properties') }}">Properties</a>
                            </li>
                            <li class="has-dropdown">
                                <a href="{{ route('agreement') }}" target="__blank">Agreement Policy</a>
                            </li>
                            @auth
                                <li class="has-dropdown">
                                    <a href="{{ route('user.dashboard') }}">Dashboard</a>
                                </li>
                            @endauth

                            @guest
                                <li class="has-dropdown">
                                    <a href="{{ route('login') }}">Resident Login</a>
                                </li>
                            @endguest
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <div class="vl-hero-btn text-end">
                    <div class="btn-area1">
                        @auth
                            <a
                                href="{{ route('logout') }}" class="vl-btn1"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            >
                                Logout
                                <span class="arrow1">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                                <span class="arrow2">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endauth

                        @guest
                            <a href="{{ route('register') }}" class="vl-btn1">
                                Guest
                                <span class="arrow1">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                                <span class="arrow2">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </a>
                        @endguest


                    </div>
                </div>
                <div class="vl-header-action-item d-block d-lg-none">
                    <button type="button" class="vl-offcanvas-toggle">
                        <i class="fa-solid fa-bars-staggered"></i>
                    </button>
                </div>
            </div>
            </div>
        </div>
        </div>
    </header>
    <!--=====HEADER END =======-->
    <!--===== MOBILE HEADER STARTS =======-->
    <div class="homepage4-body">
        <div class="vl-offcanvas">
        <div class="vl-offcanvas-wrapper">
            <div class="vl-offcanvas-header d-flex justify-content-between align-items-center mb-90">
            <div class="vl-offcanvas-logo">
                <a href="#"><img src="{{ asset('uploads/logofav/'. $logo->logo2) }}" alt="{{ $settings->site_name }}"></a>
            </div>
            <div class="vl-offcanvas-close">
                <button class="vl-offcanvas-close-toggle"><i class="fa-solid fa-xmark"></i></button>
            </div>
            </div>
            <div class="vl-offcanvas-menu d-lg-none mb-40">

                <ul>
                    <li class="has-dropdown">
                        <a href="{{ route('homepage') }}">Home</a>
                    </li>
                    <li class="has-dropdown">
                        <a href="{{ route('about.us') }}">About Us</a>
                    </li>
                    <li class="has-dropdown">
                        <a href="{{ route('contact.us') }}">Contact Us</a>
                    </li>
                    <li class="has-dropdown">
                        <a href="{{ route('properties') }}">Properties</a>
                    </li>
                    @auth
                        <li class="has-dropdown">
                            <a href="{{ route('user.dashboard') }}">Dashboard</a>
                        </li>

                        <li class="has-dropdown">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="nav-link"
                            > Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endauth

                    @guest
                        <li class="has-dropdown">
                            <a href="{{ route('login') }}">Resident Login</a>
                        </li>

                        <li class="has-dropdown">
                            <a href="{{ route('register') }}">
                                Guest
                            </a>
                        </li>
                    @endguest
                </ul>
            </div>
            <div class="space20"></div>
            <div class="vl-offcanvas-info">
            <h3 class="vl-offcanvas-sm-title">Contact Us</h3>
            <div class="space20"></div>
            <span><a href="#"> <i class="fa-regular fa-envelope"></i> {{ $settings->mobile }}</a></span>
            <span><a href="#"><i class="fa-solid fa-phone"></i> {{ $settings->email }}</a></span>
            <span><a href="#"><i class="fa-solid fa-location-dot"></i> {{ $settings->address }}</a></span>
            </div>
            <div class="space20"></div>
            <div class="vl-offcanvas-social">
            <h3 class="vl-offcanvas-sm-title">Follow Us</h3>
            <div class="space20"></div>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        </div>
        <div class="vl-offcanvas-overlay"></div>
    </div>
    <!--===== MOBILE HEADER STARTS =======-->
    <!--===== SEARCH STARTS=======-->
    <div class="header-search-form-wrapper">
        <div class="tx-search-close tx-close"><i class="fa-solid fa-xmark"></i></div>
        <div class="header-search-container">
        <form role="search" class="search-form">
            <input type="search" class="search-field" placeholder="Search …" value="" name="s">
            <button type="submit" class="search-submit"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                <path d="M21.1855 21.1845L25.3337 25.3327M6.66699 14.9623C6.66699 17.1626 7.54106 19.2728 9.09692 20.8287C10.6528 22.3845 12.763 23.2586 14.9633 23.2586C17.1636 23.2586 19.2738 22.3845 20.8297 20.8287C22.3855 19.2728 23.2596 17.1626 23.2596 14.9623C23.2596 12.762 22.3855 10.6518 20.8297 9.09594C19.2738 7.54009 17.1636 6.66602 14.9633 6.66602C12.763 6.66602 10.6528 7.54009 9.09692 9.09594C7.54106 10.6518 6.66699 12.762 6.66699 14.9623Z" stroke="#111111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg></button>
        </form>
        </div>
    </div>
    <div class="body-overlay"></div>
    <!--===== SEARCH ENDS STARTS=======-->

    @yield('content')


    <script src="{{ asset('assets/js/plugins/jquery-3-7-1.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/fontawesome.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/aos.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.appear.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.odometer.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/chart.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/gsap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/textSplite-custom.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/swiper-slider.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/mobilemenu.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/owlcarousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/nice-select.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/slick-slider.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/circle-progress.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

     <!-- Toastr alert Scripts -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
         @if(Session::has('message'))
         toastr.options =
         {
             "closeButton" : true,
             "progressBar" : true
         }
                 toastr.success("{{ session('message') }}");
         @endif

         @if(Session::has('error'))
         toastr.options =
         {
             "closeButton" : true,
             "progressBar" : true
         }
                 toastr.error("{{ session('error') }}");
         @endif

         @if(Session::has('info'))
         toastr.options =
         {
             "closeButton" : true,
             "progressBar" : true
         }
                 toastr.info("{{ session('info') }}");
         @endif

         @if(Session::has('warning'))
         toastr.options =
         {
             "closeButton" : true,
             "progressBar" : true
         }
                 toastr.warning("{{ session('warning') }}");
         @endif
    </script>
    @stack('scripts')
</body>
</html>
