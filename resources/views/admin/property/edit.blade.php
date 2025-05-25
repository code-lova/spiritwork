@extends('layouts.admin.admin_layout')

@section('content')

    @php
        $countries = [
            'Nigeria', 'United Arab Emirates', 'United Kingdom', 'United States'
        ];
    @endphp

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
                <h3 class="card-title">Update Property Record</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <form action="{{ url('admin/property/'.$property->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div id="res"></div>
                        <br>
                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Main Category</label>
                                        <select class="custom-select" name="catId" id="catId">
                                            <option value="">--Select Main Category--</option>
                                            @foreach ($category as $categories)
                                                <option value="{{ $categories->id }}" {{ $categories->id == $property->catId ? 'selected' : '' }}>{{ $categories->name }}</option>
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
                                        <input type="text" name="property_name" class="form-control" value="{{ $property->property_name }}">
                                        @if ($errors->any('property_name'))
                                            <small class="text-danger">{{ $errors->first('property_name') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Slug</label>
                                        <input type="text" name="slug" class="form-control" value="{{ $property->slug }}" placeholder="Enter slug Name">
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
                                        <textarea name="description" id="mysummernote" class="form-control" rows="3" placeholder="Enter Long Description">
                                           {{ $property->description }}
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
                                            <input type="text" name="price" value="{{ $property->price }}" class="form-control">
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
                                            <option value="rent" {{ $property->type == 'rent' ? 'selected' : '' }}>For Rent</option>
                                            <option value="sale" {{ $property->type == 'sale' ? 'selected' : '' }}>For Sale</option>
                                        </select>
                                        @if ($errors->any('type'))
                                            <small class="text-danger">{{ $errors->first('type') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Square Ft</label>
                                        <input type="text" name="square_ft" value="{{ $property->square_ft }}" class="form-control" placeholder="Enter Property Square Feet">
                                        @if ($errors->any('square_ft'))
                                            <small class="text-danger">{{ $errors->first('square_ft') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-10">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input name="address" class="form-control" value="{{ $property->address }}" placeholder="Enter property location">
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
                                            @foreach($countries as $country)
                                                <option value="{{ $country }}" {{ $property->country == $country ? 'selected' : '' }}>{{ $country }}</option>
                                            @endforeach
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
                                                <option value="{{ strtolower($state) }}" {{ strtolower($property->state) == strtolower($state) ? 'selected' : '' }}>{{ $state }}</option>
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
                                        <input type="text" name="city" value="{{ $property->city }}" class="form-control" placeholder="Enter City">
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
                                            <input type="checkbox" name="listing" value="1" class="custom-control-input" id="customSwitch1"
                                                   {{ old('listing', $property->listing) ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="customSwitch1">YES/NO</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Status Action</label>
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" name="status" value="1" class="custom-control-input" id="customSwitch3"
                                                   {{ old('status', $property->status) ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="customSwitch3">ON/OFF</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <h4>PRODUCT IMAGE</h4>
                            <div class="row">
                                <div class="col-sm-10">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image[]" multiple class="custom-file-input" id="exampleInputFile">
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
                            <hr>
                            <h4>Available Property Images</h4>
                            <div class="row">
                                @if($property->PropertyImages)
                                    @foreach ($property->PropertyImages as $image)
                                        <div class="col-md-2">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <img src="{{ asset('uploads/property/'.$image->image) }}" class="rounded" alt="img" style="width:150px;height:150px;" />
                                                <a href="{{ url('admin/property-image/'.$image->id.'/delete') }}" onclick="return confirm('Do you want to execute this command.?')" class="d-block text-center">Delete</a>
                                            </div>
                                        </div>
                                    @endforeach

                                @else
                                    <h5 class="text-primary">Property Image is Unavailable</h5>
                                @endif

                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Number of Master Bedrooms</label>
                                        <input type="number" name="master_bedrooms_num" value="{{ $property->master_bedrooms_num }}" class="form-control" placeholder="Enter a number">
                                        @if ($errors->any('master_bedrooms_num'))
                                            <small class="text-danger">{{ $errors->first('master_bedrooms_num') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Number of Bathrooms</label>
                                        <input type="number" name="bathrooms_num" value="{{ $property->bathrooms_num }}" class="form-control" placeholder="Enter a number">
                                        @if ($errors->any('bathrooms_num'))
                                            <small class="text-danger">{{ $errors->first('bathrooms_num') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Number of Rooms</label>
                                        <input type="number" name="rooms_num" value="{{ $property->rooms_num }}" class="form-control" placeholder="Enter a number">
                                        @if ($errors->any('rooms_num'))
                                            <small class="text-danger">{{ $errors->first('rooms_num') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Service Charge Fee</label>
                                        <input type="number" name="service_charge" value="{{ $property->service_charge }}" class="form-control" placeholder="Enter a number">
                                        @if ($errors->any('service_charge'))
                                            <small class="text-danger">{{ $errors->first('service_charge') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Home Availability</label>
                                        <select class="custom-select" name="availability">
                                            <option value="1" {{ $property->availability == "1" ? 'selected' : '' }}>YES</option>
                                            <option value="0" {{ $property->availability == "0" ? 'selected' : '' }}>NO</option>
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
                                        <input type="text" name="meta_title" value="{{ $property->meta_title }}" class="form-control" placeholder="Enter Meta Title">
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
                                           {{ $property->meta_keyword }}
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
                                            {{ $property->meta_keyword }}
                                        </textarea>
                                        @if ($errors->any('meta_description'))
                                            <small class="text-danger">{{ $errors->first('meta_description') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <a href="{{ route('properties') }}" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Property</button>
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
