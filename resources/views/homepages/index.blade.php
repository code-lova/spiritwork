@extends('layouts.home_layout')

@section('title', "$settings->title")
@section('meta_description', "$settings->site_description")
@section('meta_keyword', "$settings->keywords")
@section('website_name', "$settings->site_name")

@section('content')
@foreach ($project as $visit)
    <style>
        .propety-loaction .img1 img {
            width: 100%;
            max-width: 300px;
            height: auto;
            display: block;
            margin: 0 auto;
        }
    </style>

    <!--===== HERO AREA STARTS =======-->
    <div class="hero4-slider-sectionarea">

        <div class="hero4-slider-area"
            style="width: 1340px; height: 640px; background-image: url({{ asset('uploads/slider/' . $slider->slider1_image) }}); background-position: center; background-repeat: no-repeat; background-size: cover;">
            <img src="{{ asset('assets/img/all-images/bg/h-bg1.png') }}" alt="{{ $settings->site_name }}" class="h-bg1">
            <img src="{{ asset('assets/img/elements/elements5.png') }}" alt="{{ $settings->site_name }}" class="elements5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero2-header heading2">
                            <h5><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path
                                        d="M2 20H4M4 20H10M4 20V11.452C4 10.918 4 10.651 4.065 10.402C4.12256 10.1819 4.21725 9.97322 4.345 9.78497C4.49 9.57197 4.691 9.39497 5.093 9.04397L9.894 4.84197C10.64 4.18997 11.013 3.86397 11.432 3.73997C11.802 3.62997 12.197 3.62997 12.567 3.73997C12.987 3.86397 13.361 4.18997 14.107 4.84397L18.907 9.04397C19.309 9.39597 19.51 9.57197 19.655 9.78397C19.783 9.9753 19.8763 10.1813 19.935 10.402C20 10.651 20 10.918 20 11.452V20M10 20H14M10 20V16C10 15.4695 10.2107 14.9608 10.5858 14.5858C10.9609 14.2107 11.4696 14 12 14C12.5304 14 13.0391 14.2107 13.4142 14.5858C13.7893 14.9608 14 15.4695 14 16V20M20 20H14M20 20H22"
                                        stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>{{ $slider->slider1_h5 }}</h5>
                            <div class="space28"></div>
                            <h1>{{ $slider->slider1_h1 }}</h1>
                            <div class="space36"></div>
                            <div class="quick-info">
                                <ul>
                                    <h5>✓ {{ $slider->slider1_quick_info }}</h5>
                                </ul>
                            </div>
                            <div class="space36"></div>
                            <div class="form-area text-end">
                                <form method="GET" action="{{ route('properties') }}">
                                    <input type="text" disabled placeholder="Our Properties" />
                                    <button type="submit" class="vl-btn1">
                                        Explore All
                                        <span class="arrow1"><i class="fa-solid fa-arrow-right"></i></span>
                                        <span class="arrow2"><i class="fa-solid fa-arrow-right"></i></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero4-slider-area"
            style="width: 1340px; height: 640px; background-image: url({{ asset('uploads/slider/' . $slider->slider2_image) }}); background-position: center; background-repeat: no-repeat; background-size: cover;">
            <img src="{{ asset('assets/img/all-images/bg/h-bg1.png') }}" alt="{{ $settings->site_name }}" class="h-bg1">
            <img src="{{ asset('assets/img/elements/elements5.png') }}" alt="{{ $settings->site_name }}"
                class="elements5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero2-header heading2">
                            <h5><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path
                                        d="M2 20H4M4 20H10M4 20V11.452C4 10.918 4 10.651 4.065 10.402C4.12256 10.1819 4.21725 9.97322 4.345 9.78497C4.49 9.57197 4.691 9.39497 5.093 9.04397L9.894 4.84197C10.64 4.18997 11.013 3.86397 11.432 3.73997C11.802 3.62997 12.197 3.62997 12.567 3.73997C12.987 3.86397 13.361 4.18997 14.107 4.84397L18.907 9.04397C19.309 9.39597 19.51 9.57197 19.655 9.78397C19.783 9.9753 19.8763 10.1813 19.935 10.402C20 10.651 20 10.918 20 11.452V20M10 20H14M10 20V16C10 15.4695 10.2107 14.9608 10.5858 14.5858C10.9609 14.2107 11.4696 14 12 14C12.5304 14 13.0391 14.2107 13.4142 14.5858C13.7893 14.9608 14 15.4695 14 16V20M20 20H14M20 20H22"
                                        stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                </svg> {{ $slider->slider2_h5 }}</h5>
                            <div class="space28"></div>
                            <h1>{{ $slider->slider2_h1 }}</h1>
                            <div class="space36"></div>
                            <div class="quick-info">
                                <ul>
                                    <h5>✓ {{ $slider->slider2_quick_info }}</h5>
                                </ul>
                            </div>
                            <div class="space36"></div>
                            <div class="form-area text-end">
                                <form method="GET" action="{{ route('properties') }}">
                                    <input type="text" disabled placeholder="Our Properties" />
                                    <button type="submit" class="vl-btn1">
                                        Explore All
                                        <span class="arrow1"><i class="fa-solid fa-arrow-right"></i></span>
                                        <span class="arrow2"><i class="fa-solid fa-arrow-right"></i></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero4-slider-area"
            style="width: 1340px; height: 640px; background-image: url({{ asset('uploads/slider/' . $slider->slider3_image) }}); background-position: center; background-repeat: no-repeat; background-size: cover;">
            <img src="{{ asset('assets/img/all-images/bg/h-bg1.png') }}" alt="{{ $settings->site_name }}" class="h-bg1">
            <img src="{{ asset('assets/img/elements/elements5.png') }}" alt="{{ $settings->site_name }}"
                class="elements5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero2-header heading2">
                            <h5><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path
                                        d="M2 20H4M4 20H10M4 20V11.452C4 10.918 4 10.651 4.065 10.402C4.12256 10.1819 4.21725 9.97322 4.345 9.78497C4.49 9.57197 4.691 9.39497 5.093 9.04397L9.894 4.84197C10.64 4.18997 11.013 3.86397 11.432 3.73997C11.802 3.62997 12.197 3.62997 12.567 3.73997C12.987 3.86397 13.361 4.18997 14.107 4.84397L18.907 9.04397C19.309 9.39597 19.51 9.57197 19.655 9.78397C19.783 9.9753 19.8763 10.1813 19.935 10.402C20 10.651 20 10.918 20 11.452V20M10 20H14M10 20V16C10 15.4695 10.2107 14.9608 10.5858 14.5858C10.9609 14.2107 11.4696 14 12 14C12.5304 14 13.0391 14.2107 13.4142 14.5858C13.7893 14.9608 14 15.4695 14 16V20M20 20H14M20 20H22"
                                        stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                </svg> {{ $slider->slider3_h5 }}</h5>
                            <div class="space28"></div>
                            <h1>{{ $slider->slider3_h1 }}</h1>
                            <div class="space36"></div>
                            <div class="quick-info">
                                <ul>
                                    <h5>✓ {{ $slider->slider3_quick_info }}</h5>
                                </ul>
                            </div>
                            <div class="space36"></div>
                            <div class="form-area text-end">
                                <form method="GET" action="{{ route('properties') }}">
                                    <input type="text" disabled placeholder="Our Properties" />
                                    <button type="submit" class="vl-btn1">
                                        Explore All
                                        <span class="arrow1"><i class="fa-solid fa-arrow-right"></i></span>
                                        <span class="arrow2"><i class="fa-solid fa-arrow-right"></i></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero4-slider-area"
            style="width: 1340px; height: 640px; background-image: url(assets/img/all-images/hero/hero-img10.jpg); background-position: center; background-repeat: no-repeat; background-size: cover;">
            <img src="{{ asset('assets/img/all-images/bg/h-bg1.png') }}" alt="{{ $settings->site_name }}"
                class="h-bg1">
            <img src="{{ asset('assets/img/elements/elements5.png') }}" alt="{{ $settings->site_name }}"
                class="elements5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero2-header heading2">
                            <h5><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M2 20H4M4 20H10M4 20V11.452C4 10.918 4 10.651 4.065 10.402C4.12256 10.1819 4.21725 9.97322 4.345 9.78497C4.49 9.57197 4.691 9.39497 5.093 9.04397L9.894 4.84197C10.64 4.18997 11.013 3.86397 11.432 3.73997C11.802 3.62997 12.197 3.62997 12.567 3.73997C12.987 3.86397 13.361 4.18997 14.107 4.84397L18.907 9.04397C19.309 9.39597 19.51 9.57197 19.655 9.78397C19.783 9.9753 19.8763 10.1813 19.935 10.402C20 10.651 20 10.918 20 11.452V20M10 20H14M10 20V16C10 15.4695 10.2107 14.9608 10.5858 14.5858C10.9609 14.2107 11.4696 14 12 14C12.5304 14 13.0391 14.2107 13.4142 14.5858C13.7893 14.9608 14 15.4695 14 16V20M20 20H14M20 20H22"
                                        stroke="white" stroke-width="1.8" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>{{ $slider->slider1_h5 }}</h5>
                            <div class="space28"></div>
                            <h1>{{ $slider->slider1_h1 }}</h1>
                            <div class="space36"></div>
                            <div class="quick-info">
                                <ul>
                                    <h5>✓ {{ $slider->slider1_quick_info }}</h5>
                                </ul>
                            </div>
                            <div class="space36"></div>
                            <div class="form-area text-end">
                                <form method="GET" action="{{ route('properties') }}">
                                    <input type="text" disabled placeholder="Our Properties" />
                                    <button type="submit" class="vl-btn1">
                                        Explore All
                                        <span class="arrow1"><i class="fa-solid fa-arrow-right"></i></span>
                                        <span class="arrow2"><i class="fa-solid fa-arrow-right"></i></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hero4-small-img">
        <div class="img1">
            <img src="{{ asset('uploads/slider/' . $slider->slider1_image) }}" alt="{{ $settings->site_name }}">
        </div>
        <div class="img1">
            <img src="{{ asset('uploads/slider/' . $slider->slider2_image) }}" alt="{{ $settings->site_name }}">
        </div>
        <div class="img1">
            <img src="{{ asset('uploads/slider/' . $slider->slider3_image) }}" alt="{{ $settings->site_name }}">
        </div>
        <div class="img1">
            <img src="{{ asset('assets/img/all-images/hero/hero-img10.jpg') }}" alt="{{ $settings->site_name }}">
        </div>
    </div>
    <!--===== HERO AREA ENDS =======-->
    <div class="space80"></div>

    <!--===== ABOUT AREA STARTS =======-->
    <div class="about2 sp1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="heading1">
                        <h5>About {{ $settings->site_name }}</h5>
                        <div class="space16"></div>
                        <h2 class="text-anime-style-3">Building Dreams,
                            One Home a Time</h2>
                        <div class="space50"></div>
                        <div class="img1 image-anime reveal">
                            <img src="{{ asset('assets/img/all-images/about/about-img3.png') }}" alt="{{ $settings->site_name }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="space30 d-lg-none d-block"></div>
                    <div class="img2 image-anime reveal">
                        <img style="width: 400px; height: 588px;"
                            src="{{ asset('uploads/about/'. $about->side2_img) }}" alt="{{ $settings->site_name }}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="heading1">
                        <div class="arrow-btnarea" data-aos="fade-left" data-aos-duration="900">
                            <a href="about-us.html">
                                <div class="content keyframe5">
                                    <h6 class="circle rotateme">
                                        <span style="transform: rotate(0deg);">A</span>
                                        <span style="transform: rotate(15deg);">b</span>
                                        <span style="transform: rotate(30deg);">o</span>
                                        <span style="transform: rotate(45deg);">u</span>
                                        <span style="transform: rotate(60deg);">t</span>
                                        <span style="transform: rotate(75deg);"> </span>
                                        <span style="transform: rotate(90deg);">U</span>
                                        <span style="transform: rotate(105deg);">s</span>
                                        <span style="transform: rotate(120deg);"> </span>
                                        <span style="transform: rotate(135deg);">O</span>
                                        <span style="transform: rotate(150deg);">C</span>
                                        <span style="transform: rotate(165deg);">H</span>
                                        <span style="transform: rotate(180deg);">e</span>
                                        <span style="transform: rotate(195deg);">a</span>
                                        <span style="transform: rotate(210deg);">v</span>
                                        <span style="transform: rotate(225deg);">e</span>
                                        <span style="transform: rotate(240deg);">n</span>
                                        <span style="transform: rotate(255deg);"> </span>
                                        <span style="transform: rotate(270deg);">H</span>
                                        <span style="transform: rotate(285deg);">o</span>
                                        <span style="transform: rotate(300deg);">m</span>
                                        <span style="transform: rotate(315deg);">e</span>
                                        <span style="transform: rotate(330deg);">s</span>
                                    </h6>
                                </div>
                                <img src="assets/img/icons/arrow1.svg" alt="housa" class="arrow1">
                            </a>
                        </div>

                        <div class="space30"></div>
                        <p data-aos="fade-left" data-aos-duration="1000">{!! $about->about_text !!}</p>
                        <div class="space32"></div>
                        <div class="btn-area1" data-aos="fade-left" data-aos-duration="1200">
                            <a href="{{ route('about.us') }}" class="vl-btn1">Read More <span class="arrow1"><i
                                        class="fa-solid fa-arrow-right"></i></span><span class="arrow2"><i
                                        class="fa-solid fa-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== ABOUT AREA ENDS =======-->


    <!--===== PROPERTIES_LOCATION AREA ENDS =======-->
    <div class="location4 sp2">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="heading2 text-center space-margin60">
                        <h5><svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24"
                                fill="none">
                                <path
                                    d="M2.5 20H4.5M4.5 20H10.5M4.5 20V11.452C4.5 10.918 4.5 10.651 4.565 10.402C4.62256 10.1819 4.71725 9.97322 4.845 9.78497C4.99 9.57197 5.191 9.39497 5.593 9.04397L10.394 4.84197C11.14 4.18997 11.513 3.86397 11.932 3.73997C12.302 3.62997 12.697 3.62997 13.067 3.73997C13.487 3.86397 13.861 4.18997 14.607 4.84397L19.407 9.04397C19.809 9.39597 20.01 9.57197 20.155 9.78397C20.283 9.9753 20.3763 10.1813 20.435 10.402C20.5 10.651 20.5 10.918 20.5 11.452V20M10.5 20H14.5M10.5 20V16C10.5 15.4695 10.7107 14.9608 11.0858 14.5858C11.4609 14.2107 11.9696 14 12.5 14C13.0304 14 13.5391 14.2107 13.9142 14.5858C14.2893 14.9608 14.5 15.4695 14.5 16V20M20.5 20H14.5M20.5 20H22.5"
                                    stroke="#ED8438" stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg> Our Property Location</h5>
                        <div class="space18"></div>
                        <h2>Our Properties Across Cities</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="propety-loaction">
                        <div class="img1">
                            <img src="{{ asset('assets/img/all-images/p-location/lagos.jpg') }}"
                                alt="{{ $settings->site_name }}">
                        </div>
                        <div class="content-area">
                            <a href="{{ route('properties') }}">Lagos</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="propety-loaction">
                        <div class="img1">
                            <img src="{{ asset('assets/img/all-images/p-location/delta.jpg') }}"
                                alt="{{ $settings->site_name }}">
                        </div>
                        <div class="content-area">
                            <a href="{{ route('properties') }}">Delta</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="propety-loaction">
                        <div class="img1">
                            <img src="{{ asset('assets/img/all-images/p-location/edo.jpeg') }}"
                                alt="{{ $settings->site_name }}">
                        </div>
                        <div class="content-area">
                            <a href="{{ route('properties') }}">Edo</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!--===== PROPERTIES_LOCATION AREA ENDS =======-->

    <!--===== PROPERTIES LISTING AREA STARTS =======-->
    <div class="property4 sp2"
        style="background-image: url(assets/img/all-images/bg/team-bg1.png); background-position: center; background-repeat: no-repeat; background-size: cover;">
        <div class="container">
            <div class="row align-items-center space-margin60">
                <div class="col-lg-6">
                    <div class="heading2">
                        <h5><svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24"
                                fill="none">
                                <path
                                    d="M2.5 20H4.5M4.5 20H10.5M4.5 20V11.452C4.5 10.918 4.5 10.651 4.565 10.402C4.62256 10.1819 4.71725 9.97322 4.845 9.78497C4.99 9.57197 5.191 9.39497 5.593 9.04397L10.394 4.84197C11.14 4.18997 11.513 3.86397 11.932 3.73997C12.302 3.62997 12.697 3.62997 13.067 3.73997C13.487 3.86397 13.861 4.18997 14.607 4.84397L19.407 9.04397C19.809 9.39597 20.01 9.57197 20.155 9.78397C20.283 9.9753 20.3763 10.1813 20.435 10.402C20.5 10.651 20.5 10.918 20.5 11.452V20M10.5 20H14.5M10.5 20V16C10.5 15.4695 10.7107 14.9608 11.0858 14.5858C11.4609 14.2107 11.9696 14 12.5 14C13.0304 14 13.5391 14.2107 13.9142 14.5858C14.2893 14.9608 14.5 15.4695 14.5 16V20M20.5 20H14.5M20.5 20H22.5"
                                    stroke="#ED8438" stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg> Dream Home Awaits</h5>
                        <div class="space18"></div>
                        <h2>Featured Homes For You</h2>
                    </div>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-3">
                    <div class="btn-area1 text-end">
                        <div class="space20 d-lg-none d-block"></div>
                        <a href="{{ route('properties') }}" class="vl-btn1">Explore all Properties <span
                                class="arrow1"><i class="fa-solid fa-arrow-right"></i></span><span class="arrow2"><i
                                    class="fa-solid fa-arrow-right"></i></span></a>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($properties as $listing)
                    <div class="col-lg-4 col-md-6">
                        <div class="property-single-boxarea">
                            <div class="img1">
                                <a href="{{ url('property-details/'.$listing->category->slug.'/'.$listing->slug) }}"><img style="width: 420px; height: 260px;"
                                        src="{{ asset('uploads/property/' . $listing->PropertyImages[0]->image) }}"
                                        alt="{{ $settings->site_name }}"></a>
                                <ul class="rent-sale">
                                    <li><a href="#">{{ Str::ucfirst($listing->type) }}</a></li>
                                    <li><a href="#">Estate</a></li>
                                </ul>
                                <ul class="react-list">
                                    <li>
                                        <a href="javascript:void(0);" onclick="shareProperty('{{ url('property-details/'.$listing->category->slug.'/'.$listing->slug) }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                height="20" viewBox="0 0 20 20" fill="none">
                                                <path
                                                    d="M6.50016 9.58333C6.50016 10.1359 6.28067 10.6658 5.88997 11.0565C5.49927 11.4472 4.96936 11.6667 4.41683 11.6667C3.8643 11.6667 3.33439 11.4472 2.94369 11.0565C2.55299 10.6658 2.3335 10.1359 2.3335 9.58333C2.3335 9.0308 2.55299 8.50089 2.94369 8.11019C3.33439 7.71949 3.8643 7.5 4.41683 7.5C4.96936 7.5 5.49927 7.71949 5.88997 8.11019C6.28067 8.50089 6.50016 9.0308 6.50016 9.58333Z"
                                                    stroke="#ED8438" stroke-width="1.5" />
                                                <path d="M10.9333 14.0016L6.5 11.075M11.0167 5.69995L6.58333 8.62662"
                                                    stroke="#ED8438" stroke-width="1.5" stroke-linecap="round" />
                                                <path
                                                    d="M14.8337 15.4167C14.8337 15.9692 14.6142 16.4991 14.2235 16.8898C13.8328 17.2805 13.3029 17.5 12.7503 17.5C12.1978 17.5 11.6679 17.2805 11.2772 16.8898C10.8865 16.4991 10.667 15.9692 10.667 15.4167C10.667 14.8641 10.8865 14.3342 11.2772 13.9435C11.6679 13.5528 12.1978 13.3333 12.7503 13.3333C13.3029 13.3333 13.8328 13.5528 14.2235 13.9435C14.6142 14.3342 14.8337 14.8641 14.8337 15.4167ZM14.8337 4.58333C14.8337 5.13587 14.6142 5.66577 14.2235 6.05647C13.8328 6.44717 13.3029 6.66667 12.7503 6.66667C12.1978 6.66667 11.6679 6.44717 11.2772 6.05647C10.8865 5.66577 10.667 5.13587 10.667 4.58333C10.667 4.0308 10.8865 3.50089 11.2772 3.11019C11.6679 2.71949 12.1978 2.5 12.7503 2.5C13.3029 2.5 13.8328 2.71949 14.2235 3.11019C14.6142 3.50089 14.8337 4.0308 14.8337 4.58333Z"
                                                    stroke="#ED8438" stroke-width="1.5" />
                                            </svg>
                                        </a>
                                    </li>
                                    <!-- WhatsApp share -->
                                    <li>
                                        <a href="https://wa.me/?text={{ urlencode('Check out this beautiful home: ' . url('property-details/'.$listing->category->slug.'/'.$listing->slug)) }}"
                                        target="_blank" title="Share on WhatsApp">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#25D366" viewBox="0 0 24 24">
                                            <path d="M12.04 2.003a9.995 9.995 0 0 0-8.583 15.327l-1.403 5.126 5.271-1.38a9.996 9.996 0 1 0 4.715-19.073zm5.924 14.582c-.25.697-1.46 1.374-2.035 1.426-.52.05-1.16.072-1.875-.117-.43-.107-.98-.31-1.703-.635a9.807 9.807 0 0 1-3.154-2.542 7.208 7.208 0 0 1-1.519-2.75c-.04-.173-.4-1.088-.4-2.048s.255-1.448.346-1.65c.09-.202.195-.28.345-.285.147-.005.295-.01.425-.01s.32-.017.49.373.578 1.413.63 1.517c.05.103.08.22.015.353-.064.134-.096.22-.19.345-.096.123-.202.275-.29.368-.096.097-.196.203-.084.398.11.197.49.78 1.057 1.264.73.65 1.34.85 1.535.948.198.098.313.082.428-.05.11-.123.49-.57.618-.766.13-.197.255-.162.43-.097.173.067 1.1.52 1.29.613.196.098.327.145.377.225.05.08.05.827-.2 1.524z"/>
                                        </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="content-area">
                                <a href="{{ url('property-details/'.$listing->category->slug.'/'.$listing->slug) }}"
                                    class="title">{{ \Illuminate\Support\Str::limit($listing->property_name, 25, '...') }}</a>
                                <div class="space18"></div>
                                <p><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 18 18" fill="none">
                                        <path
                                            d="M9 2.25002C7.60761 2.25002 6.27226 2.80314 5.28769 3.78771C4.30312 4.77227 3.75 6.10763 3.75 7.50002C3.75 9.64652 5.0865 11.7173 6.5535 13.3215C7.3036 14.1387 8.12207 14.8905 9 15.5685C9.131 15.468 9.28475 15.3455 9.46125 15.201C10.1661 14.6222 10.8295 13.9947 11.4465 13.323C12.9135 11.7173 14.25 9.64727 14.25 7.50002C14.25 6.10763 13.6969 4.77227 12.7123 3.78771C11.7277 2.80314 10.3924 2.25002 9 2.25002ZM9 17.4105L8.57475 17.118L8.5725 17.1165L8.568 17.1128L8.553 17.1023L8.49675 17.0625L8.29425 16.9148C7.26815 16.1436 6.31491 15.28 5.4465 14.3348C3.9135 12.6563 2.25 10.227 2.25 7.49927C2.25 5.70906 2.96116 3.99217 4.22703 2.7263C5.4929 1.46043 7.20979 0.749268 9 0.749268C10.7902 0.749268 12.5071 1.46043 13.773 2.7263C15.0388 3.99217 15.75 5.70906 15.75 7.49927C15.75 10.227 14.0865 12.657 12.5535 14.3333C11.6853 15.2785 10.7323 16.1421 9.7065 16.9133C9.62104 16.9771 9.53478 17.0399 9.44775 17.1015L9.432 17.112L9.4275 17.1158L9.426 17.1165L9 17.4105ZM9 6.00002C8.60218 6.00002 8.22064 6.15805 7.93934 6.43936C7.65804 6.72066 7.5 7.10219 7.5 7.50002C7.5 7.89784 7.65804 8.27937 7.93934 8.56068C8.22064 8.84198 8.60218 9.00002 9 9.00002C9.39782 9.00002 9.77936 8.84198 10.0607 8.56068C10.342 8.27937 10.5 7.89784 10.5 7.50002C10.5 7.10219 10.342 6.72066 10.0607 6.43936C9.77936 6.15805 9.39782 6.00002 9 6.00002ZM6 7.50002C6 6.70437 6.31607 5.94131 6.87868 5.3787C7.44129 4.81609 8.20435 4.50002 9 4.50002C9.79565 4.50002 10.5587 4.81609 11.1213 5.3787C11.6839 5.94131 12 6.70437 12 7.50002C12 8.29567 11.6839 9.05873 11.1213 9.62134C10.5587 10.1839 9.79565 10.5 9 10.5C8.20435 10.5 7.44129 10.1839 6.87868 9.62134C6.31607 9.05873 6 8.29567 6 7.50002Z"
                                            fill="#424242" />
                                    </svg> {{ $listing->country }}, {{ ucfirst(strtolower($listing->state)) }},
                                    {{ ucfirst(strtolower($listing->city)) }}.
                                    @if ($listing->availability == 1)
                                        <span class="text-success" style="font-size: 12px;">Available</span>
                                    @else
                                        <span class="text-danger" style="font-size: 12px;">Unavailable</span>
                                    @endif
                                    <br>
                                    <br>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path d="M8 9H16M8 15H16" stroke="#1B1B1B" stroke-width="1.5"
                                            stroke-linejoin="round" />
                                        <path d="M3 21H21V3.00046L3 3V21Z" stroke="#1B1B1B" stroke-width="1.5"
                                            stroke-linejoin="round" />
                                    </svg>{{ ' ' }}{{ $listing->category->name }}
                                </p>
                                <div class="space20"></div>
                                <div class="btn-area1">
                                    <a href="#" class="nm-btn">#@php echo number_format($listing->price) @endphp</a>
                                    <ul>
                                        <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" viewBox="0 0 16 16" fill="none">
                                                    <path d="M14.2589 11.5635H1.2959" stroke="#424242"
                                                        stroke-width="1.16667" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M14.2589 13.8331V10.5923C14.2589 9.3702 14.2589 8.75913 13.8792 8.37944C13.4995 7.99976 12.8884 7.99976 11.6663 7.99976H3.88849C2.66633 7.99976 2.05525 7.99976 1.67558 8.37944C1.2959 8.75913 1.2959 9.3702 1.2959 10.5923V13.8331"
                                                        stroke="#424242" stroke-width="1.16667" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M7.12844 7.99986V6.84188C7.12844 6.59515 7.09136 6.51263 6.90139 6.41539C6.50589 6.21287 6.02571 6.05542 5.50807 6.05542C4.99042 6.05542 4.51027 6.21287 4.11471 6.41539C3.92478 6.51263 3.8877 6.59515 3.8877 6.84188V7.99986"
                                                        stroke="#424242" stroke-width="1.16667" stroke-linecap="round" />
                                                    <path
                                                        d="M11.6665 7.99986V6.84188C11.6665 6.59515 11.6294 6.51263 11.4395 6.41539C11.044 6.21287 10.5638 6.05542 10.0462 6.05542C9.52848 6.05542 9.04833 6.21287 8.65283 6.41539C8.46286 6.51263 8.42578 6.59515 8.42578 6.84188V7.99986"
                                                        stroke="#424242" stroke-width="1.16667" stroke-linecap="round" />
                                                    <path
                                                        d="M13.611 7.99984V4.9928C13.611 4.54451 13.611 4.32037 13.4865 4.1087C13.3619 3.89703 13.1845 3.78746 12.8296 3.56834C11.3988 2.68488 9.65685 2.1665 7.77767 2.1665C5.89847 2.1665 4.15656 2.68488 2.72573 3.56834C2.37084 3.78746 2.1934 3.89703 2.06886 4.1087C1.94434 4.32037 1.94434 4.54451 1.94434 4.9928V7.99984"
                                                        stroke="#424242" stroke-width="1.16667" stroke-linecap="round" />
                                                </svg> {{ $listing->rooms_num }} <span> | </span></a></li>
                                        <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                    height="14" viewBox="0 0 14 14" fill="none">
                                                    <path
                                                        d="M3.50033 11.6667L2.91699 12.2501M10.5003 11.6667L11.0837 12.2501"
                                                        stroke="#424242" stroke-width="1.16667" stroke-linecap="round" />
                                                    <path
                                                        d="M1.75 7V7.58333C1.75 9.50822 1.75 10.4707 2.34799 11.0687C2.94598 11.6667 3.90843 11.6667 5.83333 11.6667H8.16667C10.0915 11.6667 11.054 11.6667 11.652 11.0687C12.25 10.4707 12.25 9.50822 12.25 7.58333V7"
                                                        stroke="#424242" stroke-width="1.16667" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M1.16699 7H12.8337" stroke="#424242" stroke-width="1.16667"
                                                        stroke-linecap="round" />
                                                    <path
                                                        d="M2.33301 7V3.22198C2.33301 2.40903 2.99204 1.75 3.80499 1.75C4.45731 1.75 5.03182 2.17932 5.21665 2.80491L5.24967 2.91667M4.66634 3.5L6.12467 2.33333"
                                                        stroke="#424242" stroke-width="1.16667" stroke-linecap="round" />
                                                </svg> {{ $listing->bathrooms_num }} <span> | </span></a></li>
                                        <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                    height="14" viewBox="0 0 14 14" fill="none">
                                                    <path
                                                        d="M9.33333 10.7917C9.33333 11.5971 9.98626 12.25 10.7917 12.25C11.5971 12.25 12.25 11.5971 12.25 10.7917C12.25 9.98626 11.5971 9.33333 10.7917 9.33333M9.33333 10.7917C9.33333 9.98626 9.98626 9.33333 10.7917 9.33333M9.33333 10.7917H4.66667M10.7917 9.33333V4.66667M4.66667 10.7917C4.66667 11.5971 4.01375 12.25 3.20833 12.25C2.40292 12.25 1.75 11.5971 1.75 10.7917C1.75 9.98626 2.40292 9.33333 3.20833 9.33333M4.66667 10.7917C4.66667 9.98626 4.01375 9.33333 3.20833 9.33333M10.7917 4.66667C9.98626 4.66667 9.33333 4.01375 9.33333 3.20833M10.7917 4.66667C11.5971 4.66667 12.25 4.01375 12.25 3.20833C12.25 2.40292 11.5971 1.75 10.7917 1.75C9.98626 1.75 9.33333 2.40292 9.33333 3.20833M3.20833 9.33333V4.66667M3.20833 4.66667C2.40292 4.66667 1.75 4.01375 1.75 3.20833C1.75 2.40292 2.40292 1.75 3.20833 1.75C4.01375 1.75 4.66667 2.40292 4.66667 3.20833M3.20833 4.66667C4.01375 4.66667 4.66667 4.01375 4.66667 3.20833M4.66667 3.20833H9.33333"
                                                        stroke="#424242" stroke-width="1.08889" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg> {{ $listing->square_ft }} SQ</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div>
                        <h3>No properties at the moment</h3>
                    </div>
                @endforelse


            </div>
        </div>
    </div>
    <!--===== PROPERTIES LISTING AREA ENDS =======-->

    <!--===== SEARCH HOME AREA STARTS =======-->
    <div class="s-properties4 sp1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="heading2 text-center space-margin60">
                        <h5><svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24"
                                fill="none">
                                <path
                                    d="M2.5 20H4.5M4.5 20H10.5M4.5 20V11.452C4.5 10.918 4.5 10.651 4.565 10.402C4.62256 10.1819 4.71725 9.97322 4.845 9.78497C4.99 9.57197 5.191 9.39497 5.593 9.04397L10.394 4.84197C11.14 4.18997 11.513 3.86397 11.932 3.73997C12.302 3.62997 12.697 3.62997 13.067 3.73997C13.487 3.86397 13.861 4.18997 14.607 4.84397L19.407 9.04397C19.809 9.39597 20.01 9.57197 20.155 9.78397C20.283 9.9753 20.3763 10.1813 20.435 10.402C20.5 10.651 20.5 10.918 20.5 11.452V20M10.5 20H14.5M10.5 20V16C10.5 15.4695 10.7107 14.9608 11.0858 14.5858C11.4609 14.2107 11.9696 14 12.5 14C13.0304 14 13.5391 14.2107 13.9142 14.5858C14.2893 14.9608 14.5 15.4695 14.5 16V20M20.5 20H14.5M20.5 20H22.5"
                                    stroke="#ED8438" stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg> Search for a home</h5>
                        <div class="space18"></div>
                        <h2>Find Your Perfect home</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="s-porpeties-video"
                        style="background-image: url(assets/img/all-images/others/bg-1.png); background-position: center; background-repeat: no-repeat; background-size: cover;">
                        <div class="col-lg-12">

                            <div class="space80"></div>
                            <div class="tab-header">
                                <button class="tab-btn" data-tab="for-rent">For Rent</button>
                            </div>
                            <div class="property-tab-section b-bg1">
                                <form action="{{ route('property.filter') }}" method="GET" target="_blank">
                                    <div class="tab-content1" id="for-rent" style="display: block;">
                                        <div class="filters">
                                            <div class="filter-group">
                                                <label>Home Type</label>
                                                <select name="category" class="form-control">
                                                    <option value="">Select Home Type</option>
                                                    @foreach ($category as $type)
                                                        <option value="{{ $type->slug }}">{{ $type->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="filter-group">
                                                <label>State</label>
                                                <select name="state" id="state" class="form-control">
                                                    <option value="">Select a State</option>
                                                    @foreach (['Delta', 'Lagos', 'Edo'] as $state)
                                                        <option value="{{ strtolower($state) }}"
                                                            {{ old('state') == strtolower($state) ? 'selected' : '' }}>
                                                            {{ $state }}
                                                            <span style="font-size: 10px; color: green">(Nigeria)</span>
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="filter-group">
                                                <label>Status</label>
                                                <select name="type" class="form-control">
                                                    <option value="">Select Status</option>
                                                    <option value="rent">Rent</option>
                                                    <option value="sale">Sale</option>
                                                </select>
                                            </div>
                                            <div class="filter-group">
                                                <label>Rooms</label>
                                                <select name="rooms_num" class="form-control">
                                                    <option value="">Select number</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                            </div>

                                            <div class="search-button">
                                                <button id="search-sale1" type="submit">Search <span class="arrow1"><i
                                                            class="fa-solid fa-arrow-right"></i></span><span
                                                        class="arrow2"><i
                                                            class="fa-solid fa-arrow-right"></i></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== END SEARCH HOME AREA ENDS =======-->


    <!--===== GALLERY AREA STARTS =======-->
    <div class="galley4-section-area sp1">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 m-auto">
                    <div class="heading2 text-center space-margin60">
                        <h5><svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24"
                                fill="none">
                                <path
                                    d="M2.5 20H4.5M4.5 20H10.5M4.5 20V11.452C4.5 10.918 4.5 10.651 4.565 10.402C4.62256 10.1819 4.71725 9.97322 4.845 9.78497C4.99 9.57197 5.191 9.39497 5.593 9.04397L10.394 4.84197C11.14 4.18997 11.513 3.86397 11.932 3.73997C12.302 3.62997 12.697 3.62997 13.067 3.73997C13.487 3.86397 13.861 4.18997 14.607 4.84397L19.407 9.04397C19.809 9.39597 20.01 9.57197 20.155 9.78397C20.283 9.9753 20.3763 10.1813 20.435 10.402C20.5 10.651 20.5 10.918 20.5 11.452V20M10.5 20H14.5M10.5 20V16C10.5 15.4695 10.7107 14.9608 11.0858 14.5858C11.4609 14.2107 11.9696 14 12.5 14C13.0304 14 13.5391 14.2107 13.9142 14.5858C14.2893 14.9608 14.5 15.4695 14.5 16V20M20.5 20H14.5M20.5 20H22.5"
                                    stroke="#ED8438" stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg> See Our Featured Gallery</h5>
                        <div class="space18"></div>
                        <h2>Browse Our Gallery of Dream Homes</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="all-galler-images" data-aos="fade-left" data-aos-duration="1000">
                        <div class="big-img">
                            <img style="width: 1370px; height: 600px;"
                                src="{{ asset('uploads/gallery/' . $gallery->image1) }}" alt="{{ $settings->site_name }}">
                        </div>
                        <div class="big-img">
                            <img style="width: 1370px; height: 600px;"
                                src="{{ asset('uploads/gallery/' . $gallery->image2) }}" alt="{{ $settings->site_name }}">
                        </div>
                        <div class="big-img">
                            <img style="width: 1370px; height: 600px;"
                                src="{{ asset('uploads/gallery/' . $gallery->image3) }}" alt="{{ $settings->site_name }}">
                        </div>
                        <div class="big-img">
                            <img style="width: 1370px; height: 600px;"
                                src="{{ asset('uploads/gallery/' . $gallery->image4) }}" alt="{{ $settings->site_name }}">
                        </div>
                        <div class="big-img">
                            <img style="width: 1370px; height: 600px;"
                                src="{{ asset('uploads/gallery/' . $gallery->image5) }}" alt="{{ $settings->site_name }}">
                        </div>
                        <div class="big-img">
                            <img style="width: 1370px; height: 600px;"
                                src="{{ asset('uploads/gallery/' . $gallery->image6) }}" alt="{{ $settings->site_name }}">
                        </div>
                    </div>
                    <div class="bottom-galler-images" data-aos="fade-right" data-aos-duration="1100">
                        <div class="small-img">
                            <img style="width: 270px; height: 200px;"
                                src="{{ asset('uploads/gallery/' . $gallery->image1) }}" alt="{{ $settings->site_name }}">
                        </div>
                        <div class="small-img">
                            <img style="width: 270px; height: 200px;"
                                src="{{ asset('uploads/gallery/' . $gallery->image2) }}" alt="{{ $settings->site_name }}">
                        </div>
                        <div class="small-img">
                            <img style="width: 270px; height: 200px;"
                                src="{{ asset('uploads/gallery/' . $gallery->image3) }}" alt="{{ $settings->site_name }}">
                        </div>
                        <div class="small-img">
                            <img style="width: 270px; height: 200px;"
                                src="{{ asset('uploads/gallery/' . $gallery->image4) }}" alt="{{ $settings->site_name }}">
                        </div>
                        <div class="small-img">
                            <img style="width: 270px; height: 200px;"
                                src="{{ asset('uploads/gallery/' . $gallery->image5) }}" alt="{{ $settings->site_name }}">
                        </div>
                        <div class="small-img">
                            <img style="width: 270px; height: 200px;"
                                src="{{ asset('uploads/gallery/' . $gallery->image6) }}" alt="{{ $settings->site_name }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== GALLERY AREA ENDS =======-->


    <!--===== CTA AREA STARTS =======-->
    <div class="cat4-section-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-bg-area">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="heading2">
                                    <h2>Helping You Find More Than Just a House — A Home</h2>
                                    <div class="space28"></div>
                                    <form>
                                        <input type="email" placeholder="Email Address">
                                        <button type="submit" class="vl-btn1">Subscribe <span class="arrow1"><i
                                                    class="fa-solid fa-arrow-right"></i></span><span class="arrow2"><i
                                                    class="fa-solid fa-arrow-right"></i></span></button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="cta-images-area">
                                    <img src="{{ asset('assets/img/elements/elements7.png') }}"
                                        alt="{{ $settings->site_name }}" class="elements7 aniamtion-key-1">
                                    <div class="img1 text-end">
                                        <img src="{{ asset('assets/img/all-images/cta/cta-img1.png') }}"
                                            alt="{{ $settings->site_name }}">
                                    </div>
                                    <div class="villa-listing">
                                        <div class="list">
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor">
                                                    <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                                                </svg></a>
                                        </div>
                                        <div class="space8"></div>
                                        <div class="villa-images">
                                            <div class="img1">
                                                <img src="{{ asset('assets/img/all-images/properties/property-img38.png') }}"
                                                    alt="{{ $settings->site_name }}">
                                            </div>
                                            <div class="text">
                                                <a href="property-details-v1.html">Explore More</a>
                                                <div class="space10"></div>
                                                <p>#Find a Match</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== CTA AREA ENDS =======-->
    <div class="space80"></div>
    @include('inc.homepages.footer')
    <div class="space40"></div>


    @push('scripts')
    <script>
        function shareProperty(url) {
            const title = 'Check out this beautiful home!';
            const text = 'Take a look at this property I found.';

            if (navigator.share) {
                navigator.share({
                    title: title,
                    text: text,
                    url: url,
                }).catch((error) => console.error('Sharing failed:', error));
            } else {
                const fbUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
                window.open(fbUrl, '_blank');
            }
        }
    </script>
    @endpush

@endforeach
@endsection
