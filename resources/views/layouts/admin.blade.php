<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Panel')</title>

    <link rel="icon" href="{{ asset('img/favicon.png') }}" />

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/datatables/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/datatables/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pendaftar/adminlte.min.css') }}" />
    @stack('styles')

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fa fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                </li>
            </ul>

            {{-- profile --}}
            <ul class="navbar-nav ml-auto flex space-x-4 items-center">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa fa-user"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('auth.logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link">
                <img src="{{ asset('img/favicon.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin Duta Pemuda</span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('img/user.png') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        {{-- Menggunakan nama user yang sedang login --}}
                        <a href="#" class="d-block">{{ Auth::user()->name ?? 'Administrator' }}</a>
                    </div>
                </div>

                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class=" btn-sidebar">
                                <i class="fa fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-header">MENU UTAMA</li>
                        <li class="nav-item">
                            {{-- Arahkan ke route dashboard admin Anda --}}
                            <a href="{{ route('admin.user.dashboard') }}" class="nav-link">
                                <i class="nav-icon fa fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user.dashboard') }}"
                                class="nav-link {{ request()->routeIs('admin.user.*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-users-cog"></i>
                                <p>Manajemen User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.lomba.index') }}"
                                class="nav-link {{ request()->routeIs('admin.lomba.*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-trophy"></i>
                                <p>Manajemen Lomba</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.lomba_pendaftar.data') }}"
                                class="nav-link {{ request()->routeIs('admin.lomba_pendaftar.*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-address-book"></i>
                                <p>Data Pendaftar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.ranking.index') }}"
                                class="nav-link {{ request()->routeIs('admin.ranking.*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-address-book"></i>
                                <p>Ranking Lomba</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        {{-- Main content dari setiap halaman --}}
        @yield('content')
        {{-- ./main content --}}

        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2025 <a href="https://adminlte.io">Digiyok</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-bs4/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-responsive/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-responsive/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('js/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('js/pendaftar/adminlte.min.js') }}"></script>
    {{-- Stack untuk script khusus per halaman --}}
    @stack('scripts')
</body>

</html>
