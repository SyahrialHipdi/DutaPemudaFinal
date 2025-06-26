@extends('layouts.app')
@section('title', 'Formulir Pendaftaran')
@section('content')

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
                                            <div class="col-md-6 mb-4">
                                                <label class="form-label fw-bold">Email <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" type="email" name="email"
                                                    value="{{ old('email') }}" required>
                                                <div class="invalid-feedback">Format email tidak valid.</div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <label class="form-label fw-bold">Password <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" type="password" name="password" required>
                                                <div class="invalid-feedback">Password wajib diisi.</div>
                                            </div>
                                        </div>
                                    @endguest
                                    {{-- <hr class="my-3"> --}}

                                    {{-- Inisialisasi variabel penanda (flag) --}}
                                    @php
                                        $in_address_block = false;
                                        $alamatFields = ['Provinsi', 'Kota', 'Kecamatan', 'Desa'];
                                    @endphp

                                    @foreach ($lomba->syarat_lomba as $syarat)
                                        @php
                                            $parts = explode(':', $syarat);
                                            $field = $parts[0];
                                            $type = $parts[1] ?? 'text';
                                            $label = ucfirst(str_replace('_', ' ', $field));
                                            $is_address_field = in_array($label, $alamatFields);
                                        @endphp

                                        {{-- KONDISI 1: Jika bertemu field alamat PERTAMA kali --}}
                                        {{-- Buka tag <div class="row"> --}}
                                        @if ($is_address_field && !$in_address_block)
                                            @php $in_address_block = true; @endphp
                                            <div class="row">
                                        @endif

                                        {{-- KONDISI 2: Jika bertemu field BUKAN alamat, SETELAH sebelumnya berada di blok alamat --}}
                                        {{-- Tutup tag <div class="row"> --}}
                                        @if (!$is_address_field && $in_address_block)
                                            @php $in_address_block = false; @endphp
                            </div>
                            @endif


                            {{-- Render semua field sesuai kondisinya --}}
                            @if ($is_address_field)
                                {{-- Render field alamat di dalam col-md-6 --}}
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-bold">{{ $label }} <span
                                            class="text-danger">*</span></label>
                                    <select id="{{ strtolower($label) }}" name="data_isian[{{ $field }}]"
                                        class="form-control nice-select wide" required>
                                        <option value="" disabled selected>-- Pilih {{ $label }} --</option>
                                    </select>
                                    <div class="invalid-feedback">Pilihan ini wajib diisi.</div>
                                </div>
                            @else
                                {{-- Render field lain dalam satu baris penuh --}}
                                <div class="mb-4">
                                    <label class="form-label fw-bold">{{ $label }} <span
                                            class="text-danger">*</span></label>
                                    @if ($type === 'file')
                                        <input type="file" class="form-control" name="data_isian[{{ $field }}]"
                                            required>
                                        <div class="invalid-feedback">File ini wajib diunggah.</div>
                                    @else
                                        <input type="{{ $type }}" class="form-control"
                                            name="data_isian[{{ $field }}]"
                                            value="{{ old('data_isian.' . $field) }}" required>
                                        <div class="invalid-feedback">Field ini wajib diisi.</div>
                                    @endif
                                </div>
                            @endif

                            {{-- KONDISI 3: Jika ini adalah item terakhir DAN kita masih di dalam blok alamat --}}
                            {{-- Tutup tag <div class="row"> --}}
                            @if ($loop->last && $in_address_block)
                        </div>
                        @endif
                        @endforeach

                        {{-- Bagian persetujuan dan tombol submit --}}
                        <div class="form-check mb-4 text-center">
                            <input class="form-check-input" type="checkbox" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">Saya menyatakan semua data yang diisi adalah
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
            // Wizard
            $('#btn-lanjut').click(function() {
                if (!$('#agreeTerms').is(':checked')) {
                    $('#alert-warning').removeClass('d-none');
                } else {
                    $('#alert-warning').addClass('d-none');
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
