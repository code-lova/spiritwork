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
        <form action="{{ url('admin/gallery') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Image gallery settings</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Image 1:</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="image1" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                                    @error('image1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Image 2:</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="image2" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    @error('image2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Image 3:</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="image3" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    @error('image3')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Image 4:</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="image4" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                                    @error('image4')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Image 5:</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="image5" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    @error('image5')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Image 6:</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="image6" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    @error('image6')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
                    <h3 class="card-title">Images</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    </div>
                    <div class="card-body">
                        <center>
                            <img width="200px" style="border-radius: 10px;" @if($gallery)src="{{ asset('uploads/gallery/'.$gallery->image1) }}"@endif alt="image">
                            <p><b>Gallery Image 1</b></p>
                        </center>
                        <hr>
                        <center>
                            <img width="200px" style="border-radius: 10px;" @if($gallery)src="{{ asset('uploads/gallery/'.$gallery->image2) }}"@endif alt="image">
                            <p><b>Gallery Image 2</b></p>
                        </center>
                        <hr>
                        <center>
                            <img width="200px" style="border-radius: 10px;" @if($gallery)src="{{ asset('uploads/gallery/'.$gallery->image3) }}"@endif alt="image">
                            <p><b>Gallery Image 3</b></p>
                        </center>
                        <hr>
                        <center>
                            <img width="200px" style="border-radius: 10px;" @if($gallery)src="{{ asset('uploads/gallery/'.$gallery->image4) }}"@endif alt="image">
                            <p><b>Gallery Image 4</b></p>
                        </center>
                        <hr>
                        <center>
                            <img width="200px" style="border-radius: 10px;" @if($gallery)src="{{ asset('uploads/gallery/'.$gallery->image5) }}"@endif alt="image">
                            <p><b>Gallery Image 5</b></p>
                        </center>
                        <hr>
                        <center>
                            <img width="200px" style="border-radius: 10px;" @if($gallery)src="{{ asset('uploads/gallery/'.$gallery->image6) }}"@endif alt="image">
                            <p><b>Gallery Image 5</b></p>
                        </center>
                        <hr>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                <a href="#" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-success float-right">Save Setting</button>
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@section('scripts')
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection


@endsection
