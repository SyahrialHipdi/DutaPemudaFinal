@extends('layouts.pendaftar')
@section('title', 'Profile')
@section('content')
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Lomba</h1>
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
                                <table id="example" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Lomba</th>
                                            {{-- <th>Tahap</th> --}}
                                            <th>Status</th>
                                            <th>Alasan(jika ditolak)</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lombas as $lomba)
                                            <tr>
                                                <td>{{ $lomba->nama_lomba }} </td>
                                                <td>
                                                    @if ($lomba->pivot->status=="ditolak")

                                                        <button class="btn btn-danger btn-sm">{{$lomba->pivot->status}}</button>
                                                        
                                                        @elseif($lomba->pivot->status=="juara")
                                                        <button class="btn btn-success btn-sm">{{$lomba->pivot->status}} <i class="fa fa-trophy ml-1"></i></button>
                                                        @else
                                                        <button class="btn btn-warning btn-sm">{{$lomba->pivot->status}}</button>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $lomba->pivot->alasan }}
                                                </td>
                                                {{-- <td>
                                                    <a href="{{ route('admin.lomba.edit', $lomba->id) }}"
                                                        class="btn btn-sm btn-warning">Edit</a>
                                                    <form action="{{ route('admin.lomba.destroy', $lomba->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                                    </form>
                                                </td> --}}
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
        </section>
    </div>
@endsection
