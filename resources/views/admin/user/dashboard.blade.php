@extends('layouts.admin')
@section('title', 'Admin Dashboard')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Manajemen User & Admin</h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.user.create') }}">
                                        <button class="btn btn-primary btn-sm">
                                            <i class="fa fa-plus"></i> Tambah User/Admin
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="userTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Email/Username</th>
                                            <th>Role</th>
                                            <th style="width: 15%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->email }}</td>
                                                <td><span
                                                        class="badge {{ $user->role == 'admin' ? 'badge-success' : 'badge-secondary' }}">{{ ucfirst($user->role) }}</span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.user.edit', $user->id) }}"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('admin.user.destroy', $user->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Yakin ingin menghapus user ini?')">
                                                            <i class="fa fa-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    {{-- Tambahkan script khusus untuk halaman ini jika diperlukan --}}
    <script>
        $(document).ready(function() {
            // Inisialisasi DataTable untuk tabel user
            $('#userTable').DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "ordering": true,
                "info": true,
            });
        });
    </script>
@endpush
