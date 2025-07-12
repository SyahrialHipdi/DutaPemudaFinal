@extends('layouts.admin')
@section('title', 'lomba')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Peserta</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <section class="content">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-8">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example" class="table table-bordered">
                                    <tr>
                                        <th>NIK</th>
                                        <td>{{ $peserta->nik }}</td>
                                    </tr>
                                    <tr>
                                        <th>nama</th>
                                        <td>{{ $peserta->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $peserta->user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Lahir</th>
                                        <td>{{ $peserta->lahir }}</td>
                                    </tr>
                                    <tr>
                                        <th>Provinsi</th>
                                        <td>{{ $peserta->provinsi }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kota</th>
                                        <td>{{ $peserta->kota }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kecamatan</th>
                                        <td>{{ $peserta->kecamatan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Desa</th>
                                        <td>{{ $peserta->desa }}</td>
                                    </tr>
                                    <tr>
                                        <th>RT/RW</th>
                                        <td>{{ $peserta->rt_rw }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $peserta->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kode pos</th>
                                        <td>{{ $peserta->kodepos }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kode pos</th>
                                        <td>{{ $peserta->kodepos }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kode pos</th>
                                        <td>{{ $peserta->peserta->id }}</td>
                                    </tr>

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
