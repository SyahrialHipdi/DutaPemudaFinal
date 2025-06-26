@extends('layouts.app')
@section('title', 'Verifikasi Peserta')

@section('content')
    <div class="container mt-4">
        <h3>Daftar Peserta</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Lomba</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peserta as $p)
                    <tr>
                        <td>{{ $p->user->email }}</td>
                        <td>{{ $p->lomba->nama_lomba }}</td>
                        <td>
                            <span class="badge bg-{{ $p->status == 'proses' ? 'success' : 'secondary' }}">
                                {{ ucfirst($p->status) }}
                            </span>
                        </td>
                        {{-- <td>
                                <form action="{{ route('verifikator.store', $p->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary">Verifikasi</button>
                                </form>
                                <form action="{{ route('verifikator.tolak', $p->id) }}" method="POST">
                                    @csrf
                                    <textarea name="alasan" class="form-control" placeholder="Alasan penolakan..." required></textarea>
                                    <button type="submit" class="btn btn-sm btn-danger mt-2">Tolak</button>
                                </form>         
                        </td> --}}
                        <td>
                            <div class="d-flex gap-2 align-items-start">
                                {{-- Tombol Verifikasi --}}
                                <form action="{{ route('verifikator.store', $p->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary">Verifikasi</button>
                                </form>

                                {{-- Tombol Tolak + Alasan Penolakan --}}
                                <div>
                                    <button type="button" class="btn btn-sm btn-danger"
                                        onclick="toggleAlasan('{{ $p->id }}')">Tolak</button>

                                    <form id="form-alasan-{{ $p->id }}"
                                        action="{{ route('verifikator.tolak', $p->id) }}" method="POST"
                                        class="mt-2 d-none">
                                        @csrf
                                        <textarea name="alasan" class="form-control mb-1" rows="2" placeholder="Alasan penolakan..." required></textarea>
                                        <button type="submit" class="btn btn-sm btn-danger">Kirim Penolakan</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @push('scripts')
<script>
    function toggleAlasan(id) {
        const form = document.getElementById('form-alasan-' + id);
        form.classList.toggle('d-none');
    }
</script>

    @endpush
@endsection
