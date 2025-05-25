@extends('layouts.otherpage_layout')

@section('title', "$settings->title")
@section('meta_description', "$settings->site_description")
@section('meta_keyword', "$settings->keywords")
@section('website_name', "$settings->site_name")

@section('content')

    <style>
        /* Center the pagination */
        .pagination {
            justify-content: center;
            margin-top: 20px;
        }

        /* Style the pagination links */
        .page-link {
            color: #ff8c42; /* light orange text */
            font-size: 1.2rem; /* increase size */
            padding: 0.6rem 1rem;
            border-radius: 0.5rem;
            border: 1px solid #ffbb80;
        }

        /* Style on hover */
        .page-link:hover {
            background-color: #ffe0c2;
            color: #d95f00;
        }

        /* Style the active page */
        .page-item.active .page-link {
            background-color: #ff8c42;
            border-color: #ff8c42;
            color: white;
        }
    </style>

    <!--===== HERO AREA STARTS =======-->
  <div class="inner-header-area">
    <div class="containe-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="inner-header heading1">
            <h2>{{ $title }}</h2>
            <div class="space28"></div>
            <p><a href="index.html">Home</a> <svg xmlns="http://www.w3.org/2000/svg" width="9" height="16" viewBox="0 0 9 16" fill="none">
                <path d="M1.5 1.74997L7.75 7.99997L1.5 14.25" stroke="#1B1B1B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg> <span>Listing</span> <svg xmlns="http://www.w3.org/2000/svg" width="9" height="16" viewBox="0 0 9 16" fill="none">
                <path d="M1.5 1.74997L7.75 7.99997L1.5 14.25" stroke="#1B1B1B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>Properties </p>
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
  <div class="space40"></div>
  <!--===== HERO AREA ENDS =======-->
  <!--===== OTHERS AREA STARTS =======-->

  <div class="space30"></div>
  <div class="others-section-area others2">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="space24"></div>
            <div class="property-tab-section b-bg1">
                <form action="{{ route('property.filter') }}" method="GET">
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
                                    @foreach ([
                                        'Delta', 'Lagos', 'Edo'
                                    ] as $state)
                                        <option value="{{ strtolower($state) }}" {{ old('state') == strtolower($state) ? 'selected' : '' }}>
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
                                <button id="search-sale1" type="submit">Search <span class="arrow1"><i class="fa-solid fa-arrow-right"></i></span><span class="arrow2"><i class="fa-solid fa-arrow-right"></i></span></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== OTHERS AREA STARTS =======-->
  <div class="space30"></div>
  <!--===== PROPERTY AREA STARTS =======-->
  <div class="property-inner-section-find">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="property-mapgrid-area">
            <div class="heading1">
              <h3>Properties ({{ $propertyCount }})</h3>
              <div class="tabs-btn">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                      <svg xmlns="http://www.w3.org/2000/svg" width="31" height="30" viewBox="0 0 31 30" fill="none">
                        <path
                          d="M5.1875 13.1231C4.93886 13.1231 4.7004 13.0244 4.52459 12.8485C4.34877 12.6727 4.25 12.4343 4.25 12.1856V4.6875C4.25 4.43886 4.34877 4.2004 4.52459 4.02459C4.7004 3.84877 4.93886 3.75 5.1875 3.75H12.6875C12.9361 3.75 13.1746 3.84877 13.3504 4.02459C13.5262 4.2004 13.625 4.43886 13.625 4.6875V12.1856C13.625 12.4343 13.5262 12.6727 13.3504 12.8485C13.1746 13.0244 12.9361 13.1231 12.6875 13.1231H5.1875ZM18.3125 13.1231C18.0639 13.1231 17.8254 13.0244 17.6496 12.8485C17.4738 12.6727 17.375 12.4343 17.375 12.1856V4.6875C17.375 4.43886 17.4738 4.2004 17.6496 4.02459C17.8254 3.84877 18.0639 3.75 18.3125 3.75H25.8106C26.0593 3.75 26.2977 3.84877 26.4735 4.02459C26.6494 4.2004 26.7481 4.43886 26.7481 4.6875V12.1856C26.7481 12.4343 26.6494 12.6727 26.4735 12.8485C26.2977 13.0244 26.0593 13.1231 25.8106 13.1231H18.3125ZM5.1875 26.2481C4.93886 26.2481 4.7004 26.1494 4.52459 25.9735C4.34877 25.7977 4.25 25.5593 4.25 25.3106V17.8106C4.25 17.562 4.34877 17.3235 4.52459 17.1477C4.7004 16.9719 4.93886 16.8731 5.1875 16.8731H12.6875C12.9361 16.8731 13.1746 16.9719 13.3504 17.1477C13.5262 17.3235 13.625 17.562 13.625 17.8106V25.3106C13.625 25.5593 13.5262 25.7977 13.3504 25.9735C13.1746 26.1494 12.9361 26.2481 12.6875 26.2481H5.1875ZM18.3125 26.2481C18.0639 26.2481 17.8254 26.1494 17.6496 25.9735C17.4738 25.7977 17.375 25.5593 17.375 25.3106V17.8106C17.375 17.562 17.4738 17.3235 17.6496 17.1477C17.8254 16.9719 18.0639 16.8731 18.3125 16.8731H25.8106C26.0593 16.8731 26.2977 16.9719 26.4735 17.1477C26.6494 17.3235 26.7481 17.562 26.7481 17.8106V25.3106C26.7481 25.5593 26.6494 25.7977 26.4735 25.9735C26.2977 26.1494 26.0593 26.2481 25.8106 26.2481H18.3125Z"
                          fill="#ED8438" />
                      </svg>
                    </button>
                  </li>

                </ul>
                <div class="filter-group">
                  <select>
                    <option>Default (Newest)</option>
                    <option>Oldest</option>
                    <option>Newest</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="space32"></div>

            <div class="tab-content" id="pills-tabContent">

                {{-- Grid tab  --}}
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                    <div class="row">
                        @forelse ($properties as $listing)
                        <div class="col-lg-4 col-md-6">
                            <div class="property-single-boxarea">
                                <div class="property-list-img-area owl-carousel">
                                    <div class="img1 image-anime">
                                        <img
                                            style="width: 387px; height:300px;"
                                            src="{{ asset('uploads/property/'.$listing->PropertyImages[0]->image) }}"
                                            alt="{{ $settings->site_name }}"
                                        >
                                    </div>
                                    <div class="img1 image-anime">
                                        <img
                                            style="width: 387px; height:300px;"
                                            src="{{ asset('uploads/property/'.$listing->PropertyImages[1]->image) }}"
                                            alt="{{ $settings->site_name }}"
                                        >
                                    </div>
                                    <div class="img1 image-anime">
                                        <img
                                            style="width: 387px; height:300px;"
                                            src="{{ asset('uploads/property/'.$listing->PropertyImages[2]->image) }}"
                                            alt="{{ $settings->site_name }}"
                                        >
                                    </div>
                                </div>
                                <div class="space20"></div>
                                <div class="property-price">
                                    <div class="text">
                                    <a href="{{ url('property-details/'.$listing->category->slug.'/'.$listing->slug) }}" class="title">{{ \Illuminate\Support\Str::limit($listing->property_name, 22, '...') }}</a>
                                    <div class="space16"></div>
                                    <p>{{ ucfirst(strtolower($listing->state)) }}, {{ ucfirst(strtolower($listing->city)) }}.
                                        @if ($listing->availability == 1)
                                            <span class="text-success" style="font-size: 12px;">Available</span>
                                        @else
                                            <span class="text-danger" style="font-size: 12px;">Unavailable</span>
                                        @endif
                                    </p>
                                    <br>
                                    <b style="color: rgb(230, 130, 24)">{{ ' ' }}{{ strtoUpper($listing->category->name) }}</b>
                                    </div>
                                    <a class="price" href="#">#@php echo number_format($listing->price) @endphp</a>
                                </div>
                                <div class="space20"></div>
                                <div class="property-other-widget">
                                    <ul>
                                    <li><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M8 9H16M8 15H16" stroke="#1B1B1B" stroke-width="1.5" stroke-linejoin="round" />
                                            <path d="M3 21H21V3.00046L3 3V21Z" stroke="#1B1B1B" stroke-width="1.5" stroke-linejoin="round" />
                                        </svg></span>{{ $listing->square_ft }} sqft</li>
                                    <li><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M22 17.5H2" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M22 21V16C22 14.1144 22 13.1716 21.4142 12.5858C20.8284 12 19.8856 12 18 12H6C4.11438 12 3.17157 12 2.58579 12.5858C2 13.1716 2 14.1144 2 16V21" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M16 12V10.6178C16 10.1103 15.9085 9.94054 15.4396 9.7405C14.4631 9.32389 13.2778 9 12 9C10.7222 9 9.53688 9.32389 8.5604 9.7405C8.09154 9.94054 8 10.1103 8 10.6178V12" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" />
                                            <path d="M20 12V7.36057C20 6.66893 20 6.32311 19.8292 5.99653C19.6584 5.66995 19.4151 5.50091 18.9284 5.16283C16.9661 3.79978 14.5772 3 12 3C9.42282 3 7.03391 3.79978 5.07163 5.16283C4.58492 5.50091 4.34157 5.66995 4.17079 5.99653C4 6.32311 4 6.66893 4 7.36057V12" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" />
                                        </svg></span>{{ $listing->rooms_num }} Beds</li>
                                    <li><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M6 20L5 21M18 20L19 21" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" />
                                            <path d="M3 12V13C3 16.2998 3 17.9497 4.02513 18.9749C5.05025 20 6.70017 20 10 20H14C17.2998 20 18.9497 20 19.9749 18.9749C21 17.9497 21 16.2998 21 13V12" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M2 12H22" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" />
                                            <path d="M4 12V5.5234C4 4.12977 5.12977 3 6.5234 3C7.64166 3 8.62654 3.73598 8.94339 4.80841L9 5" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" />
                                            <path d="M8 6L10.5 4" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" />
                                        </svg></span>{{ $listing->bathrooms_num }} Baths</li>
                                    </ul>
                                    <div class="space24"></div>
                                    <div class="btn-area">
                                        <div class="name-area">
                                            <div class="text">
                                                <a href="#">{{ $listing->country }}</a>
                                            </div>
                                        </div>
                                        <div class="love-share">
                                            <a href="#" class="share"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                                <path
                                                d="M11.0373 14.6505L7.14942 12.5297C6.47355 13.2521 5.51175 13.7034 4.44452 13.7034C2.39902 13.7034 0.740814 12.0452 0.740814 9.99974C0.740814 7.95424 2.39902 6.29603 4.44452 6.29603C5.51169 6.29603 6.47345 6.74739 7.14931 7.46961L11.0373 5.34893C10.9646 5.05938 10.926 4.75628 10.926 4.44418C10.926 2.39868 12.5842 0.740479 14.6297 0.740479C16.6752 0.740479 18.3334 2.39868 18.3334 4.44418C18.3334 6.48968 16.6752 8.14789 14.6297 8.14789C13.5625 8.14789 12.6007 7.69651 11.9248 6.97424L8.0369 9.09492C8.10961 9.38446 8.14822 9.68761 8.14822 9.99974C8.14822 10.3119 8.10962 10.6149 8.03693 10.9045L11.9249 13.0252C12.6007 12.303 13.5625 11.8516 14.6297 11.8516C16.6752 11.8516 18.3334 13.5098 18.3334 15.5553C18.3334 17.6008 16.6752 19.259 14.6297 19.259C12.5842 19.259 10.926 17.6008 10.926 15.5553C10.926 15.2432 10.9646 14.94 11.0373 14.6505ZM4.44452 11.8516C5.46727 11.8516 6.29637 11.0225 6.29637 9.99974C6.29637 8.97696 5.46727 8.14789 4.44452 8.14789C3.42177 8.14789 2.59267 8.97696 2.59267 9.99974C2.59267 11.0225 3.42177 11.8516 4.44452 11.8516ZM14.6297 6.29603C15.6525 6.29603 16.4816 5.46693 16.4816 4.44418C16.4816 3.42143 15.6525 2.59233 14.6297 2.59233C13.6069 2.59233 12.7779 3.42143 12.7779 4.44418C12.7779 5.46693 13.6069 6.29603 14.6297 6.29603ZM14.6297 17.4071C15.6525 17.4071 16.4816 16.5781 16.4816 15.5553C16.4816 14.5325 15.6525 13.7034 14.6297 13.7034C13.6069 13.7034 12.7779 14.5325 12.7779 15.5553C12.7779 16.5781 13.6069 17.4071 14.6297 17.4071Z"
                                                fill="#ED8438" />
                                            </svg></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="rent-sale-area">
                                    <ul>
                                    <li><a href="#">{{ ucfirst($listing->type) }}</a></li>
                                    <li><a href="#">Estate</a></li>
                                    </ul>
                                    <a href="#" class="camera"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="14" viewBox="0 0 16 14" fill="none">
                                        <path d="M12 7.39995C12 8.75995 10.96 9.79995 9.6 9.79995C8.24 9.79995 7.2 8.75995 7.2 7.39995C7.2 6.03995 8.24 4.99995 9.6 4.99995C10.96 4.99995 12 6.03995 12 7.39995ZM16 3.39995V12.2C16 13.08 15.28 13.8 14.4 13.8H1.6C0.72 13.8 0 13.08 0 12.2V3.39995C0 2.51995 0.72 1.79995 1.6 1.79995V0.999951H4.8V1.79995H6.4L7.2 0.199951H12L12.8 1.79995H14.4C15.28 1.79995 16 2.51995 16 3.39995ZM4.4 4.99995C4.4 4.35995 3.84 3.79995 3.2 3.79995C2.56 3.79995 2 4.35995 2 4.99995C2 5.63995 2.56 6.19995 3.2 6.19995C3.84 6.19995 4.4 5.63995 4.4 4.99995ZM13.6 7.39995C13.6 5.15995 11.84 3.39995 9.6 3.39995C7.36 3.39995 5.6 5.15995 5.6 7.39995C5.6 9.63995 7.36 11.4 9.6 11.4C11.84 11.4 13.6 9.63995 13.6 7.39995Z" fill="#1B1B1B" />
                                    </svg> {{ $listing->property_images_count }}</a>
                                </div>
                            </div>
                        </div>
                        @empty
                            <h3>No Properties at the moment</h3>
                        @endforelse

                        <div class="col-lg-12">
                            {{-- we will do a pagination here --}}
                            <div>
                                {{ $properties->links() }}
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
  <!--===== PROPERTY AREA ENDS =======-->
  <div class="space30"></div>


@endsection
