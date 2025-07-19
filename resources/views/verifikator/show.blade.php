@extends('layouts.verifikator')
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
                                        <td>{{ $detail->peserta->nik }}</td>
                                    </tr>
                                    <tr>
                                        <th>nama</th>
                                        <td>{{ $detail->peserta->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $detail->user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Lahir</th>
                                        <td>{{ $detail->peserta->lahir }}</td>
                                    </tr>
                                    <tr>
                                        <th>Provinsi</th>
                                        <td>{{ $detail->peserta->provinsi }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kota</th>
                                        <td>{{ $detail->peserta->kota }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kecamatan</th>
                                        <td>{{ $detail->peserta->kecamatan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Desa</th>
                                        <td>{{ $detail->peserta->desa }}</td>
                                    </tr>
                                    <tr>
                                        <th>RT/RW</th>
                                        <td>{{ $detail->peserta->rt_rw }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $detail->peserta->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Bidang</th>
                                        <td>{{ $detail->bidang }}</td>
                                    </tr>
                                    <tr>
                                        <th>Proposal</th>
                                        <td>{{ $detail->proposal }}</td>
                                    </tr>


                                </table>
                                <button type="button"
                                    class="btn btn-s
                                                    m btn-success mr-2"
                                    data-toggle="modal" data-target="#modalTerima" data-id="{{ $detail->id }}"
                                    data-nama="{{ $detail->user->data_isian['nama_lengkap'] ?? $detail->user->name }}">
                                    Verifikasi
                                </button>

                                {{-- Tombol Tolak (Membuka Modal) --}}
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#modalTolak" data-id="{{ $detail->id }}"
                                    data-nama="{{ $detail->user->data_isian['nama_lengkap'] ?? $detail->user->name }}">
                                    Tolak
                                </button>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>

        {{-- modal terima --}}
        <div class="modal fade" id="modalTerima" tabindex="-1" role="dialog" aria-labelledby="modalTerimaLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTerimaLabel">Konfirmasi Disetujui</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formTerima" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="proses">
                        <div class="modal-body">
                            <p>Apakah kamu yakin ingin memverifikasi peserta ini?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Setujui</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                    </form>

                </div>
            </div>
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
                {{-- Tombol Verifikasi (Diterima) --}}

            </div>
        </div>
    </div>

    @push('scripts')
        {{-- modal terima --}}
        <script>
            $('#modalTerima').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var pesertaId = button.data('id');
                var namaPeserta = button.data('nama');

                var baseUrl = @json(route('verifikator.terima', ['id' => 'PESERTA_ID']));
                var actionUrl = baseUrl.replace('PESERTA_ID', pesertaId);

                var modal = $(this);
                modal.find('#formTerima').attr('action', actionUrl);
                modal.find('#modalTerimaLabel').text('Verifikasi Peserta: ' + namaPeserta);
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

@endsection
