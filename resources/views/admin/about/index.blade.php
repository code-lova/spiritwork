@extends('layouts.admin.admin_layout')

@section('content')

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
                    </ol>
                </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div id="section">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Us</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <form id="AboutUsSettingForm" action="{{ url('admin/store-about') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div id="respon"></div>
                                    <br>
                                    <div class="form-group">
                                        <label for="inputName">Banner Title </label>
                                        <input type="text" placeholder="Enter Heading" @if($about)value="{{ $about->banner_title }}" @endif name="banner_title" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputDescription">About Title</label>
                                        <input type="text" placeholder="Enter about_title" @if($about)value="{{ $about->about_title }}" @endif name="about_title" class="form-control">
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Banner Image</label>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" name="banner_img" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">About Image1</label>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" name="side1_img" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">About Image2</label>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" name="side2_img" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Mission/Vision Img</label>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" name="mv_img" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h4>About Us Header Section</h4>
                                    <div class="form-group">
                                        <label for="inputDescription">About Us Text</label>
                                        <textarea id="mysummernote3" placeholder="Enter details here..."  name="about_text" class="form-control" rows="7">@if($about){{ $about->about_text }} @endif</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Our Vision Details</label>
                                        <textarea id="mysummernote" placeholder="Enter details here..."  name="our_vision" class="form-control" rows="7">@if($about){{ $about->our_vision }} @endif</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputDescription">Our Mission Details</label>
                                        <textarea id="mysummernote2" placeholder="Enter details here..."  name="our_mission" class="form-control" rows="7">@if($about){{ $about->our_mission }} @endif</textarea>
                                    </div>
                                    <hr>
                                    {{-- <h4>Who We are Header Section</h4>

                                    <div class="form-group">
                                        <label for="inputDescription">Section Section</label>
                                        <textarea id="mysummernote4" placeholder="Enter details here..."  name="who_we_are_2" class="form-control" rows="7">@if($about){{ $about->who_we_are_2 }} @endif</textarea>
                                    </div> --}}


                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success float-right">SAVE About</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-4">
                        <div id="sections">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Images</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <img width="300px" class="my-3 rounded" @if($about) src="{{ asset('uploads/about/'.$about->banner_img) }}" @endif alt="image">
                                    <hr>
                                    <img width="300px" class="my-3 rounded" @if($about) src="{{ asset('uploads/about/'.$about->side1_img) }}" @endif alt="image">
                                    <hr>
                                    <img width="300px" class="my-3 rounded" @if($about) src="{{ asset('uploads/about/'.$about->side2_img) }}" @endif alt="image">
                                    <hr>
                                    <img width="300px" class="my-3 rounded" @if($about) src="{{ asset('uploads/about/'.$about->mv_img) }}" @endif alt="image">
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>


    @section('scripts')

        <script>
            $(function () {
                bsCustomFileInput.init();
            });
        </script>

    @endsection



@endsection
