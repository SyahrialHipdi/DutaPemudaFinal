@extends('layouts.admin')
@section('title', 'lomba')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Lomba</h1>
                    </div>
                    {{-- <a href="{{ route('admin.lomba.create') }}" class="col-sm-6"> --}}
                    {{-- <button class="btn btn-primary float-right">Tambah Lomba</button> --}}
                    {{-- </a> --}}
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}
                            </div>
                        @endif
                        @if (session('warning'))
                            <div class="alert alert-warning">{{ session('warning') }}</div>
                        @endif
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Ranking</th>
                                            <th>Nama</th>
                                            <th>Nilai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ranking as $index => $peserta)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $peserta['nama'] }}</td>
                                                <td>{{ number_format($peserta['rata_rata'], 2) }}</td> {{-- demi keamanan, jangan tampilkan password asli --}}
                                                <td>
                                                    {{-- <form action="{{ route('sertifikat.generate') }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                        <input type="hidden" name="user_id"
                                                            value="{{ $peserta['peserta_id'] }}">
                                                        <input type="hidden" name="lomba_id"
                                                            value="{{ $lombaaa->lomba_id }}">\
                                                        <button class="btn btn-sm btn-success">Beri Sertifikat</button>
                                                    </form> --}}
                                                    @if ($peserta['has_sertifikat'])
                                                        <span class="badge bg-info">Sudah diberi Sertif</span>
                                                    @else
                                                        <form action="{{ route('sertifikat.generate') }}" method="POST"
                                                            style="display:inline;">
                                                            @csrf
                                                            <input type="hidden" name="user_id"
                                                                value="{{ $peserta['peserta_id'] }}">
                                                            <input type="hidden" name="lomba_id"
                                                                value="{{ $lombaaa->lomba_id }}">
                                                            <button class="btn btn-sm btn-success">Beri Sertifikat</button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>


                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>

@endsection
