@extends('layouts.admin')
@section('title', 'lomba')
@section('content')

    {{-- <h1>Kelola Lomba</h1>

    <a href="{{ route('admin.lomba.create') }}">+ Tambah Lomba</a>

    @if (session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10">
        <tr>
            <th>Nama</th>
            <th>Tahun</th>
            <th>Deskripsi</th>
            <th>Syarat</th>
        </tr>
        @foreach ($lombas as $lomba)
            <tr>
                <td>{{ $lomba->nama_lomba }}</td>
                <td>{{ $lomba->tahun }}</td>
                <td>
                    <a href="{{ route('admin.lomba.edit', $lomba->id) }}">Edit</a>
                    <form action="{{ route('admin.lomba.destroy', $lomba->id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table> --}}
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
                                            <th>Nama</th>
                                            <th>Tahun</th>
                                            <th>Deskripsi</th>
                                            <th>Syarat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lombas as $lomba)
                                            <tr>
                                                <td>{{ $lomba->nama_lomba }}</td>
                                                <td>{{ $lomba->tahun }}</td>
                                                <td>{{ $lomba->deskripsi }}</td> {{-- demi keamanan, jangan tampilkan password asli --}}
                                                <td>
                                                    @php
                                                        $syarat = old('syarat_lomba', $lomba->syarat_lomba ?? []);
                                                    @endphp
                                                    @foreach ($syarat as $s)
                                                        <div class="syarat-item">
                                                            <ull>
                                                                <li>{{ $s }}</li>
                                                            </ull>
                                                        </div>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.lomba.edit', $lomba->id) }}"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="fa fa-pencil mr-2"></i>Edit</a>
                                                    <form action="{{ route('admin.lomba.destroy', $lomba->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Yakin ingin menghapus?')"><i
                                                                class="fa fa-trash mr-2"></i>Hapus</button>
                                                    </form>
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
