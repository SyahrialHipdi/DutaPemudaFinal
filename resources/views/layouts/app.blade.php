<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="keywords" content="Site keywords here" />
    <meta name="description" content="" />
    <meta name="copyright" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/favicon.png') }}" />

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" />
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
    <!-- Icofont CSS -->
    <link rel="stylesheet" href="{{ asset('css/icofont.css') }}" />
    <!-- Slicknav -->
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" />
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('css/owl-carousel.css') }}" />
    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}" />
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}" />
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" />

    <!-- Medipro CSS -->
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/form.css') }}" />

    @stack('styles')

    {{-- Letakkan ini di bagian paling bawah file Blade Anda --}}
    @push('styles')
        <style>
            /* Memberi gaya pada panel dropdown utama */
            .profile-dropdown-menu {
                padding: 0;
                border: 1px solid #eee;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
                border-radius: 8px !important;
                margin-top: 10px !important;
            }

            /* Memberi gaya pada header dropdown */
            .dropdown-header-custom {
                padding: 1rem;
                border-bottom: 1px solid #eee;
            }

            .dropdown-header-custom h6 {
                margin-bottom: 0.25rem;
                font-weight: 600;
                color: #333;
            }

            .dropdown-header-custom p {
                margin-bottom: 0;
                font-size: 13px;
            }

            /* Memberi gaya pada setiap item di dropdown */
            .profile-dropdown-menu .dropdown-item {
                padding: 0.75rem 1.5rem;
                font-size: 14px;
                color: #555;
                transition: all 0.2s ease-in-out;
            }

            /* Efek hover yang halus */
            .profile-dropdown-menu .dropdown-item:hover {
                background-color: #1a76d1;
                /* Warna biru dari tema Anda */
                color: #ffffff;
            }

            /* Merapikan ikon di dalam item dropdown */
            .profile-dropdown-menu .dropdown-item .fa {
                width: 20px;
                /* Memberi ruang agar teks sejajar */
            }

            .navbar-avatar {
                width: 35px;
                height: 35px;
                border-radius: 50%;
                object-fit: cover;
                /* Mencegah gambar menjadi gepeng */
                margin-right: 8px;
                border: 2px solid #f0f0f0;
            }
        </style>
    @endpush
</head>

