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
    <link rel="icon" href="img/favicon.png" />

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
</head>

<body>
    <!-- Preloader -->
    <!-- End Preloader -->

    <!-- Cp whatsapp -->
    {{-- <div class="pro-features">
        <a class="get-pro" href="https://wa.me/6282328059577?text=Mas%20mau%20nanya%20dong!!"><img src="img/wa-icon.png"
                alt="wa-icon" width="60%"></a>
        {{-- <li class="big-title">Pro Version Available on Themeforest</li>
        <li class="title">Pro Version Features</li>
        <li>2+ premade home pages</li>
        <li>20+ html pages</li>
        <li>Color Plate With 12+ Colors</li>
        <li>Sticky Header / Sticky Filters</li>
        <li>Working Contact Form With Google Map</li>
        <div class="button">
            <a href="http://preview.themeforest.net/item/mediplus-medical-and-doctor-html-template/full_screen_preview/26665910?_ga=2.145092285.888558928.1591971968-344530658.1588061879"
                target="_blank" class="btn">Pro Version Demo</a>
            <a href="https://themeforest.net/item/mediplus-medical-and-doctor-html-template/26665910" target="_blank"
                class="btn">Buy Pro Version</a>
        </div>
    </div> --}}

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
                                            <a href="{{route('kategori')}}">Kategori</a>
                                        </li>
                                        <li class="{{ request()->is('doctors*') ? 'active' : '' }}">
                                            <a href="{{route('kategori')}}">FAQ</a>
                                        </li>
                                        <li class="{{ request()->is('pages*') ? 'active' : '' }}">
                                            <a href="/berita">Berita</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!--/ End Main Menu -->
                        </div>
                        <div class="col-lg-2 col-12 ">
                            <div class="get-quote float-right">
                                @auth
        <a href="{{ route('user.dashboard') }}" class="btn">Profile</a>
    @else
        <a href="{{ route('user.login') }}" class="btn">Login</a>
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
                                    <a href="#"><img src="img/logo-unsoed.png" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/logo-digiyok.png" alt=""></i></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/logo-dispora.png" alt=""></i></a>
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

    {{-- <script>
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