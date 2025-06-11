{{-- <h2>Daftar Semua Lomba & Jumlah Pendaftar</h2>

<ul>
    @foreach ($lombas as $lomba)
        <li>
            <strong>{{ $lomba->nama_lomba }} ({{ $lomba->tahun }})</strong> -
            {{ $lomba->users_count }} pendaftar
            | <a href="{{ route('admin.lomba_pendaftar.show', $lomba->id) }}">Lihat Detail</a>
        </li>
    @endforeach
</ul> --}}


@extends('layouts.admin')
@section('title', 'lomba')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Lomba</h1>
                    </div>
                    <a href="{{ route('admin.lomba.create') }}" class="col-sm-6">
                        <button class="btn btn-primary float-right">Tambah Lomba</button>
                    </a>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama Lomba</th>
                                            <th>Tahun</th>
                                            <th>Total Peserta</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lombas as $lomba)
                                            <tr>
                                                <td>{{ $lomba->nama_lomba }}</td>
                                                <td>{{ $lomba->tahun }}</td>
                                                <td>{{ $lomba->users_count }}</td> {{-- demi keamanan, jangan tampilkan password asli --}}
                                                <td>
                                                    <a href="{{ route('admin.lomba_pendaftar.show', $lomba->id) }}">
                                                        <button class="btn btn-sm btn-info">Lihat Detail</button>
                                                    </a>
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
