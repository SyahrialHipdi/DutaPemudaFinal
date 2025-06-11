@extends('layouts.admin')
@section('title', 'Dashboard admin')
@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Lomba</h1>
                    </div>
                    <a href="{{ route('admin/create') }}" class="col-sm-6">
                        <button class="btn btn-primary float-right">Tambah Lomba</button>
                    </a>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- [ Main Content ] start -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Role</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $admin)
                                            <tr>
                                                <td>{{ $admin->name }}</td>
                                                <td>{{ $admin->username }}</td>
                                                <td>{{ $admin->password }}</td> {{-- demi keamanan, jangan tampilkan password asli --}}
                                                <td>{{ $admin->role }}</td>
                                                <td>
                                                    {{-- <a href="{{ route('admin.edit', $admin->id) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('admin.destroy', $admin->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                                </form> --}}
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
