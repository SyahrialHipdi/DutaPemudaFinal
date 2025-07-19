@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2>Tambah Countdown Baru</h2>


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
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                <form action="{{ route('admin.countdown.store') }}" method="POST">
                                    @csrf

                                    <div class="form-group mb-3">
                                        <label>Judul</label>
                                        <input type="text" name="title" class="form-control" required
                                            placeholder="Pendaftaran Lomba PPAP 2025">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>Waktu</label>
                                        <input type="datetime-local" name="target_datetime" class="form-control" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>Status</label>
                                        <select name="status" id="status" class="form-control" required
                                            onchange="toggleLombaSelect()">
                                            <option value="">-- Pilih Status --</option>
                                            <option value="aktif">Aktif</option>
                                            <option value="mati">Mati</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Simpan</button>
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
