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
            <div id="sections">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ $title }} Page</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <form action="{{ url('admin/store-privacy') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div id="responsex"></div>
                                    <br>
                                    <div class="form-group">
                                        <label for="inputName">Title </label>
                                        <input type="text" placeholder="Enter Title" @if($privacy)value="{{ $privacy->title }}" @endif name="title" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Sub-Title </label>
                                        <input type="text" placeholder="Enter Subtile" @if($privacy)value="{{ $privacy->sub_title }}" @endif name="sub_title" class="form-control">
                                    </div>
                                    <hr>
                                    <h4>{{ $title }} Section</h4>

                                    <div class="form-group">
                                        <label for="inputDescription">Body Detail</label>
                                        <textarea id="mysummernote" placeholder="Enter details here..."  name="details" class="form-control" rows="4">@if($privacy){{ $privacy->details }} @endif</textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success float-right">SAVE</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->




@endsection
