<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="img/favicon.png" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/pendaftar/adminlte.min.css')}}" />
    <!-- Theme style -->
    @stack('styles')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fa fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">


            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="img/favicon.png" class="img-circle elevation-2" alt="User Image" />
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Duta Pemuda</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route('user.dashboard') }}" class="nav-link">
                                <i class="nav-icon fa fa-tachometer"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.dashboard') }}" class="nav-link">
                                <i class="nav-icon fa fa-tachometer"></i>
                                <p>Lihat Progres</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.dashboard') }}" class="nav-link">
                                <i class="nav-icon fa fa-tachometer"></i>
                                <p>Unduh Sertifikat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.dashboard') }}" class="nav-link">
                                <button class="btn btn-sm btn-danger">LOGOUT</button>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2025
                <a href="https://digiyok.io">Digiyok</a>.
            </strong>All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/plugins/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/pendaftar/adminlte.min.js')}}"></script>
    <script src="{{asset('js/pendaftar/demo.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src=""></script>
    <!-- AdminLTE App -->
    <script src=""></script>
    <!-- AdminLTE for demo purposes -->
    <script src=""></script>

    @stack('scripts')
</body>

</html>
