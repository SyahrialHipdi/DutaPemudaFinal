@extends('layouts.app')

@section('title', 'Berita Terbaru')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/berita.css') }}">

    <!-- Hero Dinamis -->
    @if ($highlightBerita)
        <section class="hero-modern-section">
            <div class="hero-modern-background"
                style="background-image: url('{{ asset('img/berita/' . $highlightBerita->gambar) }}');"></div>
            <div class="hero-modern-overlay"></div>
            <div class="container hero-modern-content">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center">
                        @if ($highlightBerita->kategori)
                            <a href="#" class="hero-modern-category">{{ $highlightBerita->kategori->nama }}</a>
                        @endif
                        <h1 class="hero-modern-title">{{ $highlightBerita->judul }}</h1>
                        <p class="hero-modern-excerpt">{{ Str::limit(strip_tags($highlightBerita->isi), 150, '...') }}</p>
                        <a href="{{ route('berita.detail', $highlightBerita->id) }}" class="btn btn-primary btn-lg">Baca
                            Selengkapnya <i class="fas fa-arrow-right ml-2"></i></a>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="py-5 text-center text-black bg-light mb-4">
            <div class="container">
                <h1 class="display-5 fw-bold mb-3">Informasi Seputar Duta Pemuda Tangsel</h1>
                <p class="lead mb-0">Belum ada berita terbaru yang dipublikasikan.</p>
            </div>
        </section>
    @endif

    <!-- Kumpulan Berita -->
    <section class="container my-5">
        <h2 class="modern-section-title">Berita Lainnya</h2>
        <div class="row">
            @forelse($beritas as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card-modern-berita">
                        <a href="{{ route('berita.detail', $item->id) }}" class="card-modern-img-link">
                            <img src="{{ asset('img/berita/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                class="card-modern-img">
                            @if ($item->kategori)
                                <span class="card-modern-category">{{ $item->kategori->nama }}</span>
                            @endif
                        </a>
                        <div class="card-modern-body">
                            <p class="card-modern-meta">{{ $item->created_at->format('d F Y') }}</p>
                            <h5 class="card-modern-title">
                                <a href="{{ route('berita.detail', $item->id) }}">{{ $item->judul }}</a>
                            </h5>
                            <p class="card-modern-text">{{ Str::limit(strip_tags($item->isi), 100, '...') }}</p>
                            <a href="{{ route('berita.detail', $item->id) }}" class="card-modern-readmore">Baca
                                Selengkapnya <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">Tidak ada berita lainnya untuk ditampilkan.</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection
