<!DOCTYPE html>
<html lang="en">

<head>
    <title>Duta Pemuda</title>
    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Phoenixcoded" />

    {{-- google fonts --}}
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet" />

    <!-- Favicon icon -->
    <link rel="icon" href="img/favicon.png" />

    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('css/sb-admin-2.css') }}" /> --}}

    {{-- datatables --}}
    <link href="{{asset('css/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />

    <style>
        .pcoded-header .mobile-menu span,
        .pcoded-header .mobile-menu span::before,
        .pcoded-header .mobile-menu span::after {
            background-color: #000000 !important;
        }
    </style>

    @stack('styles')
</head>

<body class="">
    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-content scroll-div">
                <div class="">
                    <div class="collapse" id="nav-user-link">
                        <ul class="list-unstyled">
                            <li class="list-group-item">
                                <a href="user-profile.html"><i class="feather icon-user m-r-5"></i>View Profile</a>
                            </li>
                            <li class="list-group-item">
                                <a href="#!"><i class="feather icon-settings m-r-5"></i>Settings</a>
                            </li>
                            <li class="list-group-item">
                                <a href="auth-normal-sign-in.html"><i class="feather icon-log-out m-r-5"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <ul class="nav pcoded-inner-navbar">
                    {{-- <li class="nav-item pcoded-menu-caption">
                        <label>Navigation</label>
                    </li> --}}
                    <li class="nav-item mt-4">
                        {{-- <a href="{{ route('admin.dashboard') }}" class="nav-link"><span class="pcoded-micon"><i
                                    class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a> --}}
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i
                                    class="feather icon-layout"></i></span><span class="pcoded-mtext">Kelola
                                akun</span></a>
                        <ul class="pcoded-submenu">
                            <li>
                                {{-- <a href="{{ route('editor') }}">Editor</a> --}}
                            </li>
                            <li>
                                <a href="layout-horizontal.html" target="_blank">Peserta</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i
                                    class="feather icon-box"></i></span><span class="pcoded-mtext">Kelola
                                Pendaftaran</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="bc_alert.html">Pemuda Pelopor</a></li>
                            <li><a href="bc_button.html">PPAP</a></li>
                            <li><a href="bc_badges.html">PPAN</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-dark header-light">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            <a href="#!" class="b-brand">
                <img src="{{asset('img/logo.png')}}" alt="" width="65%" class="logo" />
            </a>
            <a href="#!" class="mob-toggler">
                <i class="feather icon-more-vertical"></i>
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="dropdown-toggle h-drop" href="#" data-toggle="dropdown">
                            Dropdown
                        </a>
                        <div class="dropdown-menu profile-notification">
                            <ul class="pro-body">
                                <li>
                                    <a href="user-profile.html" class="dropdown-item"><i class="fas fa-circle"></i>
                                        Profile</a>
                                </li>
                                <li>
                                    <a href="email_inbox.html" class="dropdown-item"><i class="fas fa-circle"></i> My
                                        Messages</a>
                                </li>
                                <li>
                                    <a href="auth-signin.html" class="dropdown-item"><i class="fas fa-circle"></i>
                                        Lock
                                        Screen</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="dropdown mega-menu">
                        <a class="dropdown-toggle h-drop" href="#" data-toggle="dropdown">
                            Mega
                        </a>
                        <div class="dropdown-menu profile-notification">
                            <div class="row no-gutters">
                                <div class="col">
                                    <h6 class="mega-title">UI Element</h6>
                                    <ul class="pro-body">
                                        <li>
                                            <a href="#!" class="dropdown-item"><i class="fas fa-circle"></i>
                                                Alert</a>
                                        </li>
                                        <li>
                                            <a href="#!" class="dropdown-item"><i class="fas fa-circle"></i>
                                                Button</a>
                                        </li>
                                        <li>
                                            <a href="#!" class="dropdown-item"><i class="fas fa-circle"></i>
                                                Badges</a>
                                        </li>
                                        <li>
                                            <a href="#!" class="dropdown-item"><i class="fas fa-circle"></i>
                                                Cards</a>
                                        </li>
                                        <li>
                                            <a href="#!" class="dropdown-item"><i class="fas fa-circle"></i>
                                                Modal</a>
                                        </li>
                                        <li>
                                            <a href="#!" class="dropdown-item"><i class="fas fa-circle"></i>
                                                Tabs & pills</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <h6 class="mega-title">Forms</h6>
                                    <ul class="pro-body">
                                        <li>
                                            <a href="#!" class="dropdown-item"><i
                                                    class="feather icon-minus"></i>
                                                Elements</a>
                                        </li>
                                        <li>
                                            <a href="#!" class="dropdown-item"><i
                                                    class="feather icon-minus"></i>
                                                Validation</a>
                                        </li>
                                        <li>
                                            <a href="#!" class="dropdown-item"><i
                                                    class="feather icon-minus"></i>
                                                Masking</a>
                                        </li>
                                        <li>
                                            <a href="#!" class="dropdown-item"><i
                                                    class="feather icon-minus"></i>
                                                Wizard</a>
                                        </li>
                                        <li>
                                            <a href="#!" class="dropdown-item"><i
                                                    class="feather icon-minus"></i>
                                                Picker</a>
                                        </li>
                                        <li>
                                            <a href="#!" class="dropdown-item"><i
                                                    class="feather icon-minus"></i>
                                                Select</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <h6 class="mega-title">Application</h6>
                                    <ul class="pro-body">
                                        <li>
                                            <a href="#!" class="dropdown-item"><i class="feather icon-mail"></i>
                                                Email</a>
                                        </li>
                                        <li>
                                            <a href="#!" class="dropdown-item"><i
                                                    class="feather icon-clipboard"></i>
                                                Task</a>
                                        </li>
                                        <li>
                                            <a href="#!" class="dropdown-item"><i
                                                    class="feather icon-check-square"></i>
                                                To-Do</a>
                                        </li>
                                        <li>
                                            <a href="#!" class="dropdown-item"><i
                                                    class="feather icon-image"></i>
                                                Gallery</a>
                                        </li>
                                        <li>
                                            <a href="#!" class="dropdown-item"><i
                                                    class="feather icon-help-circle"></i>
                                                Helpdesk</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <h6 class="mega-title">Extension</h6>
                                    <ul class="pro-body">
                                        <li>
                                            <a href="#!" class="dropdown-item"><i
                                                    class="feather icon-file-plus"></i>
                                                Editor</a>
                                        </li>
                                        <li>
                                            <a href="#!" class="dropdown-item"><i
                                                    class="feather icon-file-minus"></i>
                                                Invoice</a>
                                        </li>
                                        <li>
                                            <a href="#!" class="dropdown-item"><i
                                                    class="feather icon-calendar"></i>
                                                Full calendar</a>
                                        </li>
                                        <li>
                                            <a href="#!" class="dropdown-item"><i
                                                    class="feather icon-upload-cloud"></i>
                                                File upload</a>
                                        </li>
                                        <li>
                                            <a href="#!" class="dropdown-item"><i
                                                    class="feather icon-scissors"></i>
                                                Image cropper</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                            <i class="icon feather icon-bell"></i>
                            <span class="badge badge-pill badge-danger">5</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right notification">
                            <div class="noti-head">
                                <h6 class="d-inline-block m-b-0">
                                    Notifications
                                </h6>
                                <div class="float-right">
                                    <a href="#!" class="m-r-10">mark as read</a>
                                    <a href="#!">clear all</a>
                                </div>
                            </div>
                            <ul class="noti-body">
                                <li class="n-title">
                                    <p class="m-b-0">NEW</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        {{-- <img class="img-radius" src="assets/images/user/avatar-1.jpg"
                                            alt="Generic placeholder image" /> --}}
                                        <div class="media-body">
                                            <p>
                                                <strong>John Doe</strong><span class="n-time text-muted"><i
                                                        class="icon feather icon-clock m-r-10"></i>5 min</span>
                                            </p>
                                            <p>New ticket Added</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="n-title">
                                    <p class="m-b-0">EARLIER</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        {{-- <img class="img-radius" src="assets/images/user/avatar-2.jpg"
                                            alt="Generic placeholder image" /> --}}
                                        <div class="media-body">
                                            <p>
                                                <strong>Joseph William</strong><span class="n-time text-muted"><i
                                                        class="icon feather icon-clock m-r-10"></i>10 min</span>
                                            </p>
                                            <p>
                                                Prchace New Theme and make
                                                payment
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        {{-- <img class="img-radius" src="assets/images/user/avatar-1.jpg"
                                            alt="Generic placeholder image" /> --}}
                                        <div class="media-body">
                                            <p>
                                                <strong>Sara Soudein</strong><span class="n-time text-muted"><i
                                                        class="icon feather icon-clock m-r-10"></i>12 min</span>
                                            </p>
                                            <p>currently login</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        {{-- <img class="img-radius" src="assets/images/user/avatar-2.jpg"
                                            alt="Generic placeholder image" /> --}}
                                        <div class="media-body">
                                            <p>
                                                <strong>Joseph William</strong><span class="n-time text-muted"><i
                                                        class="icon feather icon-clock m-r-10"></i>30 min</span>
                                            </p>
                                            <p>
                                                Prchace New Theme and make
                                                payment
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="noti-footer">
                                <a href="#!">show all</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="feather icon-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                {{-- <img src="assets/images/user/avatar-1.jpg" class="img-radius"
                                    alt="User-Profile-Image" /> --}}
                                <span>John Doe</span>
                                <a href="auth-signin.html" class="dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>
                            <ul class="pro-body">
                                <li>
                                    <a href="user-profile.html" class="dropdown-item"><i
                                            class="feather icon-user"></i>
                                        Profile</a>
                                </li>
                                <li>
                                    <a href="email_inbox.html" class="dropdown-item"><i
                                            class="feather icon-mail"></i>
                                        My Messages</a>
                                </li>
                                <li>
                                    <a href="auth-signin.html" class="dropdown-item"><i
                                            class="feather icon-lock"></i>
                                        Lock Screen</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <!-- [ Header ] end -->

    {{-- main content --}}
    @yield('content')
    {{-- end main content --}}

    <!-- Muat jQuery terlebih dahulu -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/datatables/datatables-demo.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>


</body>

</html>
