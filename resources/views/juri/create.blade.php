@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah User Baru</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- <form action="{{ route('juri.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Nilai</label>
            <input type="text" name="nilai" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form> --}}

    <form action="{{ route('juri.store',[$lomba->id, $peserta->id]) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nilai" class="form-label">Nilai (0–100)</label>
            <input type="number" name="nilai" id="nilai" class="form-control" required min="0" max="100" value="{{ old('nilai') }}">
        </div>

        <div class="mb-3">
            <label for="komentar" class="form-label">Komentar (opsional)</label>
            <textarea name="komentar" id="komentar" class="form-control" rows="3">{{ old('komentar') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan Penilaian</button>
        <a href="{{ route('juri.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

@endsection
