@extends('layouts.app')
@section('title', 'Formulir Pendaftaran')
@section('content')
    @if (request()->session()->has('step1_done'))
        {{-- versi server-side --}}
        <style>
            #wizard-step-1 {
                display: none !important;
            }

            #wizard-step-2 {
                display: block !important;
            }
        </style>
    @endif

    <section>
        {{-- Wizard Step 1: Syarat --}}
        <div id="wizard-step-1">
            <div class="container-fluid px-1 py-5 mx-auto">
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                        <h3 class="text-center">Syarat dan Ketentuan</h3>
                        <p class="text-muted mb-4">Pastikan Anda memahami seluruh syarat dan ketentuan yang berlaku.</p>

                        <div class="card px-lg-5 px-3" style="border-radius: 15px;">
                            <div class="card-body py-3">
                                <ol class="mx-2 text-start">
                                    <li>Warga Negara Indonesia yang bertaqwa kepada Tuhan Yang Maha Esa.</li>
                                    <li>KTP Tangerang Selatan.</li>
                                    <li>Usia 17-30 tahun.</li>
                                    <li>Pendidikan minimal SMA/SLTA.</li>
                                    <li>Belum menikah.</li>
                                    <li>Surat keterangan sehat jasmani & rohani.</li>
                                    <li>Aktif kegiatan sosial, dibuktikan dokumentasi.</li>
                                    <li>Tidak merokok & bebas narkoba.</li>
                                    <li>Wawasan kebangsaan dan cinta tanah air.</li>
                                    <li>Mahir komunikasi dan media sosial.</li>
                                    <li>Menguasai seni dan budaya lokal.</li>
                                    <li>Tidak pernah terlibat kriminal.</li>
                                </ol>

                                <div class="form-check text-left ml-4 my-4 text-center">
                                    <input class="form-check-input" type="checkbox" id="agreeTerms">
                                    <label class="form-check-label" for="agreeTerms">
                                        Saya menyetujui syarat dan ketentuan pendaftaran Duta Pemuda.
                                    </label>
                                </div>

                                <div id="alert-warning" class="alert alert-danger d-none" role="alert">
                                    Silakan centang kotak persetujuan terlebih dahulu.
                                </div>

                                <button id="btn-lanjut" class="btn btn-primary w-100">Lanjut Pendaftaran</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Wizard Step 2: Form --}}
        <div id="wizard-step-2" style="display: none;">
            <div class="container-fluid px-1 py-5 mx-auto">
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-9 col-11 ">
                        <h3 class="text-center">Formulir Pendaftaran Duta Pemuda 2025</h3>
                        <p class="text-muted mb-4 text-center">Isi formulir ini dengan data yang benar dan lengkap.</p>

                        @if ($errors->any())
                            <div class="alert alert-danger text-start">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="card px-lg-5 px-3" style="border-radius: 15px;">
                            <div class="card-body py-3">
                                <form method="POST" action="{{ route('lomba.submit', $lomba->id) }}" id="myForm"
                                    enctype="multipart/form-data" class="needs-validation" novalidate>
                                    @csrf

                                    {{-- Field Email & Password (selalu di atas dan berdampingan) --}}
                                    @guest
                                        <div class="row">
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label fw-bold">NIK</label>
                                                <input class="form-control" type="nik" name="nik" required>
                                                <div class="invalid-feedback">Password wajib diisi.</div>
                                            </div>
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label fw-bold">Nama Lengkap</label>
                                                <input class="form-control" type="nama" name="nama" required>
                                                <div class="invalid-feedback">Password wajib diisi.</div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-6 mb-4">
                                                <label class="form-label fw-bold">Provinsi</label>
                                                <select id="provinsi" name="provinsi" class="form-control nice-select wide"
                                                    required>
                                                    <option value="" disabled selected>-- Pilih Provinsi --
                                                    </option>
                                                </select>
                                                <div class="invalid-feedback">Pilihan ini wajib diisi.</div>
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <label class="form-label fw-bold">kota</label>
                                                <select id="kota" name="kota" class="form-control nice-select wide"
                                                    required>
                                                    <option value="" disabled selected>-- Pilih kota --
                                                    </option>
                                                </select>
                                                <div class="invalid-feedback">Pilihan ini wajib diisi.</div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <label class="form-label fw-bold">kecamatan</label>
                                                <select id="kecamatan" name="kecamatan" class="form-control nice-select wide"
                                                    required>
                                                    <option value="" disabled selected>-- Pilih kecamatan --
                                                    </option>
                                                </select>
                                                <div class="invalid-feedback">Pilihan ini wajib diisi.</div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <label class="form-label fw-bold">desa</label>
                                                <select id="desa" name="desa" class="form-control nice-select wide"
                                                    required>
                                                    <option value="" disabled selected>-- Pilih desa --
                                                    </option>
                                                </select>
                                                <div class="invalid-feedback">Pilihan ini wajib diisi.</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <label class="form-label fw-bold">rt_rw</label>
                                                <input class="form-control" type="text" name="rt_rw"
                                                    value="{{ old('rt_rw') }}" required>
                                                <div class="invalid-feedback">Format email tidak valid.</div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <label class="form-label fw-bold">kode pos <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" type="text" name="kodepos" required>
                                                <div class="invalid-feedback">Password wajib diisi.</div>
                                            </div>
                                            <div class="col-sm-12 mb-4">
                                                <label class="form-label fw-bold">Alamat</label>
                                                <input class="form-control" type="text" name="alamat"
                                                    value="{{ old('alamat') }}" required>
                                                <div class="invalid-feedback">Format email tidak valid.</div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <label class="form-label fw-bold">ktp <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" type="file" name="ktp" required>
                                                <div class="invalid-feedback">Password wajib diisi.</div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <label class="form-label fw-bold">Tanggal Lahir</label>
                                                <input class="form-control" type="date" name="lahir" required>
                                                <div class="invalid-feedback">Password wajib diisi.</div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <label class="form-label fw-bold">Email <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" type="email" name="email"
                                                    value="{{ old('email') }}" required>
                                                <div class="invalid-feedback">Format email tidak valid.</div>
                                            </div>
                                            {{-- <div class="col-md-6 mb-4">
                                                <label class="form-label fw-bold">Password <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" type="password" name="password" required>
                                                <div class="invalid-feedback">Password wajib diisi.</div>
                                            </div> --}}
                                        </div>
                                    @endguest

                                    {{-- Bagian persetujuan dan tombol submit --}}

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-bold">Proposal <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="proposal"
                                                value="{{ old('proposal') }}" required>
                                            <div class="invalid-feedback">Proposal tidak valid.</div>
                                        </div>
                                    </div>
                                    @if ($lomba->role == 'pemuda pelopor')
                                        <div class="row">
                                            <div class="col-12 mb-4">
                                                <label class="form-label fw-bold">Bidang Kepeloporan<span
                                                        class="text-danger">*</span></label>
                                                <select id="bidang" name="bidang_pilihan_id"
                                                    class="form-control nice-select wide">
                                                    <option value="">-- Pilih Bidang --
                                                    </option>
                                                    <option value="pendidikan">pendidikan
                                                    </option>
                                                    <option value="Pengelolaan sumber daya alam">Pengelolaan sumber daya
                                                        alam
                                                    </option>
                                                    <option value="lingkungan dan pariwisata">lingkungan dan pariwisata
                                                    </option>
                                                    <option value="pangan">pangan
                                                    </option>
                                                    <option value="inovasi teknolgi">inovasi teknolgi
                                                    </option>
                                                    <option value="sosial">sosial
                                                    </option>
                                                    <option value="agama">agama
                                                    </option>
                                                    <option value="budaya">budaya
                                                    </option>
                                                </select>
                                                <div class="invalid-feedback">Bidang wajib diisi.</div>

                                            </div>
                                        </div>
                                    @endif

                                    <div class="form-check mb-4 text-center">
                                        <input class="form-check-input" type="checkbox" id="invalidCheck" required>
                                        <label class="form-check-label" for="invalidCheck">Saya menyatakan semua data yang
                                            diisi
                                            adalah
                                            benar.</label>
                                        <div class="invalid-feedback">Anda harus menyetujui pernyataan ini.</div>
                                    </div>

                                    <button type="submit" class="btn w-100">Kirim Pendaftaran</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection

