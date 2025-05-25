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
            <a type="button" href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-lg">View Replied Reports</a>
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
                <h3 class="card-title">Reports</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Resident Name</th>
                    <th>Title</th>
                    <th>Attachments</th>
                    <th>IsRead</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($reports as $k=>$val)
                  <tr>
                    <td>{{ ++$k }}</td>
                    <td>{{ $val->user->name }}</td>
                    <td>{{ $val->title }}</td>
                    <td>
                        @if($val->attachment)
                            <img src="{{ asset('uploads/report/'.$val->attachment) }}" alt="img" height="30px">
                        @else
                            <span>No attachments</span>
                        @endif
                    </td>
                    <td>
                        @if ($val->is_read == true)
                            <span class="badge badge-success">Replied</span>
                        @else
                            <span class="badge badge-danger">Unreplied</span>
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-lg{{ $val->id }}"><i class="fas fa-edit"></i>Reply</button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{ $val->id }}"><i class="fas fa-trash-alt"></i>Delete</button>
                    </td>
                  </tr>

                  <!-- /DElete modal -->
                  <div class="modal fade" id="modal-danger{{ $val->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content bg-danger">
                        <div class="modal-header">
                          <h4 class="modal-title">Delete Data</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('admin/delete-category/'.$val->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <p>Are You Sure You want to delete this data ? Data can't be retrieve.</p>
                                <input type="hidden" value="{{ $val->id }}">
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-outline-light">Yes.Delete!</button>
                                </div>
                            </form>
                        </div>

                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->

                  <!-- /.Edit modal-content -->
                  <div class="modal fade" id="modal-lg{{ $val->id }}">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">View Report </h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('admin/report') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="report_id" value="{{ $val->id }}">
                                <input type="hidden" name="tenant_id" value="{{ $val->user_id }}">
                                <input type="hidden" name="admin_id" value="{{ $userId }}">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Report from: {{ $val->user->name }}</label>
                                            <br>
                                            <label>Subject/Title: {{ $val->title }}</label>
                                            <br>
                                            <br>
                                            <label>Message Report</label>
                                            <p>{{ $val->message }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    @if($val->attachment)
                                        <div class="col-md-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <img src="{{ asset('uploads/report/'.$val->attachment) }}" class="rounded" alt="img" style="width:150px;height:150px;" />
                                                <a href="{{ asset('uploads/report/'.$val->attachment) }}" target="__blank" class="d-block text-center">View Attachment</a>
                                            </div>
                                        </div>
                                    @else
                                    <div class="col-md-6">
                                        <p class="text-primary">No attachments available</p>
                                    </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Your Reply</label>
                                            <textarea class="form-control" name="reply" rows="6" required></textarea>
                                            @error('reply')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">send Reply</button>
                                  </div>
                            </form>
                        </div>

                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->

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
