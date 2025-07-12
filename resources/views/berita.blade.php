@extends('layouts.app')

@section('title', 'Berita Terbaru')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/berita.css') }}">

    <!-- Hero -->
    <section class="py-5 text-center text-black bg-light mb-4">
        <div class="container">
            <h1 class="display-5 fw-bold mb-3">Informasi Seputar Duta Pemuda Tangsel</h1>
            <p class="lead mb-0">Duta Pelajar Hadirkan Kisah Inspiratif dari Program Pertukaran Pelajar Terkini!</p>
        </div>
    </section>

    <!-- Highlight Berita -->
    <section class="container mb-5">
        <div class="row g-4 align-items-center">
            <div class="col-md-6">
                <img src="{{ asset('img/57pem.webp') }}" alt="Jumbo" class="img-fluid rounded shadow">
            </div>
            <div class="col-md-6">
                <h2 class="mb-3">57 pemuda Tangerang ikuti seleksi pertukaran pemuda ke tiga negara</h2>
                <p class="mb-3">Tangerang (ANTARA) - Sebanyak 57 pemuda dari berbagai perguruan tinggi mengikuti Seleksi
                    Duta Pemuda Kota Tangerang Kategori Pertukaran Pemuda Antar Negara (PPAN) memperebutkan kuota pertukaran
                    pemuda ke Singapura, Jepang, dan Korea.</p>
                <small class="text-muted">12 Mei 2025 - Raditya Yusuf Ramadhan</small>
            </div>
        </div>
    </section>

    <!-- Kumpulan Berita -->
    <section class="container mb-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @php
                $berita = [
                    ['img' => 'young.webp', 'judul' => 'Duta Kampus Unej wakili Indonesia "Youth Exchange" Malaysia-Singapura', 'isi' => 'Jember, Jawa Timur (ANTARA) - Duta Kampus Universitas Jember (Unej)...'],
                    ['img' => 'antar.webp', 'judul' => 'Kepri kirim dua perwakilan pertukaran pemuda antarnegara 2024', 'isi' => 'Tanjungpinang (ANTARA) - Dinas Pemuda dan Olahraga (Dispora)...'],
                    ['img' => '38prov.webp', 'judul' => 'Utusan 38 provinsi ikuti program Pertukaran Pemuda Nasional di Kaltara', 'isi' => 'Tanjung Selor (ANTARA) - Puluhan pemuda dari 38 provinsi...'],
                    ['img' => 'gubsul.webp', 'judul' => 'Gubernur Sulbar minta peserta PPAN jaga nama baik Indonesia', 'isi' => 'Mamuju (ANTARA) - Penjabat Gubernur Sulawesi Barat (Sulbar)...'],
                    ['img' => '348maha.webp', 'judul' => '348 mahasiswa Unja ikuti program Pertukaran Mahasiswa Merdeka 2024', 'isi' => 'Jambi (ANTARA) - Sebanyak 348 mahasiswa Universitas Jambi...'],
                    ['img' => 'jambi.webp', 'judul' => 'Jambi kirim dua mahasiswa ikut Pertukaran Pemuda Antar-Negara 2023', 'isi' => 'Jambi (ANTARA) - Dinas Pemuda dan Olahraga Provinsi Jambi...'],
                ];
            @endphp

            @foreach($berita as $b)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('img/' . $b['img']) }}" class="card-img-top" alt="">
                        <div class="card-body d-flex flex-column p-4">
                            <h5 class="card-title mb-2">{{ $b['judul'] }}</h5>
                            <p class="card-text mb-3">{{ $b['isi'] }}</p>
                            <a href="#" class="btn btn-outline-primary mt-auto">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection