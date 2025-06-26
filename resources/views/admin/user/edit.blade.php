@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2>Edit User</h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" required
                                            value="{{ old('email', $user->email) }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>Password (Kosongkan jika tidak ingin diubah)</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>Role</label>
                                        <select name="role" id="role" class="form-control" required onchange="toggleLombaSelect()">
                                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="juri" {{ $user->role === 'juri' ? 'selected' : '' }}>Juri</option>
                                            <option value="verifikator" {{ $user->role === 'verifikator' ? 'selected' : '' }}>Verifikator</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3 {{ $user->role === 'juri' ? '' : 'd-none' }}" id="lombaSelect">
                                        <label>Pilih Lomba (untuk Juri)</label>
                                        <select name="lomba_id[]" class="form-control" multiple>
                                            @foreach ($lombas as $lomba)
                                                <option value="{{ $lomba->id }}"
                                                    {{ in_array($lomba->id, $user->lombaDijuri->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                    {{ $lomba->nama_lomba }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script>
            function toggleLombaSelect() {
                const role = document.getElementById('role').value;
                const lombaSelect = document.getElementById('lombaSelect');

                if (role === 'juri') {
                    lombaSelect.classList.remove('d-none');
                } else {
                    lombaSelect.classList.add('d-none');
                }
            }

            // Panggil sekali saat halaman dimuat untuk set awal
            document.addEventListener("DOMContentLoaded", toggleLombaSelect);
        </script>
    </div>
@endsection
