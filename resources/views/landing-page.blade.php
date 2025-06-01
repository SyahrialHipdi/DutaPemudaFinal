@extends('layouts.app')
@section('title', 'Home page')
@section('content')

    <style>
        @font-face {
            font-family: 'Digital7';
            src: url('fonts/digital-7.ttf') format('truetype');
        }

        .countdown-card {
            background: linear-gradient(135deg, #3a8dff, #6ca7ff);
        }

        .countdown-unit .value {
            font-family: 'Digital7', monospace;
            font-size: 5rem;
            display: block;
            text-align: center;
            line-height: 1;
            letter-spacing: .1rem;
        }

        .countdown-unit .label {
            font-size: 1rem;
            display: block;
            text-align: center;
            margin-top: .5rem;
            letter-spacing: .05rem;
            text-transform: uppercase;
        }
    </style>

    <!-- Preloader -->
    <div class="preloader">
        <div class="loader">
            <div class="loader-outter"></div>
            <div class="loader-inner"></div>

            <div class="indicator">
                <svg width="16px" height="12px">
                    <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                    <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                </svg>
            </div>
        </div>
    </div>
    <!-- End Preloader -->

    <!-- Slider Area -->
    <section class="slider">
        <div class="hero-slider">
            <!-- Start Single Slider -->
            <div class="single-slider" style="background-image: url('img/slider.png')">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="text">
                                <h1>
                                    SELEKSI
                                </h1>
                                <h1><span class="text-primary">DUTA PEMUDA</span></h1>
                                <h1>KOTA TANGERANG SELATAN TAHUN 2025
                                </h1>
                                <p><a href="#">Info Selengkapnya >></a></p>
                                <div class="button">
                                    {{-- <a href="{{ route('kategori') }}" class="btn">Daftar Sekarang</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Slider -->
            <!-- Start Single Slider -->
            <div class="single-slider" style="background-image: url('img/slider2.png')">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="text">
                                <h1>
                                    SELEKSI
                                </h1>
                                <h1><span class="text-primary">DUTA PEMUDA</span></h1>
                                <h1>KOTA TANGERANG SELATAN TAHUN 2025
                                </h1>
                                <p><a href="#">Info Selengkapnya >></a></p>
                                <div class="button">
                                    {{-- <a href="{{ route('kategori') }}" class="btn">Daftar Sekarang</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start End Slider -->
            <!-- Start Single Slider -->
            <div class="single-slider" style="background-image: url('img/slider3.png')">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="text">
                                <h1>
                                    SELEKSI
                                </h1>
                                <h1><span class="text-primary">DUTA PEMUDA</span></h1>
                                <h1>KOTA TANGERANG SELATAN TAHUN 2025
                                </h1>
                                <p><a href="#">Info Selengkapnya >></a></p>
                                <div class="button">
                                    {{-- <a href="{{ route('kategori') }}" class="btn">Daftar Sekarang</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Slider -->
        </div>
    </section>
    <!--/ End Slider Area -->

    <!-- Start Schedule Area -->
    <section class="schedule">
        <div class="container">
            <div class="schedule-inner">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- single-schedule -->
                        <div class="single-schedule first">
                            <div class="">
                                <img src="img\pp.png" style="width: 100%; border-radius: 40px">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- single-schedule -->
                        <div class="single-schedule middle">
                            <div class="">
                                <img src="img\ppap.png" style="width: 100%; border-radius: 40px">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <!-- single-schedule -->
                        <div class="single-schedule last">
                            <div class="">
                                <img src="img\ppan.png" style="width: 100%; border-radius: 40px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/End Start schedule Area -->

    <!-- Start countdown -->
    <section class="features section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title mb-2">
                        <h2 class="font-weight-bold display-4">Sisa Waktu Pendaftaran</h2>
                        <img src="img/section-img.png" alt="#" class="img-fluid" />
                    </div>
                    {{-- countdown 1 --}}
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-12">
                            <h5>Pemuda Pelopor</h5>
                            <div class="card p-5 p-md-5 d-flex flex-column flex-md-row justify-content-center align-items-center text-center text-md-left shadow"
                                style="background: linear-gradient(135deg, #1a76d1, #3a8dff); color: #fff">
                                <div class="d-flex flex-column countdown-unit text-center px-3 mb-4 mb-md-0">
                                    <span id="days2" class="value">0</span>
                                    <span class="label">Hari</span>
                                </div>
                                <div class="display-4 mx-2">:</div>
                                <div class="d-flex flex-column countdown-unit text-center px-3 mb-4 mb-md-0">
                                    <span id="hours2" class="value">00</span>
                                    <span class="label">Jam</span>
                                </div>
                                <div class="display-4 mx-2">:</div>
                                <div class="d-flex flex-column countdown-unit text-center px-3 mb-4 mb-md-0">
                                    <span id="minutes2" class="value">00</span>
                                    <span class="label">Menit</span>
                                </div>
                                <div class="display-4 mx-2">:</div>
                                <div class="d-flex flex-column countdown-unit text-center px-3">
                                    <span id="seconds2" class="value">00</span>
                                    <span class="label">Detik</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- countdown 2 --}}
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-12">
                            <h5>PPAP dan PPAN</h5>
                            <div class="card p-5 p-md-5 d-flex flex-column flex-md-row justify-content-center align-items-center text-center text-md-left shadow"
                                style=" background: linear-gradient(135deg, #1a76d1, #3a8dff); color: #fff">
                                <div class="d-flex flex-column countdown-unit text-center px-3 mb-4 mb-md-0">
                                    <span id="days2" class="value">0</span>
                                    <span class="label">Hari</span>
                                </div>
                                <div class="display-4 mx-2">:</div>
                                <div class="d-flex flex-column countdown-unit text-center px-3 mb-4 mb-md-0">
                                    <span id="hours2" class="value">00</span>
                                    <span class="label">Jam</span>
                                </div>
                                <div class="display-4 mx-2">:</div>
                                <div class="d-flex flex-column countdown-unit text-center px-3 mb-4 mb-md-0">
                                    <span id="minutes2" class="value">00</span>
                                    <span class="label">Menit</span>
                                </div>
                                <div class="display-4 mx-2">:</div>
                                <div class="d-flex flex-column countdown-unit text-center px-3">
                                    <span id="seconds2" class="value">00</span>
                                    <span class="label">Detik</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--/ End countdown -->

    <!-- Start selection flow -->
    <div id="fun-facts" class="fun-facts section overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Fun -->
                    <div class="single-fun">
                        <i class="icofont icofont-ui-note"></i>
                        <div class="content">
                            <span>Pendaftaran</span>
                            <p>23 - 25 Desember 2025</p>
                        </div>
                    </div>
                    <!-- End Single Fun -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Fun -->
                    <div class="single-fun">
                        <i class="icofont icofont-pencil"></i>
                        <div class="content">
                            <span> Isi Formulir</span>
                            <p>10 - 15 Januari 2026</p>
                        </div>
                    </div>
                    <!-- End Single Fun -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Fun -->
                    <div class="single-fun">
                        <i class="icofont-people"></i>
                        <div class="content">
                            <span>Ujian Seleksi</span>
                            <p>15 - 20 Januari 2026</p>
                        </div>
                    </div>
                    <!-- End Single Fun -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Fun -->
                    <div class="single-fun">
                        <i class="icofont icofont-bullhorn"></i>
                        <div class="content">
                            <span>Pengumuman</span>
                            <p>10 Februari 2025</p>
                        </div>
                    </div>
                    <!-- End Single Fun -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End selection flow -->

    <!-- Start Blog Area -->
    <section class="blog section" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Informasi Terkini</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single Blog -->
                    <div class="single-news">
                        <div class="news-head">
                            <img src="img/slider2.png" alt="#" />
                        </div>
                        <div class="news-body">
                            <div class="news-content">
                                <div class="date">22 Aug, 2020</div>
                                <h2>
                                    <a href="blog-single.html">We have annnocuced our new product.</a>
                                </h2>
                                <p class="text">
                                    Lorem ipsum dolor a sit ameti, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt sed do incididunt sed.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Blog -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single Blog -->
                    <div class="single-news">
                        <div class="news-head">
                            <img src="img/slider3.png" alt="#" />
                        </div>
                        <div class="news-body">
                            <div class="news-content">
                                <div class="date">15 Jul, 2020</div>
                                <h2>
                                    <a href="blog-single.html">Top five way for solving teeth problems.</a>
                                </h2>
                                <p class="text">
                                    Lorem ipsum dolor a sit ameti, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt sed do incididunt sed.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Blog -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single Blog -->
                    <div class="single-news">
                        <div class="news-head">
                            <img src="img/slider.png" alt="#" />
                        </div>
                        <div class="news-body">
                            <div class="news-content">
                                <div class="date">05 Jan, 2020</div>
                                <h2>
                                    <a href="blog-single.html">We provide highly business soliutions.</a>
                                </h2>
                                <p class="text">
                                    Lorem ipsum dolor a sit ameti, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt sed do incididunt sed.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Blog -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Area -->

@endsection