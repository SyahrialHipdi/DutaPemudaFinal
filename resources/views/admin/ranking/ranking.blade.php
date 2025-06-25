@extends('layouts.admin')
@section('title', 'lomba')
@section('content')
<h3>Ranking Peserta</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <!-- <th>Ranking</th> -->
            <th>Nama Peserta</th>
            <th>Rata-rata Nilai</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ranking as $index => $peserta)
        <tr>
            <!-- <td>{{ $index + 1 }}</td> -->
            <td>{{ $peserta['nama'] }}</td>
            <td>{{ number_format($peserta['rata_rata'], 2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
