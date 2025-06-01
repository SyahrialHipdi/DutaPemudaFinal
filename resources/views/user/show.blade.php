<!DOCTYPE html>
<html>
<head>
    <title>Detail User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-3">Detail User</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><strong>NIK:</strong> {{ $user->nik }}</h5>
            <h5 class="card-title"><strong>Nama:</strong> {{ $user->nama }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="card-text"><strong>Whatsapp:</strong><br>{{ $user->whatsapp }}</p>
            <p class="card-text"><strong>Tanggal Lahir:</strong><br>{{ $user->tanggalLahir }}</p>
            {{-- <p class="card-text"><strong>Password:</strong><br>{{ $user->password }}</p> --}}
            <p class="card-text"><strong>provinsi:</strong><br>{{ $user->provinsiWIlayah->name }}</p>
            <p class="card-text"><strong>kota:</strong><br>{{ $user->kabupatenWilayah->name }}</p>
            <p class="card-text"><strong>kecamatan:</strong><br>{{ $user->kecamatan }}</p>
            <p class="card-text"><strong>desa:</strong><br>{{ $user->desa }}</p>
            <p class="card-text"><strong>rt_rw:</strong><br>{{ $user->rt_rw }}</p>
            <p class="card-text"><strong>alamat:</strong><br>{{ $user->alamat }}</p>
            <p class="card-text"><strong>kodePos:</strong><br>{{ $user->kodePos }}</p>
      </div>
    </div>

    {{-- <a href="{{ route('user.show') }}" class="btn btn-secondary mt-3">Kembali ke Daftar</a> --}}
</div>
</body>
</html>
