@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah User Baru</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.user.store') }}" method="POST">
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
            <label>Role</label>
            <select name="role" id="role" class="form-control" required onchange="toggleLombaSelect()">
                <option value="">-- Pilih Role --</option>
                <option value="admin">Admin</option>
                <option value="juri">Juri</option>
                <option value="verifikator">Verifikator</option>
                <option value="peserta">Peserta</option>
            </select>
        </div>

        <div class="form-group mb-3 d-none" id="lombaSelect">
            <label>Pilih Lomba</label>
            <select name="lomba_id[]" class="form-control" multiple>
                @foreach($lombas as $lomba)
                    <option value="{{ $lomba->id }}">{{ $lomba->nama_lomba }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
    function toggleLombaSelect() {
        const role = document.getElementById('role').value;
        const lombaSelect = document.getElementById('lombaSelect');

        if (role === 'juri' || role === 'peserta') {
            lombaSelect.classList.remove('d-none');
        } else {
            lombaSelect.classList.add('d-none');
        }
    }
</script>
@endsection
