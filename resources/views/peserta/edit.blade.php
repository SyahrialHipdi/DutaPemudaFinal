@extends('layouts.pendaftar')
@section('title', 'ubah password')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="card card-primary card-outline mt-5">
                        <div class="card-body box-profile">
                            {{-- @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    {{ $errors->first() }}
                                </div>
                            @endif
                            <small class="form-text text-muted">
                                Syarat password:
                                <ul class="mb-0">
                                    <li>Minimal 8 karakter</li>
                                    <li>Mengandung huruf kecil (a-z)</li>
                                    <li>Mengandung huruf besar (A-Z)</li>
                                    <li>Mengandung angka (0-9)</li>
                                    <li>Mengandung simbol (misal: ! @ # $ % ^ & *)</li>
                                    <li>Harus sama dengan kolom konfirmasi password</li>
                                </ul>
                            </small>

                            <form action="{{ route('peserta.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-control-label" for="password">Password Baru</label>
                                    <input type="password" id="password" class="form-control form-control-lg"
                                        name="password" required />
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-control-label" for="password_confirmation">Konfirmasi Password
                                        Baru</label>
                                    <input type="password" id="password_confirmation" class="form-control form-control-lg"
                                        name="password_confirmation" required />
                                </div>

                                {{-- <div class="d-flex justify-content-center flex-column">
                                    <a href="{{ route('user.dashboard') }}" class="btn btn-primary btn-block"><b>Ubah
                                            Password</b></a>
                                </div> --}}

                                <button class="btn btn-sm btn-warning" type="submit">Update</button>
                                <a href="/peserta/index">
                                    <button class="btn btn-sm btn-danger" type="button">Batal</button>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.col -->

                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

@endsection
