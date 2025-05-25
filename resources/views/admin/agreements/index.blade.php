@extends('layouts.admin.admin_layout')

@section('content')

    <!-- /DElete modal -->
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are You Sure You want to delete this data ? Data can't be retrieve.</p>
                    <input type="hidden" id="del_order_id">
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <button type="button" class="delete_model_btn btn btn-outline-light">Yes.Delete!</button>
                    </div>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $title }}</h1>
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
                                <h3 class="card-title">Tenants Agreements</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Tenants</th>
                                            <th>Property</th>
                                            <th>Type</th>
                                            <th>Payment Status</th>
                                            <th>Email</th>
                                            <th>Price</th>
                                            <th>Agreement Date</th>
                                            <th>Rent Status</th>
                                            <th>Signed Date(Tenant)</th> <!--Date the tenant signed the agreement after generating it -->
                                            <th>Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($agreement as $k => $val)
                                            <tr>
                                                <td>{{ ++$k }}</td>
                                                <td>{{ $val->user->name }}</td>
                                                <td>{{ $val->property->property_name }}</td>
                                                <td>{{ $val->category->name }}</td>
                                                <td>
                                                    @if ($val->payment_status == 0)
                                                        <span class="badge badge-warning">PENDING</span>
                                                    @elseif ($val->payment_status == 1)
                                                        <span class="badge badge-info">APPROVED</span>
                                                    @elseif ($val->payment_status == 2)
                                                        <span class="badge badge-success">PAID</span>
                                                    @endif
                                                </td>
                                                <td>{{ $val->user->email }}</td>
                                                <td>#@php echo number_format($val->property->price)@endphp.00</td>
                                                <td>
                                                    @if ($val->agreement_date == null)
                                                        <span class="badge badge-danger">PENDING</span>
                                                    @else
                                                        {{ date('d/m/Y ', strtotime($val->agreement_date)) }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($val->payment_status == 0)
                                                        <span class="badge badge-danger">Not Active</span>
                                                    @elseif ($val->payment_status == 1)
                                                        <span class="badge badge-info">Waiting...</span>
                                                    @elseif ($val->payment_status == 2)
                                                        <span class="badge badge-success">Active</span>
                                                    @endif
                                                </td>
                                                <!--Date the tenant signed the agreement after generating it -->
                                                <td>
                                                    @if ($val->date == null)
                                                        <span>Not signed yet</span>
                                                    @else
                                                    {{ \Carbon\Carbon::parse($val->date)->format('jS \o\f F, Y') }}
                                                    @endif
                                                </td>

                                                <td>{{ date('d/m/Y', strtotime($val->created_at)) }}</td>
                                                <td>
                                                    @if ($val->signature !== null)
                                                        <button type="button" data-toggle="modal" data-target="#modal-lg{{ $val->id }}"
                                                            class="btn btn-primary">
                                                            <i class="fas fa-shopping-cart">
                                                                Update
                                                            </i>
                                                        </button>
                                                    @endif

                                                    @if ($val->signature == null && $val->payment_status == 0)
                                                        <a href="{{ url('admin/generate-agreement/' . $val->id) }}" type="button" class="btn btn-success"
                                                            onclick="return confirm('This is not revisible, is the agreement fully confirmed... ?')">
                                                            <i class="fas fa-file">Generate</i>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>


                                             <!-- /.Edit modal-content -->
                                            <div class="modal fade" id="modal-lg{{ $val->id }}">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Update Payment Status for:  {{ $val->user->name }}</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ url('admin/agreenents/'.$val->id) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" value="{{ $val->id }}">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Name</label>
                                                                            <input type="text" class="form-control" readonly value="{{ $val->user->name }}">
                                                                            @if ($errors->any('name'))
                                                                                <small class="text-danger">{{ $errors->first('name') }}</small>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Tenant Email</label>
                                                                            <input type="text" readonly class="form-control" value="{{ $val->email }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Property Name</label>
                                                                            <textarea class="form-control" readonly rows="3" required>{!! $val->property->property_name !!}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Payment Status</label>
                                                                            <select class="custom-select" name="payment_status">
                                                                            <option value="0" {{ $val->payment_status == '0' ? 'selected':'' }}>Pending</option>
                                                                            <option value="2" {{ $val->payment_status == '2' ? 'selected':'' }}>Paid</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save changes</button>
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
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection


@endsection
