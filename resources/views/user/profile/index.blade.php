@extends('layouts.user.user_layout')

@section('title', "$settings->title")
@section('meta_description', "$settings->site_description")
@section('meta_keyword', "$settings->keywords")
@section('website_name', "$settings->site_name")


@section('content')

<style>

</style>
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
    <div class="space40"></div>

    <!--===== PROFILE AREA STARTS =======-->
    <div class="profile-section-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="heading1">
                        <h2 style="margin-left: 20px; margin-top:20px;">My Profile</h2>
                        <div class="space32"></div>
                    </div>
                </div>


                    <div class="col-lg-12">
                        <form action="{{ route('user.update.profile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="account-details-boxarea">
                                <h4>Upload Profile Photo</h4>
                                <div class="space24"></div>
                                <div class="box-agent-avt">
                                    @if ($user->user_image == null)
                                        <div class="img-poster">
                                            <img width="200" height="200" src="{{ asset('assets/img/profile.webp') }}" alt="avatar" loading="lazy">
                                        </div>
                                    @else
                                    <div class="img-poster">
                                        <img width="200" height="200" src="{{ asset('uploads/profile/' . $user->user_image) }}" alt="user profile img" loading="lazy">
                                    </div>
                                    @endif
                                </div>
                                <div class="content uploadfile">
                                    <p>Upload a new profile image</p>
                                    <div class="space16"></div>
                                    <div class="box-ip">
                                        <input type="file" name="user_image" class="ip-file">
                                    </div>
                                    <div class="space16"></div>
                                    <span>PNG/JPEG (Max: 2MB)</span>
                                </div>

                                <div class="space30"></div>

                                <div class="personal-info-area">
                                    <h3>Upload Profile Photo</h3>

                                    <div class="row">

                                        <div class="col-lg-4 col-md-6">
                                            <div class="space28"></div>
                                            <div class="input-area">
                                                <h5>Full Name*</h5>
                                                <div class="space16"></div>
                                                <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="space28"></div>
                                            <div class="input-area">
                                                <h5>Email*</h5>
                                                <div class="space16"></div>
                                                <input type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Email*" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="space28"></div>
                                            <div class="input-area">
                                                <h5>Phone*</h5>
                                                <div class="space16"></div>
                                                <input type="number" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="Phone*">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="space28"></div>
                                            <div class="input-area">
                                                <h5>Country*</h5>
                                                <div class="space16"></div>
                                                <input type="text" name="country" value="{{ old('country', $user->country) }}" placeholder="country*">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="space28"></div>
                                            <div class="input-area">
                                                <h5>Date of Birth*</h5>
                                                <div class="space16"></div>
                                                <input type="date" name="birth_date" value="{{ old('birth_date', $user->birth_date) }}" placeholder="date of birth*">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="space28"></div>
                                            <div class="input-area">
                                                <h5>Marital Status*</h5>
                                                <div class="space16"></div>
                                                <select name="marital_status" class="large-select">
                                                    <option value="">What is your status</option>
                                                    <option value="married" {{ old('marital_status', $user->marital_status) === 'married' ? 'selected' : '' }}>Married</option>
                                                    <option value="single" {{ old('marital_status', $user->marital_status) === 'single' ? 'selected' : '' }}>Single</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="space28"></div>
                                            <div class="input-area">
                                                <h5>Gender*</h5>
                                                <div class="space16"></div>
                                                <select name="gender" class="large-select">
                                                    <option value="">What is your gender</option>
                                                    <option value="male" {{ old('gender', $user->gender) === 'male' ? 'selected' : '' }}>Male</option>
                                                    <option value="female" {{ old('gender', $user->gender) === 'female' ? 'selected' : '' }}>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        @if ($user->identity_verification_image == NULL)
                                            <div class="col-lg-4 col-md-6">
                                                <div class="space16"></div>
                                                <div class="input-area">
                                                    <h5 style="font-size: 14px;">Identification Doc(NIN, Passport, Driving license)</h5>
                                                    <span style="font-size: 12px;">JPEG,JPG, PNG image format only max 2MB</span>
                                                    <input type="file" name="identity_verification_image">
                                                </div>
                                            </div>
                                        @else
                                            @if ($user->identity_verification_image != NULL && $user->id_verification == 0)
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="space28"></div>
                                                    <div class="input-area">
                                                        <div class="space28"></div>
                                                            <h5 style="color: rgb(156, 145, 27)">Processing Identity document</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif ($user->id_verification == 1)
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="space28"></div>
                                                    <div class="input-area">
                                                        <div class="space28"></div>
                                                            <h5 style="color: green">Identity has been successfully verified</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif



                                        <div class="col-lg-12">
                                            <div class="space32"></div>
                                            <div class="btn-area1 text-end">
                                                <button type="submit" href="index.html" class="vl-btn1">Update Profile <span class="arrow1"><i
                                                    class="fa-solid fa-arrow-right"></i></span><span class="arrow2"><i
                                                    class="fa-solid fa-arrow-right"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="space30"></div>
                        <form action="{{ route('user.update.password') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="password-info-area">
                                <h2>Change Your Password</h2>
                                <div class="box">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="box-fieldset">
                                                <label>Current Password:<span>*</span></label>
                                                <div class="box-password">
                                                    <input type="password" name="oldpassword" class="form-contact style-1 password-field"
                                                        placeholder="Current Password">
                                                    <span class="show-pass">
                                                        <i class="fa-regular fa-eye"></i>
                                                        <i class="fa-regular fa-eye-slash"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="box-fieldset">
                                                <label>New Password:<span>*</span></label>
                                                <div class="box-password">
                                                    <input type="password" name="new_password" class="form-contact style-1 password-field2"
                                                        placeholder="Password">
                                                    <div data-lastpass-icon-root=""
                                                        style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;">
                                                    </div>
                                                    <span class="show-pass2">
                                                        <i class="fa-regular fa-eye"></i>
                                                        <i class="fa-regular fa-eye-slash"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="box-fieldset">
                                                <label>Confirm Password:<span>*</span></label>
                                                <div class="box-password">
                                                    <input type="password" name="new_password_confirmation" class="form-contact style-1 password-field3"
                                                        placeholder="Confirm Password">
                                                    <div data-lastpass-icon-root=""
                                                        style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;">
                                                    </div><span class="show-pass3">
                                                        <i class="fa-regular fa-eye"></i>
                                                        <i class="fa-regular fa-eye-slash"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="space32"></div>
                                <div class="btn-area1 text-end">
                                    <button type="submit" href="index.html" class="vl-btn1">Update Password <span class="arrow1"><i
                                        class="fa-solid fa-arrow-right"></i></span><span class="arrow2"><i
                                        class="fa-solid fa-arrow-right"></i></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="space32"></div>

                    </div>

            </div>
        </div>
    </div>
    <!--===== PROFILE AREA ENDS =======-->
    <div class="space30"></div>
@endsection
