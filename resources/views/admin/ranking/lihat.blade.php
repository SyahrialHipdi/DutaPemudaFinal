@extends('layouts.app')
@section('title', 'Ranking Peserta')

@section('content')
<div class="container mt-4">
    <h2>Ranking Peserta - {{ $lomba->nama_lomba }} ({{ $lomba->tahun }})</h2>
dd($lomba)
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Ranking</th>
                <th>Nama Peserta</th>
                <th>Rata-rata Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ranking as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item['nama'] }}</td>
                    <td>{{ $item['rata_rata'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.ranking.daftar-lomba') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Lomba</a>
</div>
@endsection
