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

                <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                {{-- <p class="card-text"><strong>Tanggal Lahir:</strong><br>{{ $user->tanggalLahir }}</p> --}}
                <p class="card-text"><strong>Password:</strong><br>{{ $user->password }}</p>
                {{-- <p class="card-text"><strong>provinsi:</strong><br>{{ $user->provinsiWIlayah->name }}</p> --}}

            </div>
        </div>

        {{-- <a href="{{ route('user.show') }}" class="btn btn-secondary mt-3">Kembali ke Daftar</a> --}}
    </div>
</body>

</html>
