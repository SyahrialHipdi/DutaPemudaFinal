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
                    {{-- <td>{{ $p->user->email }}</td> --}}
                    <td>{{ $p->lomba->nama_lomba }}</td>
                    <td>
                        <span class="badge bg-{{ $p->status == 'proses' ? 'success' : 'secondary' }}">
                            {{ ucfirst($p->status) }}
                        </span>
                    </td>
                    <td>
                        @if ($p->status !== 'proses')
                        <form action="{{ route('verifikator.store', $p->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary">Verifikasi</button>
                        </form>
                        @else
                            <span class="text-success">Sudah diverifikasi</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