<body>

    <!-- Header Area -->
    <header class="header">
        <!-- Header Inner -->
        <div class="header-inner">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-12">
                            <!-- Start Logo -->
                            <div class="logo">
                                <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt="#"
                                        width="60%" /></a>
                            </div>
                            <!-- End Logo -->
                            <!-- Mobile Nav -->
                            <div class="mobile-nav"></div>
                            <!-- End Mobile Nav -->
                        </div>
                        <div class="d-flex col-lg-7 col-md-9 col-12 justify-content-center">
                            <!-- Main Menu -->
                            <div class="main-menu">
                                <nav class="navigation">
                                    <ul class="nav menu">
                                        <li class="{{ request()->is('/') ? 'active' : '' }}">
                                            <a href="{{ route('home') }}">Beranda</a>
                                        </li>
                                        <li class="{{ request()->is('doctors*') ? 'active' : '' }}">
                                            <a href="{{ route('lomba.index') }}">Kategori</a>
                                        </li>
                                        <li class="{{ request()->is('doctors*') ? 'active' : '' }}">
                                            <a href="/faq">FAQ</a>
                                        </li>
                                        <li class="{{ request()->is('pages*') ? 'active' : '' }}">
                                            <a href="/berita">Berita</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!--/ End Main Menu -->
                        </div>
                        <div class="col-lg-2 col-12 mt-2">
                            <div class="get-quote float-right">
                                @auth
                                    <div class="nav-item dropdown">

                                        {{-- TOMBOL TRIGGER DROPDOWN --}}
                                        <a id="navbarDropdown"
                                            class="nav-link btn dropdown-toggle d-flex align-items-center" href="#"
                                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            v-pre style="padding: 5px 15px; color: white;">

                                            {{-- Menampilkan Avatar Pengguna, atau Ikon Default --}}
                                            {{-- Ganti 'avatar' dengan nama kolom foto profil di tabel users Anda jika
                                            berbeda --}}
                                            @if (Auth::user()->avatar)
                                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar"
                                                    class="navbar-avatar">
                                            @else
                                                Profile
                                            @endif


                                        </a>

                                        {{-- PANEL DROPDOWN YANG AKAN MUNCUL --}}
                                        <div class="dropdown-menu dropdown-menu-right profile-dropdown-menu"
                                            aria-labelledby="navbarDropdown">

                                            <div class="dropdown-divider"></div>

                                            @php
                                                $dashboardRoute = match (Auth::user()->role) {
                                                    'admin' => route('admin.dashboard'),
                                                    'juri' => route('juri.index'),
                                                    'peserta' => route('peserta.index'),
                                                    default => route('home'),
                                                };
                                            @endphp

                                            <a class="dropdown-item" href="{{ $dashboardRoute }}">
                                                <i class="fa fa-th-large mr-2"></i> Dashboard
                                            </a>

                                            <div class="dropdown-divider"></div>

                                            <a class="dropdown-item" href="{{ route('auth.logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out mr-2"></i> Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    {{-- Jika belum login, tampilkan tombol Login --}}
                                    <a href="{{ route('auth.login') }}" class="btn">Login</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Header Inner -->
    </header>
    <!-- End Header Area -->

    <!-- Main Content -->
    @yield('content')
    <!-- End Main Content -->

    <!-- Footer Area -->
    <footer id="footer" class="footer">
        <!-- Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-footer">
                            <h2>About Us</h2>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Possimus, nostrum?</p>
                            <ul class="social">
                                <li>
                                    <a href="#"><img src="{{ asset('img/logo-unsoed.png') }}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('img/logo-digiyok.png') }}" alt=""></i></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('img/logo-dispora.png') }}" alt=""></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-footer f-link">
                            <h2>Quick Links</h2>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Home</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Kategori</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Alur
                                                seleksi</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Berita</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-footer">
                            <h2>Contact</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, alias ducimus vitae
                                voluptatum dicta suscipit.</p>
                            <!-- Social -->
                            <ul class="social">
                                <li>
                                    <a href="#"><i class="icofont-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icofont-whatsapp"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icofont-google-plus"></i></a>
                                </li>
                            </ul>
                            <!-- End Social -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Footer Top -->
        <!-- Copyright -->
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="copyright-content">
                            <p>
                                © Copyright 2025 | All Rights Reserved by
                                <a href="https://www.wpthemesgrid.com" target="_blank">cihuy</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Copyright -->
    </footer>
    <!--/ End Footer Area -->

    <!-- jQuery Min JS -->

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.0.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/easing.js') }}"></script>
    <script src="{{ asset('js/colors.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/jquery.nav.js') }}"></script>
    <script src="{{ asset('js/slicknav.min.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/niceselect.js') }}"></script>
    <script src="{{ asset('js/tilt.jquery.min.js') }}"></script>
    <script src="{{ asset('js/owl-carousel.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/steller.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    {{-- Problem disini --}}
    <script src="{{ asset('js/main.js') }}"></script>

    {{--
    <script>
        $(document).ready(function () {
            $('#btn-lanjut').click(function () {
                if (!$('#agreeTerms').is(':checked')) {
                    $('#alert-warning').removeClass('d-none');
                } else {
                    $('#alert-warning').addClass('d-none');
                    $('#wizard-step-1').hide();
                    $('#wizard-step-2').show();
                    $("html, body").animate({
                        scrollTop: 0
                    }, "slow");
                }
            });

            $('#myForm').on('submit', function (event) {
                event.preventDefault();

                let form = this;
                const checkBox = document.getElementById("invalidCheck");
                let isValid = form.checkValidity();

                // Tampilkan alert jika form tidak valid atau checkbox tidak dicentang
                if (!isValid || !checkBox.checked) {
                    $('#alert-warning-2').removeClass('d-none');
                } else {
                    $('#alert-warning-2').addClass('d-none');
                }

                // Jika checkbox tidak dicentang, tambahkan pesan khusus
                if (!checkBox.checked) {
                    $('#alert-warning-2').text("Silakan centang kotak persetujuan dan lengkapi data Anda.");
                } else if (!isValid) {
                    $('#alert-warning-2').text("Silakan lengkapi data Anda.");
                }

                if (isValid && checkBox.checked) {
                    form.submit();
                } else {
                    form.classList.add('was-validated');
                }
            });
        });
    </script> --}}

    @stack('scripts')
</body>

</html>