@extends('layouts.app')

@section('title', $berita['judul'])

@push('styles')
    {{-- Menambahkan style khusus untuk halaman ini --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #1a56db;
            --primary-dark: #0e3c9e;
            --secondary: #0e9f6e;
            --light: #f9fafb;
            --dark: #1f2937;
            --gray: #6b7280;
            --light-gray: #e5e7eb;
            --border-radius: 12px;
            --box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --box-shadow-hover: 0 6px 16px rgba(0, 0, 0, 0.12);
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--dark);
            background-color: #f5f7fa;
            line-height: 1.6;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .news-card {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .news-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--box-shadow-hover);
        }

        .news-image {
            height: 200px;
            overflow: hidden;
            position: relative;
        }

        .news-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .news-card:hover .news-image img {
            transform: scale(1.08);
        }

        .news-content {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .news-meta {
            display: flex;
            align-items: center;
            font-size: 0.85rem;
            color: var(--gray);
            margin-bottom: 12px;
        }

        .news-meta i {
            margin-right: 6px;
            color: var(--primary);
        }

        .news-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--dark);
            transition: color 0.3s ease;
            text-decoration: none;
        }

        .news-card:hover .news-title {
            color: var(--primary);
        }

        .news-excerpt {
            color: var(--gray);
            margin-bottom: 20px;
            flex-grow: 1;
        }

        .read-more-link {
            color: var(--primary);
            font-weight: 500;
            text-decoration: none;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .read-more-link:hover {
            color: var(--primary-dark);
        }

        .read-more-link i {
            margin-left: 8px;
            transition: transform 0.3s ease;
        }

        .read-more-link:hover i {
            transform: translateX(4px);
        }

        .section-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--dark);
            position: relative;
            padding-bottom: 10px;
        }

        .section-title::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background: var(--primary);
            border-radius: 3px;
        }

        .post-content {
            font-size: 1.1rem;
            color: var(--dark);
        }

        .post-content p {
            margin-bottom: 1.5em;
        }
    </style>
@endpush

@section('content')
    <div class="container" style="padding-top: 60px; padding-bottom: 60px;">
        <div class="row">
            <div class="col-lg-12">
                <!-- Judul Berita -->
                <div class="section-title-judul-berita" style="text-align: center; margin-bottom: 10px;">
                    <h2>{{ $berita['judul'] }}</h2>
                </div>
                <!-- Meta Berita -->
                <div style="text-align: center; margin-bottom: 30px; font-size: medium; color: var(--gray);">
                    <span><i class="far fa-user"></i> {{ $berita['user']['name'] ?? 'Admin' }}</span>
                    <span style="margin: 0 10px;">|</span>
                    <span><i class="far fa-calendar"></i> {{ \Carbon\Carbon::parse($berita['created_at'])->format('d F Y') }}</span>
                    @if(!empty($berita['kategori']))
                        <span style="margin: 0 10px;">|</span>
                        <span><i class="far fa-folder"></i> {{ $berita['kategori']['nama'] }}</span>
                    @endif
                </div>
                <!-- Gambar Utama -->
                <img src="{{ asset("img/berita/{$berita['gambar']}") }}" alt="{{ $berita['judul'] }}" class="img-fluid"
                    style="width: 100%; max-height: 500px; object-fit: cover; border-radius: var(--border-radius); margin-bottom: 30px; box-shadow: var(--box-shadow);">
                <!-- Isi Berita -->
                <div class="post-content" style="text-align: justify; font-size: medium; margin-bottom: 50px;">
                    {!! nl2br(e($berita['isi'])) !!}
                </div>
            </div>
        </div>

        <!-- Berita Lainnya -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-header" style="margin-bottom: 30px;">
                    <h2 class="section-title">Berita Lainnya</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse($beritaTerkait as $item)
                <div class="col-lg-4 col-md-6 col-12" style="margin-bottom: 30px;">
                    <div class="news-card">
                        <div class="news-image">
                            <a href="{{ route('berita.detail', $item->id) }}">
                                <img src="{{ asset("img/berita/{$item->gambar}") }}" alt="{{ $item->judul }}">
                            </a>
                        </div>
                        <div class="news-content">
                            <div class="news-meta">
                                <span><i class="far fa-calendar"></i> {{ $item->created_at->format('d F Y') }}</span>
                                @if($item->kategori)
                                    <span class="divider" style="margin: 0 8px;">|</span>
                                    <span>{{ $item->kategori->nama }}</span>
                                @endif
                            </div>
                            <a href="{{ route('berita.detail', $item->id) }}"
                                class="news-title">{{ Str::limit($item->judul, 50) }}</a>
                            <p class="news-excerpt">{{ Str::limit(strip_tags($item->isi), 100, '...') }}</p>
                            <div class="news-footer">
                                <a href="{{ route('berita.detail', $item->id) }}" class="read-more-link">Baca Selengkapnya <i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p>Tidak ada berita terkait lainnya.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection