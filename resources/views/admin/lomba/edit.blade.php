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
                        <h1>Edit Lomba</h1>
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


                                <form method="POST" action="{{ route('admin.lomba.update', $lomba->id) }}">
                                    @method('PUT')
                                    @include('admin.lomba.form')
                                </form>
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
