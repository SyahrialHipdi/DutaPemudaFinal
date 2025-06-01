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
            <h5 class="card-title"><strong>Status:</strong> {{ $user->status }}</h5>
      </div>
    </div>

    {{-- <a href="{{ route('user.show') }}" class="btn btn-secondary mt-3">Kembali ke Daftar</a> --}}
</div>
</body>
</html>
