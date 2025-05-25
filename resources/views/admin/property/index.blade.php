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
            <a href="{{ route('add.property') }}" type="button" class="btn btn-primary float-right">Add New Property</a>
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
                <h3 class="card-title">List of Products</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Properties</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Type</th>
                    <th>Listing</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($property as $k => $val )
                        <tr>
                            <td>{{ ++$k }}</td>
                            <td>{{ $val->property_name }}</td>
                            <td>{{ $val->category->name }}</td>
                            <td>₦@php echo number_format($val->price)@endphp.00</td>

                            <td>{{ $val->type }}</td>
                            <td>
                                @if ($val->listing == 1)
                                    <span class="badge badge-success">Listed</span>
                                @else
                                    <span class="badge badge-danger">Not Listed</span>
                                @endif
                            </td>
                            <td>
                                @if ($val->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Not-Active</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('admin/property/'.$val->id.'/edit') }}" type="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="{{ url('admin/property/'.$val->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete this data.?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
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
