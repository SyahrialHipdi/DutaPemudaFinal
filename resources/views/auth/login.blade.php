<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk | Gerbang Duta Pemuda Indonesia</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #007bff;
            --primary-blue-hover: #036cdd;
            --light-gray-bg: #F9FAFB;
            --gray-border: #D1D5DB;
            --text-primary: #111827;
            --text-secondary: #6B7280;
            --card-bg: #FFFFFF;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body,
        html {
            min-height: 100%;
            font-family: 'Inter', sans-serif;
            background-color: var(--light-gray-bg);
            /* Latar belakang statis */
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }

        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            background-color: var(--card-bg);
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        .logo-container {
            margin: 0 auto 1rem;
            width: 70px;
        }

        .logo-container img {
            width: 100%;
        }

        /* --- HEADER KARTU --- */
        .card-header h2 {
            font-size: 1.75rem;
            /* 28px */
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .card-header p {
            color: var(--text-secondary);
            margin-bottom: 2rem;
        }

        /* --- FORM GROUP BARU --- */
        .form-group {
            text-align: left;
            margin-bottom: 1.25rem;
        }

        .form-group label {
            display: block;
            font-size: 0.875rem;
            /* 14px */
            font-weight: 500;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .input-wrapper {
            position: relative;
        }

        .form-group .input-field {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--gray-border);
            border-radius: 0.5rem;
            /* 8px */
            font-size: 1rem;
            color: var(--text-primary);
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-group .input-field:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }

        /* --- TAMBAHAN: IKON PASSWORD --- */
        .password-toggle {
            position: absolute;
            top: 50%;
            right: 1rem;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-secondary);
            padding: 0;
        }

        .password-toggle svg {
            width: 20px;
            height: 20px;
        }

        /* --- TAMBAHAN: OPSI FORM --- */
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
        }

        .form-options .remember-me {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-options .remember-me label {
            margin-bottom: 0;
            /* Override margin */
            color: var(--text-secondary);
            font-weight: 400;
        }

        .form-options input[type="checkbox"] {
            width: 1rem;
            height: 1rem;
        }

        .form-options a {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 500;
        }

        .form-options a:hover {
            text-decoration: underline;
        }

        /* --- TOMBOL-TOMBOL BARU --- */
        .btn {
            width: 100%;
            padding: 0.8rem;
            border-radius: 0.5rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
            margin-bottom: 1rem;
        }

        .btn-primary {
            background-color: var(--primary-blue);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-blue-hover);
        }

        .btn-google {
            background-color: var(--card-bg);
            color: var(--text-primary);
            border: 1px solid var(--gray-border);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.75rem;
        }

        .btn-google:hover {
            background-color: #f3f4f6;
        }

        .btn-google img {
            width: 20px;
            height: 20px;
        }

        /* --- TAMBAHAN: LINK DAFTAR --- */
        .signup-link {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        .signup-link a {
            color: var(--primary-blue);
            font-weight: 500;
            text-decoration: none;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }

        /* Untuk pesan error dari Laravel */
        .invalid-feedback {
            display: block;
            text-align: left;
            margin-top: 0.25rem;
            font-size: 0.8rem;
            color: #EF4444;
            /* Merah */
        }

        .is-invalid {
            border-color: #EF4444 !important;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <div class="login-card">
            <div class="logo-container">
                <img src="{{ asset('img/favicon.png') }}" alt="Duta Pemuda Logo">
            </div>

            <header class="card-header">
                <h2>Selamat Datang Kembali</h2>
                <p>Silakan masukkan detail akun Anda untuk masuk.</p>
            </header>

            <form method="POST" action="{{ route('auth.login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" id="email" name="email"
                        class="input-field @error('email') is-invalid @enderror" value="{{ old('email') }}" required
                        autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <input type="password" id="password" name="password"
                            class="input-field @error('password') is-invalid @enderror" required
                            autocomplete="current-password">
                        <button type="button" class="password-toggle" onclick="togglePasswordVisibility()">
                            <svg id="icon-eye-open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M10 12.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" />
                                <path fill-rule="evenodd"
                                    d="M.664 10.59a1.651 1.651 0 010-1.18l.879-1.288A1.65 1.65 0 013.25 7.5h13.5a1.65 1.65 0 011.708 1.701l.879 1.288a1.651 1.651 0 010 1.18l-.879 1.288A1.65 1.65 0 0116.75 12.5h-13.5a1.65 1.65 0 01-1.708-1.702L.664 10.59zM10 6a4 4 0 100 8 4 4 0 000-8z"
                                    clip-rule="evenodd" />
                            </svg>
                            <svg id="icon-eye-closed" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" style="display: none;">
                                <path fill-rule="evenodd"
                                    d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.27 6.957 14.545 4.5 10 4.5c-1.254 0-2.467.246-3.602.682L3.707 2.293zM10 12.5a2.5 2.5 0 01-2.5-2.5c0-.428.12-.82.322-1.157l3.335 3.335c-.337.202-.73.322-1.157.322z"
                                    clip-rule="evenodd" />
                                <path
                                    d="M4.543 10c1.272 3.043 5.007 5.5 9.543 5.5c.653 0 1.292-.056 1.912-.164l-1.849-1.849a4.002 4.002 0 01-5.714-5.714l-1.536-1.536A10.007 10.007 0 004.543 10z" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-options">
                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Ingat saya</label>
                    </div>
                    <a href="#">Lupa Password?</a>
                </div>

                <button type="submit" class="btn btn-primary">MASUK</button>
                {{-- <button type="button" class="btn btn-google">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg"
                        alt="Google logo">
                    Masuk dengan Google
                </button> --}}
            </form>

            <div class="signup-link">
                Belum punya akun? <a href="{{ route('lomba.index') }}">Daftar sekarang</a>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeOpen = document.getElementById('icon-eye-open');
            const eyeClosed = document.getElementById('icon-eye-closed');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeOpen.style.display = 'none';
                eyeClosed.style.display = 'block';
            } else {
                passwordInput.type = 'password';
                eyeOpen.style.display = 'block';
                eyeClosed.style.display = 'none';
            }
        }
    </script>
</body>

</html>
