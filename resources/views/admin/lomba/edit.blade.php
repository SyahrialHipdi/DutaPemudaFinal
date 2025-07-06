@extends('layouts.admin')
@section('title', 'Tambah Lomba Baru')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Lomba</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.lomba.index') }}">Manajemen Lomba</a></li>
                            <li class="breadcrumb-item active">Edit Lomba</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card card-outline card-primary">

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.lomba.update', $lomba->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            {{-- Meng-include file form terpisah --}}
                            @include('admin.lomba.form')
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Simpan
                                Lomba</button>
                            <a href="{{ route('admin.lomba.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
