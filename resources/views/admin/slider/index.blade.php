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
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ url('admin/store-slider') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Top-Slider Setting</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="inputName">First Note</label>
                            <input type="text" id="inputName" @if($slider)value="{{ $slider->slider1_h5 }}" @endif name="slider1_h5" class="form-control">
                        </div>
                        @error('slider1_h5')
                         <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-group">
                            <label for="inputName">Second Note</label>
                            <input type="text" id="inputName" @if($slider)value="{{ $slider->slider1_h1 }}" @endif name="slider1_h1" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Third Note</label>
                            <input type="text" id="inputName" @if($slider)value="{{ $slider->slider1_quick_info }}" @endif name="slider1_quick_info" class="form-control">
                        </div>


                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Slider 1:</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="slider1_image" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <h4><b>SECOND SLIDER</b></h4>
                        <div class="form-group">
                            <label for="inputName">First Note</label>
                            <input type="text" id="inputName" @if($slider)value="{{ $slider->slider2_h5 }}" @endif name="slider2_h5" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Second Note</label>
                            <input type="text" id="inputName" @if($slider)value="{{ $slider->slider2_h1 }}" @endif name="slider2_h1" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Third Note</label>
                            <input type="text" id="inputName" @if($slider)value="{{ $slider->slider2_quick_info }}" @endif name="slider2_quick_info" class="form-control">
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Slider 2:</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="slider2_image" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <h4><b>THIRD SLIDER</b></h4>
                        <div class="form-group">
                            <label for="inputName">First Note</label>
                            <input type="text" id="inputName" @if($slider)value="{{ $slider->slider3_h5 }}" @endif name="slider3_h5" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Second Note</label>
                            <input type="text" id="inputName" @if($slider)value="{{ $slider->slider3_h1 }}" @endif name="slider3_h1" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Third Note</label>
                            <input type="text" id="inputName" @if($slider)value="{{ $slider->slider3_quick_info }}" @endif name="slider3_quick_info" class="form-control">
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Slider 3:</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="slider3_image" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                        <h3 class="card-title">Slider Images</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        </div>
                        <div class="card-body">
                            <center>
                                <img width="450" height="250" style="border-radius: 10px;" @if($slider)src="{{ asset('uploads/slider/'.$slider->slider1_image) }}"@endif alt="image">
                                <p><b>First Slider Image</b></p>
                            </center>
                            <hr>
                            <center>
                                <img width="450" height="250" style="border-radius: 10px;" @if($slider)src="{{ asset('uploads/slider/'.$slider->slider2_image) }}"@endif alt="image">
                                <p><b>Second Slider Image</b></p>
                            </center>
                            <hr>
                            <center>
                                <img width="450" height="250" style="border-radius: 10px;" @if($slider)src="{{ asset('uploads/slider/'.$slider->slider3_image) }}"@endif alt="image">
                                <p><b>Third Slider Image</b></p>
                            </center>


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-success float-right">Save Setting</button>
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




    @section('script')
        <script>
            $(function () {
                bsCustomFileInput.init();
            });
        </script>
    @endsection

@endsection
