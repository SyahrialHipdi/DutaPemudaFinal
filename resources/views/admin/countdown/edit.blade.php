@extends('layouts.admin')
@section('title', 'Tambah Lomba Baru')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2>Edit Countdown Countdown</h2>


                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <form method="POST" action="{{ route('admin.countdown.update', $countdown->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label>Judul</label>
                                    <input type="text" name="title" value="{{ $countdown->title }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Waktu</label>
                                    <input type="datetime-local" name="target_datetime"
                                        value="{{ $countdown->target_datetime->format('Y-m-d\TH:i') }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Status</label>
                                    <select name="status">
                                        <option value="aktif" {{ $countdown->status ? 'selected' : '' }}>Aktif</option>
                                        <option value="mati" {{ !$countdown->status ? 'selected' : '' }}>Mati</option>
                                    </select>
                                </div>




                                <button type="submit">Update</button>
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
