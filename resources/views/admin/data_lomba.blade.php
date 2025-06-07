@extends('layouts.admin')
@section('title', 'Dashboard admin')
@section('content')

    <!-- [ Main Content ] start -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.tambah_lomba') }}" class="btn btn-primary">
    Tambah Lomba
</a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Tahun</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
    @foreach ($lombas as $lomba)
        <tr>
            <td>{{ $lomba->nama_lomba }}</td>
            <td>{{ $lomba->tahun }}</td>
            <td>{{$lomba->deskripsi}}</td> {{-- demi keamanan, jangan tampilkan password asli --}}
            <td> <a href="{{ route('admin.show_lomba', $lomba->id) }}" class="btn btn-sm btn-primary">Lihat Detail</a></td>
            <td>
                {{-- <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-sm btn-warning">Edit</a> --}}
                {{-- <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" style="display:inline;"> --}}
                    {{-- @csrf --}}
                    {{-- @method('DELETE') --}}
                    {{-- <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button> --}}
                {{-- </form> --}}
            </td>
        </tr>
    @endforeach
</tbody>
                               
                                <tfoot>
                                    <tr>
                                        <th>Rendering engine</th>
                                        <th>Browser</th>
                                        <th>Platform(s)</th>
                                        <th>Engine version</th>
                                        <th>CSS grade</th>

                                    </tr>
                                </tfoot>
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

@endsection
