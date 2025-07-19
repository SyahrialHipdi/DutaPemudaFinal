@extends('layouts.app')

@section('title', $berita['judul'])

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/berita.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@section('content')
    <div class="berita-detail-modern-container">
        <!-- Article Header -->
        <header class="berita-detail-header text-center">
            <div class="container">
                <a href="{{ url()->previous() }}" class="back-link"><i class="fas fa-arrow-left"></i> Kembali ke Berita</a>
                <h1 class="berita-detail-title">{{ $berita['judul'] }}</h1>
                <div class="berita-detail-meta">
                    <span><i class="far fa-user"></i> Oleh {{ $berita['user']['name'] ?? 'Admin' }}</span>
                    <span class="mx-3">|</span>
                    <span><i class="far fa-calendar-alt"></i>
                        {{ \Carbon\Carbon::parse($berita['created_at'])->format('d F Y') }}</span>
                    @if (!empty($berita['kategori']))
                        <span class="mx-3">|</span>
                        <span class="badge badge-primary">{{ $berita['kategori']['nama'] }}</span>
                    @endif
                </div>
            </div>
        </header>

        <!-- Featured Image -->
        <div class="container">
            <div class="berita-detail-img-wrapper">
                <img src="{{ asset("img/berita/{$berita['gambar']}") }}" alt="{{ $berita['judul'] }}"
                    class="img-fluid">
            </div>
        </div>

        <!-- Article Content -->
        <div class="container">
            <article class="berita-detail-content">
                {!! nl2br(e($berita['isi'])) !!}
            </article>
        </div>

        <!-- Related Berita -->
        <section class="related-berita-modern">
            <div class="container">
                <h2 class="modern-section-title">Berita Terkait</h2>
                <div class="row">
                    @forelse($beritaTerkait as $item)
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
                                    <a href="{{ route('berita.detail', $item->id) }}" class="card-modern-readmore">Baca
                                        Selengkapnya <i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-center">Tidak ada berita terkait lainnya.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection
