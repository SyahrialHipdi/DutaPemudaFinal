@extends('layouts.admin')
@section('title', 'Edit Peserta Lomba')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <h1>Edit Data Peserta Lomba</h1>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <form method="POST" action="{{ route('admin.lomba_pendaftar.update_data_detail', $details->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">

                            {{-- =========================== --}}
                            {{-- SECTION 1: DATA USER --}}
                            {{-- =========================== --}}
                            <h3 class="mb-3"><strong>Data User</strong></h3>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" value="{{ $details->user->email ?? '-' }}"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <input type="text" class="form-control" value="{{ $details->user->role ?? '-' }}"
                                    disabled>
                            </div>

                            <hr>

                            {{-- =========================== --}}
                            {{-- SECTION 2: DATA PESERTA --}}
                            {{-- =========================== --}}
                            <h3 class="mb-3"><strong>Data Peserta</strong></h3>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" value="{{ $details->peserta->nama ?? '-' }}"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" class="form-control" value="{{ $details->peserta->nik ?? '-' }}"
                                    disabled>
                            </div>

                            <hr>

                            {{-- =========================== --}}
                            {{-- SECTION 3: DATA LOMBA --}}
                            {{-- =========================== --}}
                            <h3 class="mb-3"><strong>Data Lomba</strong></h3>
                            <div class="form-group">
                                <label>Nama Lomba</label>
                                <input type="text" class="form-control" value="{{ $details->lomba->nama_lomba ?? '-' }}"
                                    disabled>
                            </div>

                            <hr>

                            {{-- =========================== --}}
                            {{-- SECTION 4: DATA PENDAFTARAN (lomba_peserta) --}}
                            {{-- =========================== --}}
                            <h3 class="mb-3"><strong>Data Pendaftaran</strong></h3>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="pending" {{ $details->status == 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="ditolak" {{ $details->status == 'ditolak' ? 'selected' : '' }}>Ditolak
                                    </option>
                                    <option value="proses" {{ $details->status == 'proses' ? 'selected' : '' }}>Proses
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Alasan</label>
                                <textarea class="form-control" name="alasan">{{ $details->alasan }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Bidang</label>
                                <input type="text" class="form-control" name="bidang" value="{{ $details->bidang }}">
                            </div>

                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="{{ route('admin.lomba_pendaftar.data_detail', $details->id) }}"
                                    class="btn btn-secondary">Kembali</a>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

@endsection
