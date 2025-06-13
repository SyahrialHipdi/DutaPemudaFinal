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


@extends('layouts.juri')
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
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            @foreach ($lombas as $lomba)
                                <div class="card-body">
                                    <h4 colspan="5"><strong>Lomba: {{ $lomba->nama_lomba }}</strong></h4>
                                    <table id="example" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nilai</th>
                                                <th>Email</th>
                                                {{-- <th>lomba</th> --}}
                                                <th>Data Isian</th>
                                                <th>aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($lomba->users as $index => $user)
                                                @php
                                                    // Cari penilaian juri yang sedang login terhadap peserta ini
                                                    $penilaian = $lomba->penilaians
                                                        ->where('juri_id', auth()->id())
                                                        ->where('peserta_id', $user->id)
                                                        ->first();
                                                @endphp
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        {{-- {{ $user->name ?? '-' }} --}}
                                                        @if ($penilaian)
                                                            <strong>Nilai:</strong> {{ $penilaian->nilai }}<br>
                                                            <strong>Komentar:</strong> {{ $penilaian->komentar }}
                                                        @else
                                                            <span class="text-danger">Belum dinilai</span>
                                                        @endif
                                                    </td>
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
                                                                        <a href="{{ asset('storage/' . $v) }}"
                                                                            target="_blank">Lihat File</a>
                                                                    @else
                                                                        {{ $v }}
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('juri.create', [$lomba->id, $user->id]) }}"
                                                            class="btn btn-sm btn-warning">Nilai</a>
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
