@extends('layouts.otherpage_layout')

@section('title',"$title | $settings->site_name")
@section('meta_description',"$settings->site_desc")
@section('meta_keyword',"$settings->site_desc")
@section('website_name',"$settings->site_name")

@section('content')

    <!--===== HERO AREA STARTS =======-->
  <div class="inner-header-area">
    <div class="containe-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="inner-header heading1">
            <h2>{{ $terms->title }}</h2>
            <div class="space28"></div>
            <p><a href="index.html">Home</a> <svg xmlns="http://www.w3.org/2000/svg" width="9" height="16" viewBox="0 0 9 16" fill="none">
                <path d="M1.5 1.74997L7.75 7.99997L1.5 14.25" stroke="#1B1B1B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg> {{ $terms->disclaimer }}</p>
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
  <!--===== WORKS AREA STARTS =======-->
  <div class="privacy-policy-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="all-category">
            <div class="categories-area">
              <h3>Categories</h3>
              <ul>
                <li><a href="#">Terms Of Use <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                      <path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path>
                    </svg></a></li>
                <li><a href="#">Limitations <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                      <path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path>
                    </svg></a></li>

                <li><a href="#">Site Terms of Use <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                      <path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path>
                    </svg></a></li>
              </ul>
            </div>
            <div class="space30"></div>
            <div class="contact-us-box heading1">
              <h3>Contact Us</h3>
              <div class="space16"></div>
              <p>Let’s make an real estate journey smooth and successful. Contact Housa today!</p>
              <div class="space24"></div>
              <div class="btn-area1">
                <a href="{{ route('contact.us') }}" class="vl-btn1"><span><svg xmlns="http://www.w3.org/2000/svg" width="23" height="22" viewBox="0 0 23 22" fill="none">
                      <path d="M12.8105 9.04492C12.3143 9.04492 11.9297 9.42949 11.9297 9.9043C11.9297 10.3791 12.3143 10.7637 12.8105 10.7637C13.2639 10.7637 13.6484 10.3791 13.6484 9.9043C13.6484 9.42949 13.2639 9.04492 12.8105 9.04492ZM6.79492 9.04492C6.29863 9.04492 5.91406 9.42949 5.91406 9.9043C5.91406 10.3791 6.29863 10.7637 6.79492 10.7637C7.24824 10.7637 7.63281 10.3791 7.63281 9.9043C7.63281 9.42949 7.24824 9.04492 6.79492 9.04492Z" fill="white" />
                      <path
                        d="M19.7067 7.41209C18.6733 5.99413 17.2296 5.04666 15.6462 4.61913V4.62127C15.2788 4.21307 14.8642 3.83709 14.4001 3.50194C10.8831 0.945297 5.946 1.72518 3.37862 5.24217C1.30967 8.09959 1.39776 11.9431 3.50753 14.6738L3.52471 17.5226C3.52471 17.5914 3.53546 17.6601 3.55694 17.7246C3.67081 18.0877 4.05753 18.2875 4.41846 18.1736L7.13838 17.3164C7.85811 17.5721 8.60147 17.7181 9.34053 17.759L9.32979 17.7676C11.244 19.1619 13.7534 19.5808 16.0544 18.8203L18.7851 19.7098C18.8538 19.7312 18.9247 19.7441 18.9978 19.7441C19.378 19.7441 19.6853 19.4369 19.6853 19.0566V16.1777C21.578 13.6082 21.6274 10.0568 19.7067 7.41209ZM7.43917 15.791L7.18135 15.6836L5.0544 16.3496L5.03292 14.1152L4.86104 13.9219C3.04346 11.7047 2.92315 8.50995 4.62471 6.166C6.69581 3.32577 10.6661 2.69842 13.4978 4.74803C16.338 6.81268 16.9675 10.7765 14.9157 13.5996C13.1948 15.9607 10.114 16.833 7.43917 15.791ZM18.2888 15.4258L18.1169 15.6406L18.1384 17.875L16.0329 17.166L15.7751 17.2734C14.572 17.7203 13.2894 17.7568 12.1013 17.4238L12.097 17.4217C13.6847 16.934 15.1241 15.9457 16.1618 14.5234C17.8032 12.2611 18.0696 9.41874 17.1157 6.9953L17.1286 7.00389C17.6228 7.35838 18.0761 7.80096 18.4607 8.33592C20.0204 10.4758 19.9323 13.389 18.2888 15.4258Z"
                        fill="white" />
                      <path d="M9.80273 9.04492C9.30645 9.04492 8.92188 9.42949 8.92188 9.9043C8.92188 10.3791 9.30645 10.7637 9.80273 10.7637C10.2561 10.7637 10.6406 10.3791 10.6406 9.9043C10.6406 9.42949 10.2561 9.04492 9.80273 9.04492Z" fill="white" />
                    </svg></span> Visit Help Centre</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="policy-details">
            <div class="heading1">
                {!! $terms->details !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== WORKS AREA ENDS =======-->
  <div class="space30"></div>



@endsection
