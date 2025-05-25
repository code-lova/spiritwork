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
    <!--===== DASHBOARD AREA STARTS =======-->
    <div class="add-property-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="property-boxarea">
                        <h3>Report</h3>
                        <div class="space40"></div>
                        <div class="all-tabs-boxarea">

                            <form action="{{ route('user.store.reports') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="tab-content" id="pills-tabContent">

                                    <div class="col-lg-12">

                                        <h5>Tittle Message*</h5>
                                        <div class="space16"></div>
                                        <div class="input-area">
                                            <input type="text" name="title" maxlength="20" placeholder="Title" required value="{{ old('title') }}">
                                            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="space30"></div>

                                        <h5>Attach an image(Optional)</h5>
                                        <div class="space16"></div>
                                        <div class="input-area">
                                            <input type="file" name="attachment">
                                            @error('attachment') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="space32"></div>

                                        <h5>Message Note*</h5>
                                        <div class="space16"></div>
                                        <div class="input-area">
                                            <textarea name="message" placeholder="Your Message" required>{{ old('message') }}</textarea>
                                            @error('message') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="space30"></div>

                                <div style="display: flex; justify-content:center">
                                    <button type="submit" class="vl-btn1">
                                        Submit report
                                        <span class="arrow1"><i class="fa-solid fa-arrow-right"></i></span>
                                        <span class="arrow2"><i class="fa-solid fa-arrow-right"></i></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--===== DASHBOARD AREA ENDS =======-->
    <div class="space30"></div>
@endsection
