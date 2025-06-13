@extends('layouts.verifikator')
@section('title', 'Dashboard Verifikator')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard Verifikator</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $stats['total'] }}</h3>
                                <p>Total Peserta</p>
                            </div>
                            <div class="icon"><i class="fas fa-users"></i></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $stats['menunggu'] }}</h3>
                                <p>Menunggu Verifikasi</p>
                            </div>
                            <div class="icon"><i class="fas fa-clock"></i></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $stats['diverifikasi'] }}</h3>
                                <p>Telah Diverifikasi</p>
                            </div>
                            <div class="icon"><i class="fas fa-user-check"></i></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $stats['ditolak'] }}</h3>
                                <p>Ditolak</p>
                            </div>
                            <div class="icon"><i class="fas fa-user-times"></i></div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">5 Pendaftar Terbaru yang Perlu Diverifikasi</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tanggal Daftar</th>
                                    <th style="width: 150px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($peserta_terbaru as $peserta)
                                    <tr>
                                        <td>{{ $peserta->data_isian['nama_lengkap'] ?? $peserta->name }}</td>
                                        <td>{{ $peserta->email }}</td>
                                        <td>{{ $peserta->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('verifikator.peserta.show', $peserta->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-search"></i> Detail
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada peserta yang perlu diverifikasi
                                            saat ini.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('verifikator.peserta.index') }}">Lihat Semua Peserta</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
