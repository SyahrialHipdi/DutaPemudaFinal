@extends('layouts.verifikator')
@section('title', 'Detail Peserta')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail & Verifikasi Peserta</h1>
                    </div>
                    <div class="col-sm-9">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $errors->first() }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('img/user.png') }}"
                                        alt="Foto profil">
                                </div>
                                <h3 class="profile-username text-center">
                                    {{ $user->data_isian['nama_lengkap'] ?? $user->name }}</h3>
                                <p class="text-muted text-center">{{ $user->email }}</p>

                                <div class="mt-3 text-center">
                                    @if ($user->status == 'verified')
                                        <span class="badge badge-success p-2">SUDAH DIVERIFIKASI</span>
                                    @elseif($user->status == 'rejected')
                                        <span class="badge badge-danger p-2">DITOLAK</span>
                                    @else
                                        <span class="badge badge-warning p-2">MENUNGGU VERIFIKASI</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Aksi</h3>
                            </div>
                            <div class="card-body">
                                @if ($user->status == 'menunggu')
                                    <form action="{{ route('verifikator.peserta.verify', $user->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-block"
                                            onclick="return confirm('Apakah Anda yakin ingin memverifikasi peserta ini?')">
                                            <i class="fas fa-check"></i> Verifikasi Peserta
                                        </button>
                                    </form>
                                    <button type="button" class="btn btn-danger btn-block mt-2" data-toggle="modal"
                                        data-target="#rejectModal">
                                        <i class="fas fa-times"></i> Tolak Peserta
                                    </button>
                                @else
                                    <p class="text-muted">Tindakan tidak tersedia karena peserta ini sudah diproses.</p>
                                    @if ($user->status == 'rejected')
                                        <strong>Alasan Penolakan:</strong>
                                        <p class="text-danger">{{ $user->alasan_penolakan }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Detail Pendaftaran</h3>
                            </div>
                            <div class="card-body">
                                <dl class="row">
                                    @foreach ($user->data_isian as $key => $value)
                                        <dt class="col-sm-4">{{ ucfirst(str_replace('_', ' ', $key)) }}</dt>
                                        <dd class="col-sm-8">
                                            @php
                                                $file_keywords = [
                                                    'foto',
                                                    'ktp',
                                                    'berkas',
                                                    'surat',
                                                    'ijazah',
                                                    'sertifikat',
                                                ];
                                                $is_file = false;
                                                foreach ($file_keywords as $keyword) {
                                                    if (str_contains(strtolower($key), $keyword)) {
                                                        $is_file = true;
                                                        break;
                                                    }
                                                }
                                            @endphp

                                            @if ($is_file && !empty($value))
                                                <a href="{{ asset('storage/' . $value) }}" target="_blank">Lihat File <i
                                                        class="fas fa-external-link-alt"></i></a>
                                            @else
                                                {{ $value }}
                                            @endif
                                        </dd>
                                    @endforeach
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalLabel">Tolak Peserta:
                        {{ $user->data_isian['nama_lengkap'] ?? $user->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('verifikator.peserta.reject', $user->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="alasan_penolakan">Alasan Penolakan</label>
                            <textarea name="alasan_penolakan" id="alasan_penolakan" class="form-control" rows="4" required
                                placeholder="Jelaskan alasan mengapa pendaftaran peserta ini ditolak."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Kirim Penolakan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
