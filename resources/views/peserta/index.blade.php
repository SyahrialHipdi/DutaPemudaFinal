@extends('layouts.pendaftar')
@section('title', 'Profile')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline mt-5">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}
                            </div>
                            <div class="alert alert-warning">

                                <a href="{{ route('peserta.edit') }}">
                                    Klik Disini untuk ganti password
                                </a>
                            </div>
                        @endif
                        @if (session('berhasil'))
                            <div class="alert alert-success">{{ session('berhasil') }}</div>
                        @endif
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('img/user.png') }}"
                                    alt="User profile picture" />
                            </div>

                            {{-- <h3 class="profile-username text-center">{{ Auth::guard('web')->user()->nama }}</h3> --}}

                            <p class="text-muted text-center">Pemuda Pelopor</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>NIK</b>
                                    <a class="float-right">{{ $peserta->nik }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Nama</b>
                                    <a class="float-right">{{ $peserta->nama }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Tanggal lahir</b>
                                    <a class="float-right">{{ $peserta->lahir }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Provinsi</b>
                                    <a class="float-right">{{ $peserta->provinsi }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Kota</b>
                                    <a class="float-right">{{ $peserta->kota }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Kecamatan</b>
                                    <a class="float-right">{{ $peserta->kecamatan }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Desa</b>
                                    <a class="float-right">{{ $peserta->desa }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>RT/RW</b>
                                    <a class="float-right">{{ $peserta->rt_rw }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Alamat</b>
                                    <a class="float-right">{{ $peserta->alamat }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Kode pos</b>
                                    <a class="float-right">{{ $peserta->kodepos }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b>
                                    <a class="float-right">{{ $peserta->user->email }}</a>
                                </li>

                                {{-- <li class="list-group-item">
                                    <b>desa</b> <a class="float-right">{{ Auth::guard('web')->user()->desaWIlayah->name }}</a>
                                </li> --}}
                                {{-- <li class="list-group-item">
                                    <b>rt_rw</b> <a class="float-right">{{ Auth::guard('web')->user()->rt_rw }}</a>
                                </li> --}}



                                {{-- @if (Auth::guard('web')->user()->ktp)
                                    <img src="{{ asset('storage/' . Auth::guard('web')->user()->ktp) }}" alt="Foto Profil"
                                        class="img-fluid rounded" style="max-width: 200px;">
                                @else
                                    <p>Foto belum diunggah.</p>
                                @endif --}}
                            </ul>

                            <a href="{{ route('peserta.edit') }}" class="btn btn-primary btn-block"><b>Ubah
                                    Password</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
