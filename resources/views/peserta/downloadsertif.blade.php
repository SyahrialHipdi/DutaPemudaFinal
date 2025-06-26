{{-- @extends('layouts.app')
@section('title', 'Sertifikat Saya') --}}
@extends('layouts.pendaftar')
@section('title', 'ubah password')
@section('content')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Sertifikat Saya</h2>

    @if ($sertifikats->isEmpty())
        <div class="alert alert-info">
            Anda belum memiliki sertifikat.
        </div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Lomba</th>
                    <th>Nomor Sertifikat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sertifikats as $sertifikat)
                    <tr>
                        <td>{{ $sertifikat->lomba->nama_lomba ?? 'Lomba Tidak Ditemukan' }}</td>
                        <td>{{ $sertifikat->nomor_sertifikat }}</td>
                        <td>
                            <a href="{{ route('peserta.download', $sertifikat->id) }}" class="btn btn-sm btn-primary">
                                Download
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
