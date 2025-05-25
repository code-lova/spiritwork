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
              </svg> <span>Listing</span> <svg xmlns="http://www.w3.org/2000/svg" width="9" height="16" viewBox="0 0 9 16" fill="none">
                <path d="M1.5 1.74997L7.75 7.99997L1.5 14.25" stroke="#1B1B1B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg> {{ $title }}</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="inner-images">
            <img src="{{ asset('uploads/about/'.$about->banner_img) }}" alt="{{ $settings->site_name }}">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== HERO AREA ENDS =======-->
  <!--===== PROPERTIES AREA STARTS =======-->
  <div class="properties2-details sp1">
    <div class="container-fluid">
      <div class="row">

        <!--===== for property image scrolling section =======-->
        <div class="col-lg-7">
            <div class="all-galler-images2" data-aos="fade-left" data-aos-duration="1000">
                @if($property->PropertyImages && count($property->PropertyImages))
                    @foreach($property->PropertyImages as $image)
                        <div class="big-img">
                            <img src="{{ asset('uploads/property/'.$image->image) }}" alt="{{ $settings->site_name }}">
                        </div>
                    @endforeach
                @endif

            </div>
            <div class="bottom-galler-images2" data-aos="fade-right" data-aos-duration="1100">
                @if($property->PropertyImages && count($property->PropertyImages))
                    @foreach($property->PropertyImages as $image)
                        <div class="small-img">
                            <img src="{{ asset('uploads/property/'.$image->image) }}" alt="{{ $settings->site_name }}">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <!--===== property details =======-->
        <div class="col-lg-5">
            <div class="heading1">
                <div class="content-area">
                    <h4 class="title">{{ $property->property_name }}</h4>
                    <div class="space32"></div>
                    <p><span class="s-tiltle2">Location:</span><span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="22" viewBox="0 0 18 22" fill="none">
                            <path
                            d="M9 5C8.25832 5 7.5333 5.21993 6.91661 5.63199C6.29993 6.04404 5.81928 6.62971 5.53545 7.31494C5.25162 8.00016 5.17736 8.75416 5.32205 9.48159C5.46675 10.209 5.8239 10.8772 6.34835 11.4017C6.8728 11.9261 7.54098 12.2833 8.26841 12.4279C8.99584 12.5726 9.74984 12.4984 10.4351 12.2145C11.1203 11.9307 11.706 11.4501 12.118 10.8334C12.5301 10.2167 12.75 9.49168 12.75 8.75C12.75 7.75544 12.3549 6.80161 11.6517 6.09835C10.9484 5.39509 9.99456 5 9 5ZM9 11C8.55499 11 8.11998 10.868 7.74997 10.6208C7.37996 10.3736 7.09157 10.0222 6.92127 9.61104C6.75097 9.1999 6.70642 8.7475 6.79323 8.31105C6.88005 7.87459 7.09434 7.47368 7.40901 7.15901C7.72368 6.84434 8.12459 6.63005 8.56105 6.54323C8.9975 6.45642 9.4499 6.50097 9.86104 6.67127C10.2722 6.84157 10.6236 7.12996 10.8708 7.49997C11.118 7.86998 11.25 8.30499 11.25 8.75C11.25 9.34674 11.0129 9.91903 10.591 10.341C10.169 10.7629 9.59674 11 9 11ZM9 0.5C6.81273 0.502481 4.71575 1.37247 3.16911 2.91911C1.62247 4.46575 0.752481 6.56273 0.75 8.75C0.75 11.6938 2.11031 14.8138 4.6875 17.7734C5.84552 19.1108 7.14887 20.3151 8.57344 21.3641C8.69954 21.4524 8.84978 21.4998 9.00375 21.4998C9.15772 21.4998 9.30796 21.4524 9.43406 21.3641C10.856 20.3147 12.1568 19.1104 13.3125 17.7734C15.8859 14.8138 17.25 11.6938 17.25 8.75C17.2475 6.56273 16.3775 4.46575 14.8309 2.91911C13.2843 1.37247 11.1873 0.502481 9 0.5ZM9 19.8125C7.45031 18.5938 2.25 14.1172 2.25 8.75C2.25 6.95979 2.96116 5.2429 4.22703 3.97703C5.4929 2.71116 7.20979 2 9 2C10.7902 2 12.5071 2.71116 13.773 3.97703C15.0388 5.2429 15.75 6.95979 15.75 8.75C15.75 14.1153 10.5497 18.5938 9 19.8125Z"
                            fill="#1B1B1B" />
                        </svg></span> {{ $property->address }}, {{ $property->city }}, {{ $property->state }} State,
                    </p>
                    <div class="space24"></div>
                    <div class="property-other-widget">
                        <ul>
                            <li><span class="s-tiltle">Features:</span></li>
                            <li><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M8 9H16M8 15H16" stroke="#1B1B1B" stroke-width="1.5" stroke-linejoin="round" />
                                    <path d="M3 21H21V3.00046L3 3V21Z" stroke="#1B1B1B" stroke-width="1.5" stroke-linejoin="round" />
                                </svg></span>{{ $property->square_ft }} sqft</li>
                            <li><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M22 17.5H2" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M22 21V16C22 14.1144 22 13.1716 21.4142 12.5858C20.8284 12 19.8856 12 18 12H6C4.11438 12 3.17157 12 2.58579 12.5858C2 13.1716 2 14.1144 2 16V21" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M16 12V10.6178C16 10.1103 15.9085 9.94054 15.4396 9.7405C14.4631 9.32389 13.2778 9 12 9C10.7222 9 9.53688 9.32389 8.5604 9.7405C8.09154 9.94054 8 10.1103 8 10.6178V12" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M20 12V7.36057C20 6.66893 20 6.32311 19.8292 5.99653C19.6584 5.66995 19.4151 5.50091 18.9284 5.16283C16.9661 3.79978 14.5772 3 12 3C9.42282 3 7.03391 3.79978 5.07163 5.16283C4.58492 5.50091 4.34157 5.66995 4.17079 5.99653C4 6.32311 4 6.66893 4 7.36057V12" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" />
                                </svg></span>{{ $property->rooms_num }} Bed Rooms</li>
                            <li><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M6 20L5 21M18 20L19 21" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M3 12V13C3 16.2998 3 17.9497 4.02513 18.9749C5.05025 20 6.70017 20 10 20H14C17.2998 20 18.9497 20 19.9749 18.9749C21 17.9497 21 16.2998 21 13V12" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M2 12H22" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M4 12V5.5234C4 4.12977 5.12977 3 6.5234 3C7.64166 3 8.62654 3.73598 8.94339 4.80841L9 5" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M8 6L10.5 4" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" />
                                </svg></span>{{ $property->bathrooms_num }} Baths</li>
                            <li><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M22 17.5H2" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M22 21V16C22 14.1144 22 13.1716 21.4142 12.5858C20.8284 12 19.8856 12 18 12H6C4.11438 12 3.17157 12 2.58579 12.5858C2 13.1716 2 14.1144 2 16V21" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M16 12V10.6178C16 10.1103 15.9085 9.94054 15.4396 9.7405C14.4631 9.32389 13.2778 9 12 9C10.7222 9 9.53688 9.32389 8.5604 9.7405C8.09154 9.94054 8 10.1103 8 10.6178V12" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M20 12V7.36057C20 6.66893 20 6.32311 19.8292 5.99653C19.6584 5.66995 19.4151 5.50091 18.9284 5.16283C16.9661 3.79978 14.5772 3 12 3C9.42282 3 7.03391 3.79978 5.07163 5.16283C4.58492 5.50091 4.34157 5.66995 4.17079 5.99653C4 6.32311 4 6.66893 4 7.36057V12" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" />
                                </svg></span>{{ $property->master_bedrooms_num }} Master Bed Rooms</li>
                        </ul>
                        <div class="space32"></div>
                        <p><span class="s-tiltle2">Type:</span><span></span> {{ $property->category->name }}, {{ ucfirst($property->type) }}, Estate
                        </p>
                        <div class="space32"></div>

                        <div class="btn-area">
                            <div class="nm-btn">
                                <p><a href="#">#@php echo number_format($property->price) @endphp</a> /Per Year</p>
                            </div>
                            <div class="love-share">
                                <a href="#" class="share"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="18" viewBox="0 0 17 18" fill="none">
                                    <path
                                    d="M9.93383 13.185L6.43473 11.2763C5.82645 11.9264 4.96083 12.3327 4.00033 12.3327C2.15938 12.3327 0.666992 10.8403 0.666992 8.99935C0.666992 7.1584 2.15938 5.66602 4.00033 5.66602C4.96078 5.66602 5.82637 6.07223 6.43464 6.72223L9.93383 4.81362C9.86841 4.55302 9.83366 4.28024 9.83366 3.99935C9.83366 2.1584 11.3261 0.666016 13.167 0.666016C15.0079 0.666016 16.5003 2.1584 16.5003 3.99935C16.5003 5.8403 15.0079 7.33268 13.167 7.33268C12.2065 7.33268 11.3409 6.92644 10.7326 6.2764L7.23347 8.18502C7.29891 8.4456 7.33366 8.71843 7.33366 8.99935C7.33366 9.28027 7.29892 9.55302 7.2335 9.8136L10.7327 11.7223C11.3409 11.0723 12.2065 10.666 13.167 10.666C15.0079 10.666 16.5003 12.1584 16.5003 13.9993C16.5003 15.8403 15.0079 17.3327 13.167 17.3327C11.3261 17.3327 9.83366 15.8403 9.83366 13.9993C9.83366 13.7184 9.86841 13.4456 9.93383 13.185ZM4.00033 10.666C4.9208 10.666 5.66699 9.91985 5.66699 8.99935C5.66699 8.07885 4.9208 7.33268 4.00033 7.33268C3.07985 7.33268 2.33366 8.07885 2.33366 8.99935C2.33366 9.91985 3.07985 10.666 4.00033 10.666ZM13.167 5.66602C14.0875 5.66602 14.8337 4.91982 14.8337 3.99935C14.8337 3.07887 14.0875 2.33268 13.167 2.33268C12.2465 2.33268 11.5003 3.07887 11.5003 3.99935C11.5003 4.91982 12.2465 5.66602 13.167 5.66602ZM13.167 15.666C14.0875 15.666 14.8337 14.9198 14.8337 13.9993C14.8337 13.0788 14.0875 12.3327 13.167 12.3327C12.2465 12.3327 11.5003 13.0788 11.5003 13.9993C11.5003 14.9198 12.2465 15.666 13.167 15.666Z"
                                    fill="#ED8438" />
                                </svg></a>
                            </div>
                        </div>
                        <div class="space32"></div>
                        <div class="space32"></div>
                        @auth
                            <form action="{{ route('user.agreement.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="propertyId" value="{{ $property->id }}">
                                <input type="hidden" name="catId" value="{{ $property->category->id }}">
                                <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                                <div style="display: flex; justify-content:center">
                                    @if ($property->availability)
                                        <button type="submit" class="vl-btn1">
                                            Apply to rent this property
                                            <span class="arrow1"><i class="fa-solid fa-arrow-right"></i></span>
                                            <span class="arrow2"><i class="fa-solid fa-arrow-right"></i></span>
                                        </button>
                                    @else
                                        <button disabled class="vl-btn1">
                                            Sorry, Property fully booked
                                            <span class="arrow1"><i class="fa-solid fa-arrow-right"></i></span>
                                            <span class="arrow2"><i class="fa-solid fa-arrow-right"></i></span>
                                        </button>
                                    @endif

                                </div>
                            </form>
                        @endauth

                        @guest
                            <div style="display: flex; justify-content:center">
                                <a href="{{ route('login') }}" class="vl-btn1">
                                    Apply for this property
                                    <span class="arrow1"><i class="fa-solid fa-arrow-right"></i></span>
                                    <span class="arrow2"><i class="fa-solid fa-arrow-right"></i></span>
                                </a>
                            </div>
                        @endguest

                    </div>
                </div>
            </div>
        </div>

      </div>
    </div>
  </div>
  <!--===== PROPERTIES AREA ENDS =======-->

  <!--===== PROPERTY BOOKING TOUR AND DESCRIPTION STARTS =======-->
  <div class="property-inner-section-find">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="property-mapgrid-area">
            <div class="space32"></div>

            <div class="row">

                <div class="col-lg-4">
                    <div class="sidebar1-area">
                        <form action="{{ route('tour.schedule') }}" method="POST">
                            @csrf
                            <div class="details-siderbar2">
                                <h4>Schedule A Viewing</h4>
                                <h5>Book a Tour Today!</h5>
                                <div class="space10"></div>
                                <div class="input-area">
                                    <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
                                </div>
                                <div class="input-area">
                                    <input type="number" name="phone" placeholder="Phone Number" value="{{ old('phone') }}" required>
                                </div>
                                <div class="input-area">
                                    <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
                                </div>
                                <div class="input-area">
                                    <textarea name="message" placeholder="Your Message" required>{{ old('message') }}</textarea>
                                </div>
                                <div class="input-area">
                                    <button type="submit" class="vl-btn1">Send tour request
                                        <span class="arrow1"><i class="fa-solid fa-arrow-right"></i></span>
                                        <span class="arrow2"><i class="fa-solid fa-arrow-right"></i></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    <div class="space30"></div>
                    </div>
                 </div>

              <div class="col-lg-8">
                <div class="property-widget-sidebar">
                    <div class="img1">
                        @if($property->PropertyImages)
                            <div class="small-img">
                                <img src="{{ asset('uploads/property/'.$property->PropertyImages[0]->image) }}" alt="{{ $settings->site_name }}">
                            </div>
                        @endif
                    </div>
                    <div class="space40"></div>
                    <div class="padding-side">
                        <h3>About This Property</h3>
                        <div class="space24"></div>
                        <p>{!! $property->description !!}</p>
                        <div class="space30"></div>
                        <div class="space12"></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="others-box">
                                    <img src="{{ asset('assets/img/icons/check1.svg') }}" alt="{{ $settings->site_name }}">
                                    <div class="text">
                                        <p><span>Energy Efficient:</span> Equipped with electricity and efficient home appliances.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="others-box">
                                    <img src="{{ asset('assets/img/icons/check1.svg') }}" alt="{{ $settings->site_name }}">
                                    <div class="text">
                                        <p><span>Secure & Private: </span> Gated community security features for peace of mind guranteed.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space30"></div>
                        <div class="space16"></div>
                        <div class="contact-box">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none">
                                <path
                                    d="M5.83333 24.0013L12.5 16.0013M27.1667 24.0013L20.5 16.0013M4.5 10.668L14.1333 17.0901C14.9887 17.6604 15.4163 17.9456 15.8785 18.0562C16.2871 18.1542 16.7129 18.1542 17.1215 18.0562C17.5837 17.9456 18.0113 17.6604 18.8667 17.0901L28.5 10.668M8.76667 25.3346H24.2333C25.7268 25.3346 26.4736 25.3346 27.044 25.044C27.5457 24.7884 27.9537 24.3804 28.2093 23.8786C28.5 23.3082 28.5 22.5614 28.5 21.068V10.9346C28.5 9.44117 28.5 8.69442 28.2093 8.124C27.9537 7.62222 27.5457 7.21428 27.044 6.95862C26.4736 6.66797 25.7268 6.66797 24.2333 6.66797H8.76667C7.2732 6.66797 6.52645 6.66797 5.95603 6.95862C5.45425 7.21428 5.04631 7.62222 4.79065 8.124C4.5 8.69442 4.5 9.44116 4.5 10.9346V21.068C4.5 22.5614 4.5 23.3082 4.79065 23.8786C5.04631 24.3804 5.45425 24.7884 5.95603 25.044C6.52645 25.3346 7.27319 25.3346 8.76667 25.3346Z"
                                    stroke="#ED8438" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg></span>
                            <div class="text">
                                <p>Our Email</p>
                                <div class="space8"></div>
                                <a href="#">{{ $settings->email }}</a>
                            </div>
                        </div>
                        <div class="contact-box">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                <path
                                    d="M18.7333 7.99935C20.0357 8.25344 21.2325 8.89036 22.1708 9.8286C23.1091 10.7668 23.746 11.9637 24 13.266M18.7333 2.66602C21.4391 2.9666 23.9621 4.17824 25.8884 6.10203C27.8145 8.0258 29.0295 10.5474 29.3333 13.2527M24.6667 27.9993C13.2528 27.9993 4 18.7465 4 7.33268C4 6.81772 4.01884 6.30716 4.05585 5.80166C4.09833 5.22151 4.11957 4.93144 4.2716 4.66739C4.39752 4.4487 4.62067 4.2413 4.84797 4.13168C5.12241 3.99935 5.44251 3.99935 6.08268 3.99935H9.83909C10.3774 3.99935 10.6466 3.99935 10.8774 4.08795C11.0812 4.16622 11.2627 4.29334 11.4059 4.45815C11.568 4.64472 11.66 4.8977 11.844 5.40363L13.3988 9.67942C13.6128 10.2681 13.7199 10.5624 13.7017 10.8416C13.6857 11.0878 13.6016 11.3248 13.4589 11.5261C13.2971 11.7544 13.0286 11.9155 12.4915 12.2378L10.6667 13.3327C12.2692 16.8645 15.1335 19.7325 18.6667 21.3327L19.7616 19.5079C20.0839 18.9707 20.2449 18.7021 20.4732 18.5404C20.6745 18.3977 20.9115 18.3136 21.1577 18.2976C21.4369 18.2795 21.7313 18.3865 22.32 18.6005L26.5957 20.1553C27.1016 20.3393 27.3547 20.4313 27.5412 20.5935C27.706 20.7367 27.8332 20.9181 27.9113 21.122C28 21.3527 28 21.6219 28 22.1603V25.9167C28 26.5568 28 26.877 27.8676 27.1514C27.758 27.3787 27.5507 27.6019 27.332 27.7278C27.0679 27.8798 26.7779 27.9009 26.1977 27.9435C25.6921 27.9805 25.1816 27.9993 24.6667 27.9993Z"
                                    stroke="#ED8438" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg></span>
                            <div class="text">
                                <p>Call Us</p>
                                <div class="space8"></div>
                                <a href="#">{{ $settings->mobile }}</a>
                            </div>
                        </div>
                        <div class="contact-box">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M16.329 27.958C17.8625 26.5665 19.2817 25.0541 20.573 23.4353C23.293 20.018 24.9477 16.6487 25.0597 13.6527C25.104 12.4351 24.9024 11.221 24.4671 10.0831C24.0317 8.94509 23.3714 7.90654 22.5257 7.02947C21.6799 6.15239 20.6661 5.45477 19.5447 4.97829C18.4233 4.5018 17.2174 4.25622 15.999 4.25622C14.7806 4.25622 13.5747 4.5018 12.4533 4.97829C11.3319 5.45477 10.3181 6.15239 9.47235 7.02947C8.62661 7.90654 7.96634 8.94509 7.53095 10.0831C7.09557 11.221 6.89402 12.4351 6.93834 13.6527C7.05167 16.6487 8.70767 20.018 11.4263 23.4353C12.7176 25.0541 14.1369 26.5665 15.6703 27.958C15.8179 28.0913 15.9277 28.1882 15.9997 28.2487L16.329 27.958ZM15.0157 29.5114C15.0157 29.5114 5.33301 21.3567 5.33301 13.3327C5.33301 10.5037 6.45681 7.7906 8.4572 5.79021C10.4576 3.78982 13.1707 2.66602 15.9997 2.66602C18.8287 2.66602 21.5418 3.78982 23.5421 5.79021C25.5425 7.7906 26.6663 10.5037 26.6663 13.3327C26.6663 21.3567 16.9837 29.5114 16.9837 29.5114C16.445 30.0074 15.5583 30.002 15.0157 29.5114ZM15.9997 17.066C16.9898 17.066 17.9394 16.6727 18.6395 15.9725C19.3397 15.2724 19.733 14.3228 19.733 13.3327C19.733 12.3425 19.3397 11.393 18.6395 10.6928C17.9394 9.99268 16.9898 9.59935 15.9997 9.59935C15.0095 9.59935 14.0599 9.99268 13.3598 10.6928C12.6597 11.393 12.2663 12.3425 12.2663 13.3327C12.2663 14.3228 12.6597 15.2724 13.3598 15.9725C14.0599 16.6727 15.0095 17.066 15.9997 17.066ZM15.9997 18.666C14.5852 18.666 13.2286 18.1041 12.2284 17.1039C11.2282 16.1037 10.6663 14.7472 10.6663 13.3327C10.6663 11.9182 11.2282 10.5616 12.2284 9.56145C13.2286 8.56125 14.5852 7.99935 15.9997 7.99935C17.4142 7.99935 18.7707 8.56125 19.7709 9.56145C20.7711 10.5616 21.333 11.9182 21.333 13.3327C21.333 14.7472 20.7711 16.1037 19.7709 17.1039C18.7707 18.1041 17.4142 18.666 15.9997 18.666Z"
                                    fill="#ED8438" />
                                </svg></span>
                            <div class="text">
                                <p>Visit us</p>
                                <div class="space8"></div>
                                <a href="#">{{ $settings->address }}</a>
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
  <!--===== PROPERTY BOOKING TOUR AND DESCRIPTION ENDS =======-->

  <div class="space30"></div>

@endsection
