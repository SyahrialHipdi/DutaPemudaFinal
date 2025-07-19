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
                                            {{-- <th>ID</th> --}}
                                            <th>Nama</th>
                                            <th>Lomba</th>
                                            <th>Status</th>
                                            <th>Alasan</th>
                                            <th>Bidang</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            {{-- <td>{{ $peserta->id }}</td> --}}
                                            <td>{{ $details->peserta->nama }}</td>
                                            <td>{{ $details->lomba->nama_lomba }}</td>
                                            <td>{{ $details->status }}</td>
                                            <td>{{ $details->alasan }}</td>
                                            <td>{{ $details->bidang }}</td>
                                            {{-- <td>{{ $details->user->email }}</td> --}}
                                            <td>
                                                <a href="{{ route('admin.lomba_pendaftar.edit', $details->id) }}">
                                                    <button class="btn btn-sm btn-info">Lihat Detail</button>
                                                </a>
                                            </td>
                                        </tr>
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
