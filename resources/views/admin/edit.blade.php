@extends('layouts.admin')
@section('title', 'admin edit')

@section('content')
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="" class="form-card mt-4">
                                @csrf
                                <div class="form-group col-sm-12 flex-column d-flex">
                                    <label class="form-control-label h6 px-3">Nama<span class="text-danger"> *</span></label>
                                    <input class="form-control w-100" type="text" id="nama" name="nama"
                                        placeholder="" required>
                                </div>

                                <div class="form-group col-sm-12 flex-column d-flex">
                                    <label class="form-control-label h6 px-3">Email<span class="text-danger">
                                            *</span></label>
                                    <input class="form-control w-100" type="email" id="email" name="email"
                                        placeholder="" required>
                                </div>

                                <div class="form-group col-sm-12 flex-column d-flex">
                                    <label class="form-control-label h6 px-3">Role<span class="text-danger">
                                            *</span></label>
                                    <select class="form-control w-100" id="role" name="role" required>
                                        <option value="">Pilih Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="verifikator">Verifikator</option>
                                        <option value="juri">Juri</option>
                                    </select>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="form-group col-sm-12">
                                        <button type="submit" class="btn btn-primary" style="width: 100%">Kirim</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </section>
@endsection
