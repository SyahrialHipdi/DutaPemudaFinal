@extends('layouts.admin')
@section('title', 'Edit Berita')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Berita</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.berita.index') }}">Manajemen Berita</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Berita</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card card-outline card-primary">
                    {{-- Pastikan route dan method sudah benar --}}
                    <form method="POST" action="{{ route('admin.berita.update', $berita->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            {{-- Menampilkan error validasi --}}
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

                            {{-- HANYA ADA SATU BLOK FORM --}}
                            <div class="form-group">
                                <label for="judul">Judul Berita</label>
                                {{-- Gunakan old() dengan data asli sebagai fallback --}}
                                <input type="text" class="form-control" id="judul" name="judul"
                                    value="{{ old('judul', $berita->judul) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="isi">Isi Berita</label>
                                <textarea id="isi" name="isi" class="form-control" rows="8"
                                    required>{{ old('isi', $berita->isi) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="gambar">Ganti Gambar Sampul (Opsional)</label>
                                <input type="file" class="form-control-file" id="gambar" name="gambar">
                                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                                {{-- Tampilkan gambar yang ada saat ini --}}
                                @if($berita->gambar)
                                    <div class="mt-2">
                                        <p>Gambar saat ini:</p>
                                        <img src="{{ asset('img/berita/' . $berita->gambar) }}" alt="Gambar saat ini"
                                            class="img-thumbnail" width="200">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Update
                                Berita</button>
                            <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection