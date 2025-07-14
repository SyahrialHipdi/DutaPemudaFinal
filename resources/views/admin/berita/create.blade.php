@extends('layouts.admin')
@section('title', 'Tambah Berita Baru')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Berita</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.berita.index') }}">Manajemen Berita</a></li>
                            <li class="breadcrumb-item active">Tambah Berita</li>
                        </ol>
                    </div>
                </div>
            </div></section>

        <section class="content">
            <div class="container-fluid">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Formulir Tambah Berita</h3>
                    </div>
                    <form method="POST" action="{{ route('admin.berita.store') }}" enctype="multipart/form-data">
                        <div class="card-body">

                            {{-- ========================================================== --}}
                            {{-- Kode dari form.blade.php yang disatukan dimulai di sini --}}
                            {{-- ========================================================== --}}

                            @csrf

                            {{-- Menampilkan error validasi jika ada --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <h5 class="font-weight-bold">Terjadi Kesalahan:</h5>
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="judul">Judul Berita</label>
                                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}" placeholder="Masukkan judul berita" required>
                            </div>

                            <div class="form-group">
                                <label for="isi">Isi Berita</label>
                                <textarea id="isi" name="isi" class="form-control" rows="8" placeholder="Tulis isi berita di sini..." required>{{ old('isi') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="gambar">Gambar Sampul</label>
                                <input type="file" class="form-control-file" id="gambar" name="gambar" required>
                                <small class="form-text text-muted">Format: JPG, JPEG, PNG, WEBP. Maks 2MB.</small>
                            </div>
                            
                            {{-- ========================================================== --}}
                            {{-- Kode dari form.blade.php berakhir di sini --}}
                            {{-- ========================================================== --}}

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Simpan Berita</button>
                            <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        </div>
@endsection