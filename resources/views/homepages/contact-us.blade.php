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
            <p><a href="{{ route('homepage') }}">Home</a> <svg xmlns="http://www.w3.org/2000/svg" width="9" height="16" viewBox="0 0 9 16" fill="none">
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
<!--===== CONTACT AREA STARTS =======-->
<div class="contact-inner">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="phone-number">
          <div class="img1">
            <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none">
              <path
                d="M5.83333 24.0013L12.5 16.0013M27.1667 24.0013L20.5 16.0013M4.5 10.668L14.1333 17.0901C14.9887 17.6604 15.4163 17.9456 15.8785 18.0562C16.2871 18.1542 16.7129 18.1542 17.1215 18.0562C17.5837 17.9456 18.0113 17.6604 18.8667 17.0901L28.5 10.668M8.76667 25.3346H24.2333C25.7268 25.3346 26.4736 25.3346 27.044 25.044C27.5457 24.7884 27.9537 24.3804 28.2093 23.8786C28.5 23.3082 28.5 22.5614 28.5 21.068V10.9346C28.5 9.44117 28.5 8.69442 28.2093 8.124C27.9537 7.62222 27.5457 7.21428 27.044 6.95862C26.4736 6.66797 25.7268 6.66797 24.2333 6.66797H8.76667C7.2732 6.66797 6.52645 6.66797 5.95603 6.95862C5.45425 7.21428 5.04631 7.62222 4.79065 8.124C4.5 8.69442 4.5 9.44116 4.5 10.9346V21.068C4.5 22.5614 4.5 23.3082 4.79065 23.8786C5.04631 24.3804 5.45425 24.7884 5.95603 25.044C6.52645 25.3346 7.27319 25.3346 8.76667 25.3346Z"
                stroke="#ED8438" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <div class="content">
            <p>Our Email</p>
            <a href="{{ $settings->email }}">{{ $settings->email }}</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="phone-number">
          <div class="img1">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
              <path
                d="M18.7333 7.99935C20.0357 8.25344 21.2325 8.89036 22.1708 9.8286C23.1091 10.7668 23.746 11.9637 24 13.266M18.7333 2.66602C21.4391 2.9666 23.9621 4.17824 25.8884 6.10203C27.8145 8.0258 29.0295 10.5474 29.3333 13.2527M24.6667 27.9993C13.2528 27.9993 4 18.7465 4 7.33268C4 6.81772 4.01884 6.30716 4.05585 5.80166C4.09833 5.22151 4.11957 4.93144 4.2716 4.66739C4.39752 4.4487 4.62067 4.2413 4.84797 4.13168C5.12241 3.99935 5.44251 3.99935 6.08268 3.99935H9.83909C10.3774 3.99935 10.6466 3.99935 10.8774 4.08795C11.0812 4.16622 11.2627 4.29334 11.4059 4.45815C11.568 4.64472 11.66 4.8977 11.844 5.40363L13.3988 9.67942C13.6128 10.2681 13.7199 10.5624 13.7017 10.8416C13.6857 11.0878 13.6016 11.3248 13.4589 11.5261C13.2971 11.7544 13.0286 11.9155 12.4915 12.2378L10.6667 13.3327C12.2692 16.8645 15.1335 19.7325 18.6667 21.3327L19.7616 19.5079C20.0839 18.9707 20.2449 18.7021 20.4732 18.5404C20.6745 18.3977 20.9115 18.3136 21.1577 18.2976C21.4369 18.2795 21.7313 18.3865 22.32 18.6005L26.5957 20.1553C27.1016 20.3393 27.3547 20.4313 27.5412 20.5935C27.706 20.7367 27.8332 20.9181 27.9113 21.122C28 21.3527 28 21.6219 28 22.1603V25.9167C28 26.5568 28 26.877 27.8676 27.1514C27.758 27.3787 27.5507 27.6019 27.332 27.7278C27.0679 27.8798 26.7779 27.9009 26.1977 27.9435C25.6921 27.9805 25.1816 27.9993 24.6667 27.9993Z"
                stroke="#ED8438" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <div class="content">
            <p>Phone</p>
            <a href="{{ $settings->mobile }}">{{ $settings->mobile }}</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="phone-number">
          <div class="img1">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
              <path d="M16.0013 29.3327C23.3651 29.3327 29.3346 23.3631 29.3346 15.9993C29.3346 8.63555 23.3651 2.66602 16.0013 2.66602C8.63751 2.66602 2.66797 8.63555 2.66797 15.9993C2.66797 23.3631 8.63751 29.3327 16.0013 29.3327Z" stroke="#ED8438" stroke-width="2.5" />
              <path
                d="M16.6314 9.15785C16.6314 8.51839 16.113 8 15.4735 8C14.8341 8 14.3157 8.51839 14.3157 9.15785H16.6314ZM18.6079 18.3738C18.1557 17.9217 17.4227 17.9217 16.9706 18.3738C16.5184 18.826 16.5184 19.559 16.9706 20.0112L18.6079 18.3738ZM19.2862 22.3269C19.7384 22.7791 20.4714 22.7791 20.9236 22.3269C21.3758 21.8747 21.3758 21.1417 20.9236 20.6895L19.2862 22.3269ZM14.3157 9.15785V14.5611H16.6314V9.15785H14.3157ZM16.9706 20.0112L19.2862 22.3269L20.9236 20.6895L18.6079 18.3738L16.9706 20.0112ZM16.6314 16.8768C16.6314 17.5163 16.113 18.0347 15.4735 18.0347V20.3504C17.3919 20.3504 18.9471 18.7951 18.9471 16.8768H16.6314ZM15.4735 18.0347C14.8341 18.0347 14.3157 17.5163 14.3157 16.8768H12C12 18.7951 13.5552 20.3504 15.4735 20.3504V18.0347ZM14.3157 16.8768C14.3157 16.2374 14.8341 15.719 15.4735 15.719V13.4033C13.5552 13.4033 12 14.9585 12 16.8768H14.3157ZM15.4735 15.719C16.113 15.719 16.6314 16.2374 16.6314 16.8768H18.9471C18.9471 14.9585 17.3919 13.4033 15.4735 13.4033V15.719Z"
                fill="#ED8438" />
            </svg>
          </div>
          <div class="content">
            <p>Schedule</p>
            <a href="tel:{{ $settings->mobile }}">Monday-Fri: 9 AM – 5 PM</a>
          </div>
        </div>
      </div>
    </div>
    <div class="space50"></div>
    <div class="row">
      <div class="col-lg-6">
        <div class="chosse-images">
          <img src="{{ asset('assets/img/elements/elements8.png') }}" alt="{{ $settings->site_name }}" class="elements8">
          <div class="img1 text-end">
            <img style="width: 450px; height: 540px; border-radius: 10px;" src="{{ asset('assets/img/all-images/others/others-img14.jpeg') }}" alt="{{ $settings->site_name }}">
          </div>
          <div class="img2">
            <img style="width: 340px; height: 390px;" src="{{ asset('assets/img/all-images/others/others-img13.jpg') }}" alt="OCHeaven Homes">
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="contact-boxarea">
          <div class="bg-area">
            <h3>Send Us A Message</h3>
            <div class="space8"></div>
            <div class="row">
              <div class="col-lg-6">
                <div class="input-area">
                  <input type="text" placeholder="Your Name">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="input-area">
                  <input type="text" placeholder="Last Name*">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="input-area">
                  <input type="number" placeholder="Phone Number ">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="input-area">
                  <input type="email" placeholder="Email Address*">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="input-area">
                  <input type="text" placeholder="Service Type*">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="input-area">
                  <textarea placeholder="Your Message"></textarea>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="space16"></div>
                <div class="input-area text-end">
                  <button type="submit" class="vl-btn1">Submit Now <span class="arrow1"><i class="fa-solid fa-arrow-right"></i></span><span class="arrow2"><i class="fa-solid fa-arrow-right"></i></span></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="space30"></div>
<div class="maps-area">
  <div class="containe-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d507364.9429836921!2d2.6599965380807418!3d6.548352874720573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8b2ae68280c1%3A0xdc9e87a367c3d9cb!2sLagos!5e0!3m2!1sen!2sng!4v1746206240699!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===== CONTACT AREA ENDS =======-->



@endsection
