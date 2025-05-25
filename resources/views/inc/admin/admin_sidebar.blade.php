 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Delaclique Designs</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open">
                <a href="{{ url('admin/dashboard') }}" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>

            </li>
            <li class="nav-item">
                <a href="{{ route('category') }}" class="nav-link">
                  <i class="nav-icon fas fa-columns"></i>
                  <p>
                    Category Board
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.properties') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Property Listing
                    <span class="right badge badge-danger">New</span>
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('report') }}" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Residents Report
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.payment.method') }}" class="nav-link">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>Payment Method</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('residents') }}" class="nav-link">
                    <i class="nav-icon fas fa-tree"></i>
                    <p>Residents</p>
                </a>

            </li>
            <li class="nav-item">
                <a href="{{ route('settings') }}" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>Settings</p>
                </a>
            </li>

            <li class="nav-header">Frontend Pages</li>
            <li class="nav-item">
                <a href="{{ route('gallery') }}" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>Gallery</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('hero.slider') }}" class="nav-link">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>Slider Images</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.about.us') }}" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>About-Us Page</p>
                </a>

            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon far fa-plus-square"></i>
                <p>
                    Other Pages
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.privacy') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Privacy Policy</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.terms') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Terms & Conditions</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.logos') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Logo/Favicons</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.agreement') }}" class="nav-link">
                <i class="fas fa-circle nav-icon"></i>
                <p>Agreements</p>
                </a>
            </li>
            <li class="nav-header">Auth</li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                <i class="nav-icon far fa-circle text-danger"></i>
                <p class="text">{{ __('Logout') }}</p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
