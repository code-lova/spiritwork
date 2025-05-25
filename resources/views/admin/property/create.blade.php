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
            <a href="{{ route('admin.properties') }}" type="button" class="btn btn-default float-right">Go Back</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add New Property Record</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <form action="{{ url('admin/property') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div id="res"></div>
                        <br>
                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Main Category</label>
                                        <select class="custom-select" name="catId" id="category_dd" required>
                                            <option value="">--Select Main Category--</option>
                                            @foreach ($category as $categories)
                                                <option value="{{ $categories->id }}" {{ old('catId') == $categories->id ? 'selected' : '' }}>{{ $categories->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->any('catId'))
                                            <small class="text-danger">{{ $errors->first('catId') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <input type="hidden" name="userId" value="{{ $userId }}">

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Property Name</label>
                                        <input type="text" name="property_name" class="form-control" value="{{ old('property_name') }}" placeholder="Enter Property Name">
                                        @if ($errors->any('property_name'))
                                            <small class="text-danger">{{ $errors->first('property_name') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Slug</label>
                                        <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" placeholder="Same as property name" required>
                                        @if ($errors->any('slug'))
                                            <small class="text-danger">{{ $errors->first('slug') }}</small>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label>Short Description (Max: 500 words)</label>
                                        <textarea name="description" id="mysummernote" class="form-control" rows="3" placeholder="Enter Long Description" required>
                                            {{ old('description') }}
                                        </textarea>
                                        @if ($errors->any('description'))
                                            <small class="text-danger">{{ $errors->first('description') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Properting Renting Price</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">#</span>
                                            </div>
                                            <input type="text" name="price" value="{{ old('price') }}" class="form-control">
                                            <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                        @if ($errors->any('price'))
                                            <small class="text-danger">{{ $errors->first('price') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Property Type</label>
                                        <select class="custom-select" name="type">
                                            <option value="">--Select Property Type--</option>
                                            <option value="rent" {{ old('type') == 'rent' ? 'selected' : '' }}>For Rent</option>
                                            <option value="sale" {{ old('type') == 'sale' ? 'selected' : '' }}>For Sale</option>
                                        </select>
                                        @if ($errors->any('type'))
                                            <small class="text-danger">{{ $errors->first('type') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Square Ft</label>
                                        <input type="text" name="square_ft" value="{{ old('square_ft') }}" class="form-control" placeholder="Enter Property Square Feet" required>
                                        @if ($errors->any('square_ft'))
                                            <small class="text-danger">{{ $errors->first('square_ft') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-10">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input name="address" class="form-control" value="{{ old('address') }}" placeholder="Enter property location" required>
                                        @if ($errors->any('address'))
                                            <small class="text-danger">{{ $errors->first('address') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                      <label>Country</label>
                                      <select class="custom-select" name="country">
                                        <option value="">--Select Country--</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                      </select>
                                      @if ($errors->any('country'))
                                        <small class="text-danger">{{ $errors->first('country') }}</small>
                                      @endif
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <select name="state" class="form-control" id="state">
                                            <option value="">Select a State</option>
                                            @foreach (['Delta', 'Lagos', 'Edo'] as $state)
                                                <option value="{{ strtolower($state) }}" {{ old('state') == strtolower($state) ? 'selected' : '' }}>{{ $state }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->any('state'))
                                            <small class="text-danger">{{ $errors->first('state') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" name="city" value="{{ old('city') }}" class="form-control" placeholder="Enter City" required>
                                        @if ($errors->any('city'))
                                            <small class="text-danger">{{ $errors->first('city') }}</small>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                <!-- text input -->
                                    <div class="form-group">
                                        <label>Listing</label>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="listing" value="1" class="custom-control-input" id="customSwitch1" {{ old('listing') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="customSwitch1">YES/NO</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Status Action</label>
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" name="status" value="1" class="custom-control-input" id="customSwitch3" {{ old('status') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="customSwitch3">ON/OFF</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h4>PROPERTY IMAGE</h4>
                            <div class="row">
                                <div class="col-sm-10">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image[]" multiple class="custom-file-input" id="exampleInputFile" required>
                                                <label class="custom-file-label" for="exampleInputFile">Choose Property Image's</label>
                                                @error('image.*')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Number of Master Bedrooms</label>
                                        <input type="number" name="master_bedrooms_num" value="{{ old('master_bedrooms_num') }}" class="form-control" placeholder="Enter a number">
                                        @if ($errors->any('master_bedrooms_num'))
                                            <small class="text-danger">{{ $errors->first('master_bedrooms_num') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Number of Bathrooms</label>
                                        <input type="number" name="bathrooms_num" value="{{ old('bathrooms_num') }}" class="form-control" placeholder="Enter a number">
                                        @if ($errors->any('bathrooms_num'))
                                            <small class="text-danger">{{ $errors->first('bathrooms_num') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Number of Rooms In Total</label>
                                        <input type="number" name="rooms_num" value="{{ old('rooms_num') }}" class="form-control" placeholder="Enter a number">
                                        @if ($errors->any('rooms_num'))
                                            <small class="text-danger">{{ $errors->first('rooms_num') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Service Charge Fee</label>
                                        <input type="number" name="service_charge" value="{{ old('service_charge') }}" class="form-control" placeholder="Enter a number">
                                        @if ($errors->any('service_charge'))
                                            <small class="text-danger">{{ $errors->first('service_charge') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Home Availability</label>
                                        <select class="custom-select" name="availability">
                                            <option value="1" {{ old('availability') == "1" ? 'selected' : '' }}>YES</option>
                                            <option value="0" {{ old('availability') == "0" ? 'selected' : '' }}>NO</option>
                                        </select>
                                        @if ($errors->any('availability'))
                                            <small class="text-danger">{{ $errors->first('availability') }}</small>
                                        @endif
                                    </div>
                                </div>


                            </div>
                            <hr>
                            <h4>SEO DATA</h4>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Meta Title</label>
                                        <input type="text" name="meta_title" value="{{ old('meta_title') }}" class="form-control" placeholder="Enter Meta Title">
                                        @if ($errors->any('meta_title'))
                                            <small class="text-danger">{{ $errors->first('meta_title') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Meta Keyword</label>
                                        <textarea name="meta_keyword" class="form-control" rows="3" placeholder="Enter Meta Keyword">
                                            {{ old('meta_keyword') }}
                                        </textarea>
                                        @if ($errors->any('meta_keyword'))
                                            <small class="text-danger">{{ $errors->first('meta_keyword') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Meta Description</label>
                                        <textarea name="meta_description" class="form-control" rows="3" placeholder="Enter Meta Description">
                                            {{ old('meta_description') }}
                                        </textarea>
                                        @if ($errors->any('meta_description'))
                                            <small class="text-danger">{{ $errors->first('meta_description') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <a href="{{ route('properties') }}" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                                <button type="submit" class="btn btn-primary">Add Property</button>
                            </div>

                    </div>
                </form>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    @section('datatable')

        <script>
            $(function () {
                $("#example1").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
        </script>
    @endsection



@endsection
