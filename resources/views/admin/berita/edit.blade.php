@extends('layouts.admin')
@section('title', 'Edit Berita')

@push('styles')
    {{-- Tambahkan CSS Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap4-theme@1.0.0/dist/select2-bootstrap4.min.css">
@endpush

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Berita</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Berita</h3>
                    </div>
                    <form action="{{ route('admin.berita.update', $berita['id']) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="judul">Judul Berita</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                                    name="judul" value="{{ old('judul', $berita['judul']) }}" required>
                                @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group">
                                <label for="kategori_id">Kategori</label>
                                <select class="form-control select2-tags @error('kategori_id') is-invalid @enderror"
                                    id="kategori_id" name="kategori_id" required>
                                    @foreach($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}" {{ old('kategori_id', $berita['kategori_id']) == $kategori->id ? 'selected' : '' }}>
                                            {{ $kategori->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Pilih kategori yang sudah ada atau ketik nama kategori
                                    baru.</small>
                                @error('kategori_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group">
                                <label for="isi">Isi Berita</label>
                                <textarea class="form-control @error('isi') is-invalid @enderror" id="isi" name="isi"
                                    rows="10" required>{{ old('isi', $berita['isi']) }}</textarea>
                                @error('isi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group">
                                <label for="gambar">Gambar Berita</label>
                                <input type="file" class="form-control-file @error('gambar') is-invalid @enderror"
                                    id="gambar" name="gambar">
                                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                                @if(!empty($berita['gambar']))
                                    <img src="{{ asset("img/berita/{$berita['gambar']}") }}" alt="Gambar saat ini"
                                        class="img-thumbnail mt-2" width="200">
                                @endif
                                @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Berita</button>
                            <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    {{-- Tambahkan JS Select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.select2-tags').select2({
                theme: 'bootstrap4',
                tags: true, // Izinkan pembuatan tag baru
                tokenSeparators: [',']
            });
        });
    </script>
@endpush