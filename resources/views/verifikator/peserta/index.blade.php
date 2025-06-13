@extends('layouts.verifikator')
@section('title', 'Daftar Peserta')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manajemen Peserta</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Seluruh Peserta</h3>
                    </div>
                    <div class="card-body">
                        <table id="pesertaTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Tgl. Daftar</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peserta as $p)
                                    <tr>
                                        <td>{{ $p->id }}</td>
                                        <td>{{ $p->data_isian['nama_lengkap'] ?? $p->name }}</td>
                                        <td>{{ $p->email }}</td>
                                        <td>{{ $p->created_at->format('d M Y') }}</td>
                                        <td>
                                            @if ($p->status == 'verified')
                                                <span class="badge badge-success">Terverifikasi</span>
                                            @elseif($p->status == 'rejected')
                                                <span class="badge badge-danger">Ditolak</span>
                                            @else
                                                <span class="badge badge-warning">Menunggu</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('verifikator.peserta.show', $p->id) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i> Detail & Aksi
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    {{-- Script untuk inisialisasi DataTables --}}
    <script>
        $(function() {
            $("#pesertaTable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#pesertaTable_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
