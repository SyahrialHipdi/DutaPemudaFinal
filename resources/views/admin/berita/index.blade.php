@extends('layouts.admin')
@section('title', 'berita')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data berita</h1>
                    </div>
                    <a href="{{ route('admin.berita.create') }}" class="col-sm-6">
                        <button class="btn btn-primary float-right">Tambah berita</button>
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
                                            <th>Judul</th>
                                            <th>Pembuat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($beritas as $berita)
                                            <tr>
                                                <td>{{ $berita->judul }}</td>
                                                <td>{{ $berita->user_id }}</td>
                                                <td>
                                                    <a href="{{ route('admin.berita.edit', $berita->id) }}"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="fas fa-edit mr-2"></i>Edit</a>
                                                    <form action="{{ route('admin.berita.destroy', $berita->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Yakin ingin menghapus?')"><i
                                                                class="fas fa-trash mr-2"></i>Hapus</button>
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