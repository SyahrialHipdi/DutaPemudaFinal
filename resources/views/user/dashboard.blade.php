@extends('layouts.pendaftar')
@section('title', 'Profile')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline mt-5">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="img/user.png"
                                    alt="User profile picture" />
                            </div>

                            <h3 class="profile-username text-center">User</h3>

                            <p class="text-muted text-center">Pemuda Pelopor</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Email</b>
                                    <a class="float-right">example@gmail.com</a>
                                </li>
                                <li class="list-group-item">
                                    <b>No whatsapp</b> <a class="float-right">13,287</a>
                                </li>
                                <li class="list-group-item">
                                    <b>NIK</b> <a class="float-right">3321121212121212</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Alamat</b> <a class="float-right">Purbalingga</a>
                                </li>

                                <li class="list-group-item">
                                    <b>Tahun</b>
                                    <a class="float-right">2018</a>
                                </li>
                            </ul>

                            <a href="{{ route('user.ubahPassword') }}" class="btn btn-primary btn-block"><b>Ubah Password</b></a>
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
