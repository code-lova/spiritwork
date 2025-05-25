@extends('layouts.admin.admin_layout')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $settings->site_name }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Website Traffic</span>
                <span class="info-box-number">
                    {{ $counter->views }}
                  <small>Visitors</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Residents</span>
                <span class="info-box-number">{{ $agreement }} In Total</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Reports</span>
                <span class="info-box-number">{{ $totalReport }} tenant report</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Users</span>
                <span class="info-box-number">{{ $totalusers }} total</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">


            <!-- TABLE: LATEST REPORTS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Report</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>IP Address</th>
                      <th>Email</th>
                      <th>Last Seen</th>
                      <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($users as $k=>$user)
                    <tr>
                      <td><a href="pages/examples/invoice.html">{{ $user->ip_address }}</a></td>
                      <td>{{ $user->email }}</td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                            {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
                        </div>
                      </td>
                       <td>
                            @if(Cache::has('User-is-Online' . $user->id))
                                <span class="badge bg-success">Online</span>
                            @else
                                <span class="badge bg-danger">Offline</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td>No Registered User Yet</td>
                        </tr>
                    @endforelse


                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="{{ route('residents') }}" class="btn btn-sm btn-secondary float-right">View All Residents</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pending Agreement</span>
                <span class="info-box-number">{{ $pendingAgreement }} is pending</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="far fa-heart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Category</span>
                <span class="info-box-number">{{ $category }} categories</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-danger">
                <span class="info-box-icon"><i class="far fa-comment"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Admin Replied Report </span>
                <span class="info-box-number">{{ $totalRepliedReport }} in total, {{ $totalUnRepliedReport }} is Unreplied</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>


              <div class="info-box-content">
                <span class="info-box-text">Completed Agreement</span>
                <span class="info-box-number">{{ $completedAgreement }} is completed</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->


            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recently Listing</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
                 <div class="card-body p-0">
                    @foreach ($properties as $listing)
                        <ul class="products-list product-list-in-card pl-2 pr-2">
                            <li class="item">
                                <div class="product-img">
                                    <img src="{{ asset('uploads/property/' . $listing->PropertyImages[0]->image) }}" class="rounded" alt="img" style="width:50px;height:50px;" />
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">{{ $listing->property_name }}
                                        <span class="badge badge-warning float-right">N{{ number_format($listing->price, 2) }}</span></a>
                                    <span class="product-description">
                                        {{ $listing->category->name }}
                                    </span>
                                </div>
                            </li>
                        </ul>
                    @endforeach
                </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="javascript:void(0)" class="uppercase">View All Products</a>
              </div>
              <!-- /.card-footer -->
            </div>

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
