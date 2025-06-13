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

                            <div class="form-check text-left ml-4 my-4">
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
                <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                    <h3 class="text-center">Formulir Pendaftaran Duta Pemuda 2025</h3>
                    <p class="text-muted mb-4">Isi formulir ini dengan data yang benar dan lengkap.</p>

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
                            <form method="POST" action="{{ route('lomba.submit', $lomba->id) }}" id="myForm" enctype="multipart/form-data" novalidate>
                                @csrf

                                {{-- Email dan Password --}}
                                <div class="mb-3 text-start">
                                    <label class="form-label h6">Email</label>
                                    <input class="form-control" type="email" name="email" required>
                                    <div class="invalid-feedback">Email wajib diisi.</div>
                                </div>
                                <div class="mb-3 text-start">
                                    <label class="form-label h6">Password</label>
                                    <input class="form-control" type="password" name="password" required>
                                    <div class="invalid-feedback">Password wajib diisi.</div>
                                </div>

                                {{-- Data Isian Dinamis --}}
                                @foreach ($lomba->syarat_lomba as $syarat)
                                    @php
                                        $parts = explode(':', $syarat);
                                        $field = $parts[0];
                                        $type = $parts[1] ?? 'text';
                                        $label = ucfirst(str_replace('_', ' ', $field));
                                        $alamatFields = ['Provinsi', 'Kota', 'Kecamatan', 'Desa'];
                                    @endphp

                                    <div class="mb-3 text-start">
                                        <label class="form-label h6">{{ $label }} <span class="text-danger">*</span></label>

                                        @if (in_array($field, $alamatFields))
                                            <select id="{{ strtolower($field) }}" name="data_isian[{{ $field }}]" class="form-select nice-select" required>
                                                <option value="">-- Pilih {{ $label }} --</option>
                                            </select>
                                        @elseif ($type === 'file')
                                            <input type="file" class="form-control" name="data_isian[{{ $field }}]" required>
                                        @else
                                            <input type="{{ $type }}" class="form-control" name="data_isian[{{ $field }}]" required>
                                        @endif
                                    </div>
                                @endforeach

                                {{-- Persetujuan --}}
                                <div class="form-check text-left ml-2 mb-4">
                                    <input class="form-check-input" type="checkbox" id="invalidCheck" required>
                                    <label class="form-check-label">
                                        Saya menyatakan bahwa seluruh data yang saya isi adalah benar.
                                    </label>
                                </div>

                                <div id="alert-warning-2" class="alert alert-danger d-none" role="alert">
                                    Silakan lengkapi data anda.
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary w-100">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" />
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
<script>
$(document).ready(function () {
    // Wizard
    $('#btn-lanjut').click(function () {
        if (!$('#agreeTerms').is(':checked')) {
            $('#alert-warning').removeClass('d-none');
        } else {
            $('#alert-warning').addClass('d-none');
            $('#wizard-step-1').hide();
            $('#wizard-step-2').show();
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });

    $('#myForm').on('submit', function (event) {
        event.preventDefault();
        let form = this;
        const isValid = form.checkValidity();
        const checked = $('#invalidCheck').is(':checked');

        if (!isValid || !checked) {
            $('#alert-warning-2').removeClass('d-none').text(
                checked ? "Silakan lengkapi data Anda." : "Silakan centang kotak persetujuan dan lengkapi data Anda."
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
    $.get('/provinsi', function (data) {
        let options = '<option value="">-- Pilih Provinsi --</option>';
        data.forEach(prov => options += `<option value="${prov.code}">${prov.name}</option>`);
        $('#provinsi').html(options);
        refreshSelect('#provinsi');
    });

    // Event Change
    $('#provinsi').change(function () {
        const kode = $(this).val();
        $('#kota, #kecamatan, #desa').html('<option value="">-- Pilih --</option>');
        refreshSelect('#kota'); refreshSelect('#kecamatan'); refreshSelect('#desa');

        if (!kode) return;
        $.get(`/kota/${kode}`, function (data) {
            let options = '<option value="">-- Pilih Kota --</option>';
            data.forEach(item => options += `<option value="${item.code}">${item.name}</option>`);
            $('#kota').html(options); refreshSelect('#kota');
        });
    });

    $('#kota').change(function () {
        const kode = $(this).val();
        $('#kecamatan, #desa').html('<option value="">-- Pilih --</option>');
        refreshSelect('#kecamatan'); refreshSelect('#desa');

        if (!kode) return;
        $.get(`/kecamatan/${kode}`, function (data) {
            let options = '<option value="">-- Pilih Kecamatan --</option>';
            data.forEach(item => options += `<option value="${item.code}">${item.name}</option>`);
            $('#kecamatan').html(options); refreshSelect('#kecamatan');
        });
    });

    $('#kecamatan').change(function () {
        const kode = $(this).val();
        $('#desa').html('<option value="">-- Pilih Desa --</option>');
        refreshSelect('#desa');

        if (!kode) return;
        $.get(`/desa/${kode}`, function (data) {
            let options = '<option value="">-- Pilih Desa --</option>';
            data.forEach(item => options += `<option value="${item.code}">${item.name}</option>`);
            $('#desa').html(options); refreshSelect('#desa');
        });
    });
});
</script>
@endpush
