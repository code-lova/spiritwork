@extends('layouts.user.user_layout')

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
                        <p><a href="{{ route('user.dashboard') }}">Home</a> <svg xmlns="http://www.w3.org/2000/svg"
                                width="9" height="16" viewBox="0 0 9 16" fill="none">
                                <path d="M1.5 1.74997L7.75 7.99997L1.5 14.25" stroke="#1B1B1B" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg> {{ $subtitle }}</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="inner-images">
                        <img src="{{ asset('uploads/about/' . $about->banner_img) }}" alt="{{ $settings->site_name }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== HERO AREA ENDS =======-->
    <div class="space30"></div>
    <!--===== AGREEMENT AREA STARTS =======-->
    <div class="add-property-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="property-boxarea">
                        <h4>Complete your part of the agreement</h4>
                        <div class="space40"></div>
                        <div class="all-tabs-boxarea">

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab" tabindex="0">
                                    <div class="space48"></div>
                                    <h3>In Presence of Withness</h3>
                                    <div class="space28"></div>
                                    <form action="{{ route('user.agreement.submit') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="agreementId" value="{{ $agreementId->id }}">
                                        <div class="col-lg-12">

                                            <h5>Full Name</h5>
                                            <div class="space16"></div>
                                            <div class="input-area">
                                                <input type="text" name="name" placeholder="Enter your full name" required>
                                            </div>

                                            <div class="space32"></div>

                                            <h5>Signature</h5>
                                            <div class="space16"></div>
                                            <div class="input-area">
                                                <input type="text" name="signature" placeholder="Enter only last name" required>
                                            </div>

                                            <div class="space32"></div>

                                            <h5>Date</h5>
                                            <div class="space16"></div>
                                            <div class="input-area">
                                                <input type="date" name="date" placeholder="Current date" required>
                                            </div>

                                            <div class="space32"></div>

                                            <h5>Home Address*</h5>
                                            <div class="space16"></div>
                                            <div class="input-area">
                                                <textarea name="address" placeholder="Your current home address" required></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                              <div class="space40"></div>
                                              <div class="btn-area1 text-end">
                                                <button type="submit" class="vl-btn1">
                                                    Submit Details
                                                    <span class="arrow1">
                                                        <i class="fa-solid fa-arrow-right"></i>
                                                    </span>
                                                    <span class="arrow2">
                                                        <i class="fa-solid fa-arrow-right"></i>
                                                    </span>
                                                </button>
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
    </div>
@endsection
