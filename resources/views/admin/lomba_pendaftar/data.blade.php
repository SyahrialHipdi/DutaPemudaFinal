@extends('layouts.admin')
@section('title', 'lomba')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Peserta</h1>
                    </div>

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
                                            <th>NIK</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>Lomba</th>
                                            <th>Bidang</th>
                                            <th>Status</th>
                                            <th>Alasan (Jika ditolak)</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $d)
                                            <tr>
                                                <td>{{ $d->peserta->nik }}</td>
                                                <td>{{ $d->peserta->nama }}</td>
                                                <td>{{ $d->user->email }}</td>
                                                <td>{{ $d->lomba->nama_lomba }}</td>
                                                <td>{{ $d->bidang }}</td>
                                                <td>{{ $d->status }}</td>
                                                <td>{{ $d->alasan }}</td>
                                                <td>
                                                    <a href="{{ route('admin.lomba_pendaftar.edit', $d->id) }}">
                                                        <button class="btn btn-sm btn-info">Lihat Detail/Edit</button>
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
