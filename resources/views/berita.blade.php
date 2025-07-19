@extends('layouts.app')

@section('title', 'Berita Terbaru')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/berita.css') }}">
    <style>
        /* CSS untuk Hero Section Dinamis */
        .hero-section {
            position: relative;
            padding: 8rem 0;
            background-size: cover;
            background-position: center center;
            color: white;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0.3) 100%);
            /* Gradient overlay */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }
    </style>

    <!-- Hero Dinamis -->
    @if($highlightBerita)
        <section class="container my-4">
            <div class="hero-section text-center"
                style="background-image: url('{{ asset('img/berita/' . $highlightBerita->gambar) }}');">
                <div class="hero-overlay">
                    <div class="hero-content">
                        <h1 class="display-5 fw-bold mb-3">{{ $highlightBerita->judul }}</h1>
                        <p class="lead mb-4 col-md-8 mx-auto">{{ Str::limit(strip_tags($highlightBerita->isi), 120, '...') }}
                        </p>
                        {{-- Link diperbarui --}}
                        <a href="{{ route('berita.detail', $highlightBerita->id) }}" class="btn btn-primary btn-lg">Baca
                            Selengkapnya</a>
                    </div>
                </div>
            </div>
        </section>
    @else
        {{-- Fallback jika tidak ada berita sama sekali --}}
        <section class="py-5 text-center text-black bg-light mb-4">
            <div class="container">
                <h1 class="display-5 fw-bold mb-3">Informasi Seputar Duta Pemuda Tangsel</h1>
                <p class="lead mb-0">Belum ada berita terbaru yang dipublikasikan.</p>
            </div>
        </section>
    @endif

    <!-- Kumpulan Berita -->
    <section class="container mb-5">
        <h2 class="mb-4 text-center">Berita Lainnya</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

            @forelse($beritas as $item)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        <a href="{{ route('berita.detail', $item->id) }}">
                            <img src="{{ asset('img/berita/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}">
                        </a>
                        <div class="card-body d-flex flex-column p-4">
                            <h5 class="card-title mb-2">
                                <a href="{{ route('berita.detail', $item->id) }}"
                                    class="text-decoration-none text-dark stretched-link">{{ $item->judul }}</a>
                            </h5>
                            <p class="card-text mb-3">{{ Str::limit(strip_tags($item->isi), 100, '...') }}</p>
                            {{-- Tombol ini bisa dihapus karena seluruh card sudah bisa diklik --}}
                            <a href="{{ route('berita.detail', $item->id) }}" class="btn btn-outline-primary mt-auto">Read
                                More</a>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Jika tidak ada berita selain highlight, bagian ini tidak akan menampilkan apa-apa, yang sudah sesuai --}}
            @endforelse

        </div>
    </section>

@endsection