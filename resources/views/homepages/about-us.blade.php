@extends('layouts.otherpage_layout')

@section('title', "$settings->title")
@section('meta_description', "$settings->site_description")
@section('meta_keyword', "$settings->keywords")
@section('website_name', "$settings->site_name")

@section('content')


    <!--===== HERO AREA STARTS =======-->
  <div class="inner-header-area">
    <div class="containe-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="inner-header heading1">
            <h2>{{ $title }}</h2>
            <div class="space28"></div>
            <p><a href="{{ url('/') }}">Home</a> <svg xmlns="http://www.w3.org/2000/svg" width="9" height="16" viewBox="0 0 9 16" fill="none">
                <path d="M1.5 1.74997L7.75 7.99997L1.5 14.25" stroke="#1B1B1B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg> {{ $title }}</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="inner-images">
            <img src="{{ asset('uploads/about/'. $about->banner_img) }}" alt="{{ $settings->site_name }}">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== HERO AREA ENDS =======-->

  <div class="space30"></div>

  <!--===== ABOUT AREA STARTS =======-->
  <div class="about1-section-area">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-5">
          <div class="about-img1 image-anime reveal">
            <img style="width: 531px; height: 600px;" src="{{ asset('uploads/about/'. $about->side1_img) }}" alt="{{ $settings->site_name }}">
          </div>
        </div>
        <div class="col-lg-3">
            <div class="heading1">
              <div class="head">
                <h5>About {{ $settings->site_name }}</h5>
                <div class="space16"></div>
                <h3>Quality Rentals, Inspired Living</h3>
              </div>
              <div class="space20"></div>
              <div class="perag-bg">
                <p data-aos="fade-up" data-aos-duration="900">
                  OCHeaven Homes is your gateway to stylish, comfortable, and quality rental homes. We blend thoughtful design with seamless service to create a living experience that feels like home from day one.
                </p>
                <div class="space32"></div>
                <div class="btn-area1" data-aos="fade-up" data-aos-duration="1000">
                  <a href="{{ route('properties') }}" class="vl-btn1">See Properties
                    <span class="arrow1"><i class="fa-solid fa-arrow-right"></i></span>
                    <span class="arrow2"><i class="fa-solid fa-arrow-right"></i></span>
                  </a>
                </div>
              </div>
            </div>
        </div>

        <div class="col-lg-4">
          <div class="about-img2 image-anime reveal">
            <img style="width: 430px; height: 600px;" src="{{ asset('uploads/about/'. $about->side2_img) }}" alt="{{ $settings->site_name }}">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== ABOUT AREA ENDS =======-->

  <div class="space30"></div>

  <!--===== OTHERS AREA STARTS =======-->
  <div class="miision1">
    <div class="containr-fluid">
      <div class="row">
        <div class="col-lg-6 m-auto">
          <div class="heading1 text-center space-margin60">
            <h5>Mission & Vision</h5>
            <div class="space16"></div>
            <h2>Our Mission & Vision</h2>
          </div>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="images1">
            <img style="width: 605px; height: 562px;" src="{{ asset('uploads/about/'. $about->mv_img) }}" alt="{{ $settings->site_name }}">
          </div>
        </div>
        <div class="col-lg-6">
            <div class="mission-heading heading1">
              <div class="space16"></div>
                {!! $about->our_mission !!}
              <div class="space32"></div>
              <h3>Our Vision</h3>
              <div class="space16"></div>
              <p>{!! $about->our_vision !!}</p>
              <div class="space32"></div>
              <div class="btn-area1">
                <a href="{{ route('properties') }}" class="vl-btn1">See All Properties <span class="arrow1"><i class="fa-solid fa-arrow-right"></i></span><span class="arrow2"><i class="fa-solid fa-arrow-right"></i></span></a>
              </div>
            </div>
        </div>

      </div>
    </div>
  </div>
  <!--===== OTHERS AREA ENDS =======-->

  <div class="space30"></div>

  <!--===== OTHERS AREA STARTS =======-->
    <div class="choose1">
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 m-auto">
            <div class="heading1 text-center space-margin60">
                <h5>Why Choose Us</h5>
                <div class="space16"></div>
                <h2>Why OCHeaven Homes Stands Out</h2>
            </div>
            </div>
        </div>
            <div class="row">
                <div class="col-lg-6">
                <div class="choose-heading heading1">
                    <h2>Homes That Speak to Comfort & Style</h2>
                    <div class="space16"></div>
                    <p>
                    At OCHeaven Homes, we believe your rental experience should be as relaxing as your future home. With handpicked properties and friendly service, we take the stress out of the search.
                    </p>
                    <div class="space24"></div>
                    <div class="choose-box">
                    <a href="our-service.html">Expert Support</a>
                    <div class="space16"></div>
                    <p>
                        Our team is here to guide you every step of the way, from inquiry to move-in and beyond.
                    </p>
                    </div>
                    <div class="space24"></div>
                    <div class="choose-box">
                    <a href="our-service.html">Carefully Selected Rentals</a>
                    <div class="space16"></div>
                    <p>
                        From trendy studios to family-friendly homes, our listings match comfort with quality.
                    </p>
                    </div>
                    <div class="space24"></div>
                    <div class="choose-box">
                    <a href="our-service.html">People-First Experience</a>
                    <div class="space16"></div>
                    <p>
                        We’re not just renting houses — we’re helping people find homes they truly love.
                    </p>
                    </div>
                    <div class="space32"></div>
                    <div class="btn-area1">
                    <a href="contact.html" class="vl-btn1">Contact Us
                        <span class="arrow1"><i class="fa-solid fa-arrow-right"></i></span>
                        <span class="arrow2"><i class="fa-solid fa-arrow-right"></i></span>
                    </a>
                    </div>
                </div>
                </div>
                <div class="col-lg-6">
                <div class="chosse-images">
                    <img src="assets/img/elements/elements8.png" alt="OCHeaven Homes" class="elements8">
                    <div class="img1 text-end">
                        <img style="width: 487px; height: 540px; border-radius: 10px;" src="assets/img/all-images/others/others-img14.jpeg" alt="OCHeaven Homes">
                    </div>
                    <div class="img2">
                        <img style="width: 340px; height: 390px;" src="assets/img/all-images/others/others-img13.jpg" alt="OCHeaven Homes">
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
  <!--===== OTHERS AREA ENDS =======-->

  <div class="space30"></div>



@endsection
