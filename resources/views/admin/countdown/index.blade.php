@extends('layouts.admin')
@section('title', 'Admin Countdown')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Countdown</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Manajemen Countdown</h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.countdown.create') }}">
                                        <button class="btn btn-primary btn-sm">
                                            <i class="fa fa-plus"></i> Tambah Countdown
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="userTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama Countdown</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($countdowns as $countdown)
                                            <tr>
                                                <td> {{ $countdown->title }} </td>
                                                <td>{{ $countdown->target_datetime }}</td>
                                                <td>{{ $countdown->status }}</td>
                                                <td>
                                                    <a href="{{ route('admin.countdown.edit', $countdown->id) }}"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('admin.countdown.destroy', $countdown->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Yakin ingin menghapus countdown ini?')">
                                                            <i class="fa fa-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

{{-- @section('content') --}}

<!-- Form Input -->
{{-- <h1>Countdown Timer</h1>

    <form method="POST" action="{{ route('admin.countdown.store') }}">
        @csrf
        <input type="text" name="title" placeholder="Judul" required>
        <input type="datetime-local" name="target_datetime" required>
    <select name="status">
        <option value="aktif">Aktif</option>
        <option value="mati">Mati</option>
    </select>
    <button type="submit">Tambah Countdown</button>
    </form>

    <hr> --}}

<!-- Daftar Countdown -->
{{-- <h2>Daftar Countdown</h2>
    @foreach ($countdowns as $c)
        <div class="countdown-item">
            <strong>{{ $c->title }}</strong>
            (Status: {{ $c->status ? 'Aktif' : 'Mati' }})
            - <span id="timer-{{ $c->id }}"></span>
            | <a href="{{ route('admin.countdown.edit', $c->id) }}">Edit</a>
        </div>
        <script>
            const target{{ $c->id }} = new Date("{{ $c->target_datetime }}").getTime();
            const timer{{ $c->id }} = document.getElementById('timer-{{ $c->id }}');

            setInterval(() => {
                if (!{{ $c->status ? 'true' : 'false' }}) {
                    timer{{ $c->id }}.innerHTML = "Nonaktif";
                    return;
                }
                const now = new Date().getTime();
                const distance = target{{ $c->id }} - now;

                if (distance > 0) {
                    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    timer{{ $c->id }}.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
                } else {
                    timer{{ $c->id }}.innerHTML = "EXPIRED";
                }
            }, 1000);
        </script>
    @endforeach

@endsection --}}
