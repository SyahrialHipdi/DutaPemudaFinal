@extends('layouts.verifikator')
@section('title', 'Verifikasi Peserta')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Daftar Peserta</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('verifikator.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Verifikasi Peserta</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Data Pendaftar Lomba</h3>
                    </div>
                    <div class="card-body">
                        <table id="pesertaTable" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Peserta</th>
                                    <th>Lomba yang Diikuti</th>
                                    <th class="text-center">Status Berkas</th>
                                    <th class="text-center" style="width: 20%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($peserta as $p)
                                    <tr>
                                        <td>
                                            {{-- Pastikan model User memiliki cast 'data_isian' => 'array' --}}
                                            <strong>{{ $p->user->data_isian['nama_lengkap'] ?? $p->user->name }}</strong><br>
                                            <small class="text-muted">{{ $p->user->email }}</small>
                                        </td>
                                        <td>{{ $p->lomba->nama_lomba }}</td>
                                        <td class="text-center">
                                            @if ($p->status == 'proses')
                                                <span class="badge badge-success">Terverifikasi</span>
                                            @elseif($p->status == 'ditolak')
                                                <span class="badge badge-danger">Ditolak</span>
                                                <small class="d-block mt-1">Alasan:
                                                    {{ $p->alasan ?? 'N/A' }}</small>
                                            @else
                                                <span class="badge badge-warning">Menunggu Verifikasi</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            {{-- Tampilkan aksi hanya jika status masih menunggu --}}
                                            @if ($p->status != 'proses' && $p->status != 'ditolak')
                                                <div class="btn-group" role="group">
                                                    {{-- Tombol Detail --}}
                                                    {{-- <a href="#" class="btn btn-sm btn-info">
                                                        <i class="fas fa-eye"></i> Detail
                                                    </a> --}}

                                                    {{-- Tombol Verifikasi (Diterima) --}}
                                                    <form action="{{ route('verifikator.store', $p->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="status" value="diterima">
                                                        <button type="submit"
                                                            class="btn btn-sm btn-primary mr-2">Verifikasi</button>
                                                    </form>

                                                    {{-- Tombol Tolak (Membuka Modal) --}}
                                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#modalTolak" data-id="{{ $p->id }}"
                                                        data-nama="{{ $p->user->data_isian['nama_lengkap'] ?? $p->user->name }}">
                                                        Tolak
                                                    </button>
                                                </div>
                                            @else
                                                <span class="text-muted">Tindakan Selesai</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada data peserta untuk diverifikasi.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal Penolakan -->
    <div class="modal fade" id="modalTolak" tabindex="-1" role="dialog" aria-labelledby="modalTolakLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTolakLabel">Alasan Penolakan Peserta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formTolak" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" name="status" value="ditolak">

                        <textarea name="alasan" id="alasan" class="form-control" rows="3" required
                            placeholder="Tulis alasan penolakan..."></textarea>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Kirim Penolakan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    {{-- Script untuk mengaktifkan DataTables --}}
    <script>
        $(function() {
            $("#pesertaTable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#pesertaTable_wrapper .col-md-6:eq(0)');
        });
    </script>

    {{-- Script untuk Modal Penolakan --}}
    <script>
        $('#modalTolak').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var pesertaId = button.data('id');
            var namaPeserta = button.data('nama');

            // Ini ambil base route dari Blade (tanpa ID)
            var baseUrl = @json(route('verifikator.tolak', ['id' => 'PESERTA_ID']));

            // Ganti 'PESERTA_ID' dengan ID peserta sesungguhnya
            var actionUrl = baseUrl.replace('PESERTA_ID', pesertaId);

            var modal = $(this);
            modal.find('#formTolak').attr('action', actionUrl);
            modal.find('#modalTolakLabel').text('Alasan Penolakan untuk ' + namaPeserta);
            modal.find('#alasan').val('');
        });
    </script>
@endpush
