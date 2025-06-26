<!DOCTYPE html>
<html>
<head>
    <style>
        body { text-align: center; font-family: sans-serif; }
        .sertif-box {
            border: 10px solid #000;
            padding: 50px;
        }
        h1 { font-size: 48px; }
        p { font-size: 20px; }
    </style>
</head>
<body>
    <div class="sertif-box">
        <h1>Sertifikat Penghargaan</h1>
        <p>Diberikan kepada</p>
        <h2>{{ $user->name }}</h2>
        <p>Atas partisipasi dalam lomba {{ $lomba->nama }}</p>
        <p><strong>Nomor Sertifikat:</strong> {{ $nomor_sertifikat }}</p>
        <p><i>{{ date('d F Y') }}</i></p>
    </div>
</body>
</html>
