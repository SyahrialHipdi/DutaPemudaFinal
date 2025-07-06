<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat Penghargaan</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Great+Vibes&display=swap');

        @font-face {
            font-family: 'Great Vibes';
            src: url('{{ storage_path('fonts/GreatVibes-Regular.ttf') }}') format("truetype");
            font-weight: normal;
            font-style: normal;
        }

        @page {
            margin: 0px;
        }


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            margin: 0px;
            padding: 0px;
        }

        .certificate-container {
            width: 1100px;
            height: 778px;
            position: relative;
            overflow: hidden;
            background-image: url('img/sertifikat.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* Overlay untuk memastikan teks terlihat jelas */
        .certificate-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.1);
            z-index: 1;
        }

        /* Header Section */
        .header {
            position: absolute;
            top: 70px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 3;
            text-align: center;
        }

        .header h1 {
            font-family: serif;
            font-size: 72px;
            font-weight: 700;
            color: #1a365d;
            letter-spacing: 8px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header h2 {
            font-size: 28px;
            margin-top: -10px;
            font-weight: 400;
            color: #1a365d;
            letter-spacing: 4px;
            /* margin-bottom: 20px; */
        }

        .given-to {
            font-size: 20px;
            color: #2d3748;
            font-weight: 400;
            margin-bottom: 40px;
        }

        /* Name Section */
        .name-section {
            position: absolute;
            top: 300px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 3;
            text-align: center;
            width: 80%;
        }

        .name-display {
            width: 600px;
            margin: 0 auto 20px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 2px solid #2d3748;
        }

        .participant-name {
            font-family: 'Great Vibes', cursive;
            font-size: 88px;
            color: #d69e2e;
            font-weight: normal;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        /* Achievement Description */
        .achievement {
            position: absolute;
            top: 400px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 3;
            text-align: center;
            width: 70%;
            font-size: 18px;
            color: #2d3748;
            line-height: 1.8;
        }

        .achievement-title {
            font-weight: 600;
            color: #1a365d;
        }

        /* Signature Section */
        .signatures {
            position: absolute;
            bottom: 100px;
            left: 0;
            right: 0;
            z-index: 3;
            display: flex;
            justify-content: space-between;
            padding: 0 200px;
        }

        .signature-box {
            text-align: center;
            width: 200px;
            height: 150px;
        }

        .signature-line {
            width: 100%;
            height: 70px;
            border-bottom: 2px solid #2d3748;
            margin-bottom: 8px;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            padding-bottom: 5px;
        }

        .signature-text {
            font-style: italic;
            margin-top: 30px;
            font-size: 16px;
            color: #1a1a1a;
        }

        .signature-title {
            font-size: 14px;
            color: #4a5568;
            font-weight: 500;
            margin-top: 5px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="certificate-container">
        <div class="certificate-overlay"></div>

        <!-- Header -->
        <div class="header">
            <h1>SERTIFIKAT</h1>
            <h2>PENGHARGAAN</h2>
            <h3>Nomor: XXX.X.X/Kep.XXX-Dispora/2025</h3>
            <div class="given-to">Diberikan Kepada :</div>
        </div>

        <!-- Name Section -->
        <div class="name-section">
            <div class="name-display">
                <div class="participant-name">suaib</div>
            </div>
        </div>

        <!-- Achievement Description -->
        <div class="achievement">
            Atas <span class="achievement-title">partisipasinya sebagai peserta dalam kegiatan </span><br>
            <span class="achievement-title">ppan 2025</span>
        </div>

        <!-- Signature Section -->
        {{-- <div class="signatures">
            <div class="signature-box">
                <div class="signature-text">Gubernur</div>
                <div class="signature-line"></div>
                <div class="signature-title">Nama</div>
            </div>
            <div class="signature-box">
                <div class="signature-text">Ketua Panitia</div>
                <div class="signature-line"></div>
                <div class="signature-title">Nama</div>
            </div>
        </div> --}}
    </div>
</body>

</html>
