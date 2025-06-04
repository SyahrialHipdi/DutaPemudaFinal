@extends('layouts.pendaftar')
@section('title', 'ubah password')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="card card-primary card-outline mt-5">
                        <div class="card-body box-profile">
                            <form>
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-control-label" for="form3Example4cg">Password Baru</label>
                                    <input type="password" id="form3Example4cg" class="form-control form-control-lg" />
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-control-label" for="form3Example4cg">Konfirmasi Password Baru</label>
                                    <input type="password" id="form3Example4cg" class="form-control form-control-lg" />
                                </div>

                                <div class="d-flex justify-content-center flex-column">
                                    <a href="{{ route('user.dashboard') }}" class="btn btn-primary btn-block"><b>Ubah
                                            Password</b></a>
                                </div>
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
