@extends('layouts.admin.admin_layout')

@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div id="station">
                        <div class="card-body box-profile" >
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('dist/img/avatar.jpg') }}"
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ $userProfile->name }}</h3>

                            {{-- @if ($userProfile->customer_type == 0)
                                <p class="text-muted text-center">Buyer</p>
                            @else
                            @endif --}}
                            <p class="text-muted text-center">Resident</p>


                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                <b>IP Address:</b> <a class="float-right"> {{ $userProfile->ip_address }}</a>
                                </li>

                                <li class="list-group-item">
                                <b>Created:</b> <a class="float-right">{{ Carbon\Carbon::parse($userProfile->created_at)->translatedFormat('D, d M Y') }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Updated:</b> <a class="float-right"> {{ Carbon\Carbon::parse($userProfile->updated_at)->diffForHumans() }}</a>
                                </li>
                            </ul>
                            @if ($userProfile->is_active == 1)
                                <button type="button" value="{{ $userProfile->id }}" class="blockUserBtn btn btn-danger btn-block"><b>Block User Account</b></button>
                            @else
                                <button type="button" value="{{ $userProfile->id }}" class="UnblockUserBtn btn btn-success btn-block"><b>Un-Block User Account</b></button>
                            @endif

                            <div style="margin-top: 86px; display: flex; gap: 8px;">
                                @if ($userProfile->identity_verification_image && file_exists(public_path('uploads/profile/' . $userProfile->identity_verification_image)))
                                    @if ($userProfile->id_verification == 0 || empty($userProfile->identity_verification_image))
                                        <button type="button" value="{{ $userProfile->id }}"
                                                class="verifyDocUserBtn btn btn-success flex-fill text-white fw-bold py-2">
                                            Approve
                                        </button>

                                        <button type="button" value="{{ $userProfile->id }}"
                                                class="UnverifyDocUserBtn btn btn-dark flex-fill text-white fw-bold py-2">
                                            Disapprove
                                        </button>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Network</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Last Seen</strong>
                        <p class="text-muted">{{ Carbon\Carbon::parse($userProfile->last_seen)->diffForHumans() }}</p>
                        <hr>
                        <strong><i class="fas fa-pencil-alt mr-1"></i> Status</strong>
                        @if(Cache::has('User-is-Online' . $userProfile->id))
                            <p>
                                <span class="badge badge-success">ONLINE</span>
                            </p>
                        @else
                            <p>
                                <span class="badge badge-danger">OFFLINE</span>
                            </p>
                        @endif
                        <hr>
                        <strong><i class="far fa-file-alt mr-1"></i>Registered</strong>
                        <p class="text-muted">Email: {{ $userProfile->email }}.</p>
                        <p class="text-muted">Last Login: {{ \Carbon\Carbon::parse($userProfile->last_login)->translatedFormat('D, d M Y') }}.</p>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="{{ route('residents') }}">Go Back </a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">

                        <div class="active tab-pane" id="settings">
                            <div id="res"></div>
                            <br>
                            <form class="form-horizontal" id="UpdateUserForm" method="POST">
                                <input type="hidden" value="{{ $userProfile->id }}" id="user_id">

                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" value="{{ $userProfile->name }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputphone" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="phone " class="form-control" value="{{ $userProfile->phone  }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" value="{{ $userProfile->email }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputCountry" class="col-sm-2 col-form-label">Country</label>
                                    <div class="col-sm-10">
                                        <input type="country" name="country" class="form-control" value="{{ $userProfile->country }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Birth date</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="birth_date" class="form-control" value="{{ $userProfile->birth_date }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Gender</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="gender" class="form-control" value="{{ $userProfile->gender }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Marital Status</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="marital_status" class="form-control" value="{{ $userProfile->marital_status }}" readonly>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Identity Doc</label>
                                    <div class="col-sm-10">
                                        @if ($userProfile->identity_verification_image && file_exists(public_path('uploads/profile/' . $userProfile->identity_verification_image)))
                                            <a href="{{ asset('uploads/profile/' . $userProfile->identity_verification_image) }}" target="_blank" rel="noopener noreferrer">
                                                View tenant identity document
                                            </a>
                                        @else
                                            <p>No document uploaded.</p>
                                        @endif
                                    </div>
                                </div>

                                {{-- <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-success">Update Setting</button>
                                    </div>
                                </div> --}}
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
  <!-- /.content -->





</div>

    @section('scripts')
        <script>

            $(document).ready(function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                $(document).on('click', '.blockUserBtn', function (e) {
                    e.preventDefault();

                    var user_id = $(this).val();
                    //alert(user_id);
                    $.ajax({
                        type: "GET",
                        url: "/admin/block-resident/"+user_id,
                        dataType: "json",
                        success: function (response) {
                            if(response.status == 200)
                            {
                                $('#station').load(location.href+' #station');
                                toastr.success(response.message);
                            }
                        }
                    });
                });

                $(document).on('click', '.UnblockUserBtn', function (e) {
                    e.preventDefault();

                    var user_id = $(this).val();
                    //alert(user_id);
                    $.ajax({
                        type: "GET",
                        url: "/admin/unblock-resident/"+user_id,
                        dataType: "json",
                        success: function (response) {
                            if(response.status == 200)
                            {
                                $('#station').load(location.href+' #station');
                                toastr.success(response.message);
                            }
                        }
                    });
                });


                 $(document).on('click', '.UnverifyDocUserBtn', function (e) {
                    e.preventDefault();

                    var user_id = $(this).val();
                    //alert(user_id);
                    if(confirm("Are you sure you want to deny and delete this user's identity document?")){
                        $.ajax({
                            type: "GET",
                            url: "/admin/unverify-identity/"+user_id,
                            dataType: "json",
                            success: function (response) {
                                if(response.status == 200)
                                {
                                    $('#station').load(location.href+' #station');
                                    toastr.success(response.message);
                                }
                            },
                            error: function () {
                                toastr.error('An error occurred while processing your request.');
                            }
                        });
                    }

                });

                $(document).on('click', '.verifyDocUserBtn', function (e) {
                    e.preventDefault();

                    var user_id = $(this).val();
                    //alert(user_id);
                    if(confirm("Are you sure, the document meet all required standards?")){
                        $.ajax({
                            type: "GET",
                            url: "/admin/verify-identity/"+user_id,
                            dataType: "json",
                            success: function (response) {
                                if(response.status == 200)
                                {
                                    $('#station').load(location.href+' #station');
                                    toastr.success(response.message);
                                }
                            },
                            error: function () {
                                toastr.error('An error occurred while processing your request.');
                            }
                        });
                    }

                });
            });

        </script>
    @endsection


@endsection
