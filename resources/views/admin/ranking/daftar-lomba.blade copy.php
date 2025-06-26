@extends('layouts.app')
@section('title', 'Daftar Lomba')

@section('content')
<div class="container mt-4">
    <h2>Daftar Lomba</h2>
    <ul class="list-group">
        @foreach ($lombas as $lomba)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $lomba->nama_lomba }}</strong> ({{ $lomba->tahun }})
                </div>
                <a href="{{ route('admin.ranking.lihat', $lomba->id) }}" class="btn btn-sm btn-primary">Lihat Ranking</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
