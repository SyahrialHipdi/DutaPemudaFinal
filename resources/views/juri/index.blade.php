{{-- <h2>Daftar Semua Lomba & Jumlah Pendaftar</h2>

<ul>
    @foreach ($lombas as $lomba)
        <li>
            <strong>{{ $lomba->nama_lomba }} ({{ $lomba->tahun }})</strong> -
            {{ $lomba->users_count }} pendaftar
            | <a href="{{ route('admin.lomba_pendaftar.show', $lomba->id) }}">Lihat Detail</a>
        </li>
    @endforeach
</ul> --}}


@extends('layouts.admin')
@section('title', 'lomba')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Lomba</h1>
                    </div>
                    <a href="{{ route('admin.lomba.create') }}" class="col-sm-6">
                        <button class="btn btn-primary float-right">Tambah Lomba</button>
                    </a>
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
                                            <th>No</th>
                                            <th>Nama User</th>
                                            <th>Email</th>
                                            {{-- <th>lomba</th> --}}
                                            <th>Data Isian</th>
                                            <th>aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lombas as $lomba)
    <tr>
        <td colspan="5"><strong>Lomba: {{ $lomba->nama_lomba }}</strong></td>
    </tr>
    @foreach ($lomba->users as $index => $user)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $user->name ?? '-' }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @php
                    $dataIsian = json_decode($user->pivot->data_isian, true);
                @endphp
                <ul>
                    @foreach ($dataIsian as $k => $v)
                        <li>
                            <strong>{{ ucfirst(str_replace('_', ' ', $k)) }}:</strong>
                            @if (is_string($v) && \Illuminate\Support\Str::endsWith($v, ['jpg', 'jpeg', 'png', 'pdf']))
                                <a href="{{ asset('storage/' . $v) }}" target="_blank">Lihat File</a>
                            @else
                                {{ $v }}
                            @endif
                        </li>
                    @endforeach
                </ul>
            </td>
            <td>
                <a href="{{ route('juri.create', [$lomba->id,$user->id]) }}" class="btn btn-sm btn-warning">Edit</a>
            </td>
        </tr>
    @endforeach
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
