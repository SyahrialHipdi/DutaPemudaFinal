@extends('layouts.admin')
@section('title', 'lomba')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Lomba</h1>
                    </div>
                    {{-- <a href="{{ route('admin.lomba.create') }}" class="col-sm-6"> --}}
                    {{-- <button class="btn btn-primary float-right">Tambah Lomba</button> --}}
                    {{-- </a> --}}
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}
                            </div>
                        @endif
                        @if (session('warning'))
                            <div class="alert alert-warning">{{ session('warning') }}</div>
                        @endif
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Ranking</th>
                                            <th>Nama</th>
                                            <th>Nilai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ranking as $index => $peserta)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $peserta['nama'] }}</td>
                                                <td>{{ number_format($peserta['rata_rata'], 2) }}</td> {{-- demi keamanan, jangan tampilkan password asli --}}
                                                <td>
                                                    
                                                    @if ($peserta['has_sertifikat'])
                                                        <span class="badge bg-info">Sudah diberi Sertif</span>
                                                    @else
                                                        {{-- <form action="{{ route('sertifikat.generate') }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                        <input type="hidden" name="user_id"
                                                            value="{{ $peserta['peserta_id'] }}">
                                                        <input type="hidden" name="lomba_id"
                                                            value="{{ $lombaaa->lomba_id }}">
                                                        <button class="btn btn-sm btn-success">Beri Sertifikat</button>
                                                    </form> --}}
                                                    <!-- Tombol memicu modal -->
                                                    <button type="button" class="btn btn-sm btn-success"
                                                        data-toggle="modal"
                                                        data-target="#modalBeri"
                                                        data-user="{{ $peserta['peserta_id'] }}"
                                                        data-lomba="{{ $lombaaa->lomba_id }}"
                                                        data-nama="{{ $peserta['nama'] }}">
                                                        Beri Sertifikat
                                                    </button>

                                                    @endif
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

            <!-- Modal Konfirmasi Sertifikat -->
<div class="modal fade" id="modalBeri" tabindex="-1" role="dialog" aria-labelledby="modalBeriLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="formBeriSertifikat" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBeriLabel">Konfirmasi Pemberian Sertifikat</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <input type="hidden" name="user_id" id="modalUserId">
                <input type="hidden" name="lomba_id" id="modalLombaId">
                <div class="modal-body">
                    <p>Apakah kamu yakin ingin memberikan sertifikat kepada <strong id="modalNamaPeserta"></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Ya, Berikan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>


        </section>
    </div>

@endsection

@push('scripts')
<script>
    $('#modalBeri').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        const userId = button.data('user');
        const lombaId = button.data('lomba');
        const nama = button.data('nama');

        const modal = $(this);
        modal.find('#modalUserId').val(userId);
        modal.find('#modalLombaId').val(lombaId);
        modal.find('#modalNamaPeserta').text(nama);

        // Set form action (harus sesuai route kamu)
        $('#formBeriSertifikat').attr('action', @json(route('sertifikat.generate')));
    });
</script>
@endpush