@push('scripts')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            // MIne


            if (sessionStorage.getItem('step1_done')) {
                $('#wizard-step-1').hide();
                $('#wizard-step-2').show();
            }

            $('#btn-lanjut').click(function() {
                if (!$('#agreeTerms').is(':checked')) {
                    $('#alert-warning').removeClass('d-none');
                } else {
                    $('#alert-warning').addClass('d-none');

                    // Simpan status bahwa step 1 sudah dilalui
                    sessionStorage.setItem('step1_done', true);
                    $('#wizard-step-1').addClass('d-none');

                    // Tampilkan step 2
                    $('#wizard-step-1').hide();
                    $('#wizard-step-2').show();
                    $("html, body").animate({
                        scrollTop: 0
                    }, "slow");
                }
            });

            $('#myForm').on('submit', function(event) {
                event.preventDefault();
                let form = this;
                const isValid = form.checkValidity();
                const checked = $('#invalidCheck').is(':checked');

                if (!isValid || !checked) {
                    $('#alert-warning-2').removeClass('d-none').text(
                        checked ? "Silakan lengkapi data Anda." :
                        "Silakan centang kotak persetujuan dan lengkapi data Anda."
                    );
                    form.classList.add('was-validated');
                } else {
                    $('#alert-warning-2').addClass('d-none');
                    form.submit();
                }
            });

            // Nice Select Helper
            function refreshSelect(selector) {
                $(selector).niceSelect('destroy');
                $(selector).niceSelect();
            }

            // Inisialisasi semua select
            refreshSelect('select');

            // Load Provinsi
            $.get('/provinsi', function(data) {
                let options = '<option value="">-- Pilih Provinsi --</option>';
                data.forEach(prov => options += `<option value="${prov.code}">${prov.name}</option>`);
                $('#provinsi').html(options);
                refreshSelect('#provinsi');
            });

            // Event Change
            $('#provinsi').change(function() {
                const kode = $(this).val();
                $('#kota, #kecamatan, #desa').html('<option value="">-- Pilih --</option>');
                refreshSelect('#kota');
                refreshSelect('#kecamatan');
                refreshSelect('#desa');

                if (!kode) return;
                $.get(`/kota/${kode}`, function(data) {
                    let options = '<option value="">-- Pilih Kota --</option>';
                    data.forEach(item => options +=
                        `<option value="${item.code}">${item.name}</option>`);
                    $('#kota').html(options);
                    refreshSelect('#kota');
                });
            });

            $('#kota').change(function() {
                const kode = $(this).val();
                $('#kecamatan, #desa').html('<option value="">-- Pilih --</option>');
                refreshSelect('#kecamatan');
                refreshSelect('#desa');

                if (!kode) return;
                $.get(`/kecamatan/${kode}`, function(data) {
                    let options = '<option value="">-- Pilih Kecamatan --</option>';
                    data.forEach(item => options +=
                        `<option value="${item.code}">${item.name}</option>`);
                    $('#kecamatan').html(options);
                    refreshSelect('#kecamatan');
                });
            });

            $('#kecamatan').change(function() {
                const kode = $(this).val();
                $('#desa').html('<option value="">-- Pilih Desa --</option>');
                refreshSelect('#desa');

                if (!kode) return;
                $.get(`/desa/${kode}`, function(data) {
                    let options = '<option value="">-- Pilih Desa --</option>';
                    data.forEach(item => options +=
                        `<option value="${item.code}">${item.name}</option>`);
                    $('#desa').html(options);
                    refreshSelect('#desa');
                });
            });
        });
    </script>
@endpush
