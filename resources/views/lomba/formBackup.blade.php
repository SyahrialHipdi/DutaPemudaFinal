{{-- <h2>Form Pendaftaran: {{ $lomba->nama_lomba }}</h2>

<form method="POST" action="{{ route('lomba.submit', $lomba->id) }}" enctype="multipart/form-data">
    @csrf

    @foreach ($lomba->syarat_lomba as $syarat)
        @php
            $parts = explode(':', $syarat);
            $field = $parts[0];
            $type = $parts[1] ?? 'text';
        @endphp

        <label>{{ ucfirst(str_replace('_', ' ', $field)) }}</label><br>

        @if ($type === 'file')
            <input type="file" name="data_isian[{{ $field }}]"><br><br>
        @else
            <input type="text" name="data_isian[{{ $field }}]" value="{{ old("data_isian.$field") }}"><br><br>
        @endif
    @endforeach

    <button type="submit">Kirim Pendaftaran</button>
</form> --}}

@extends('layouts.app')
@section('title', 'form')
@section('content')

    <section>
        {{-- start wizard syarat --}}
        <div id="wizard-step-1">
            <div class="container-fluid px-1 py-5 mx-auto">
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                        <h3 class="text-center">Syarat dan Ketentuan</h3>
                        <p class="text-muted mb-4">Pastikan Anda memahami seluruh syarat dan ketentuan yang berlaku.</p>

                        <div class="card px-lg-5 px-3" style="border-radius: 15px;">
                            <div class="card-body py-3">
                                {{-- syarat --}}
                                <ol class="mx-2">
                                    <li>
                                        warga negara indonesia yang bertaqwa kepada tuhan yang maha esa
                                    </li>
                                    <li>KTP Tangerang Selatan</li>
                                    <li>Usia 17-30.</li>
                                    <li>Berpendidikan minimal SMA/SLTA</li>
                                    <li>Belum menikah</li>
                                    <li>Surat keterangan kesehatan jasmani dan rohani dari dokter</li>
                                    <li>Telah melakukan kegiatan pengembangan masyarakat yang dibuktikan dengan laporan
                                        yang terdokumentasi dalam bentuk foto dan liputan media dan lain-lain</li>
                                    <li>Tidak merokok dan terbebas dari Narkoba</li>
                                    <li>Memiliki wawasan kebangsaan dan cinta tanah air serta pengetahuan yang luas mengenai
                                        isu-isu</li>
                                    <li>Mampu berkomunikasi efektif dan mahir menggunakan media sosial seperti : email,
                                        facebook, X dan lain-lain </li>
                                    <li>Mengetahui dan menguasai seni dan budaya terutama kesenian daerah Provinsi Banten
                                    </li>
                                    <li>Tidak Pernah terlibat dalam tindakan kriminal</li>
                                </ol>
                                <div class="form-check text-left ml-5 my-4">
                                    <input class="form-check-input" type="checkbox" id="agreeTerms">
                                    <label class="" for="agreeTerms">
                                        Saya menyetujui syarat dan ketentuan pendaftaran Duta Pemuda.
                                    </label>
                                </div>

                                <div id="alert-warning" class="alert alert-danger d-none" role="alert">
                                    Silakan centang kotak persetujuan terlebih dahulu.
                                </div>

                                <button id="btn-lanjut" class="btn" style="width: 100%">Lanjut Pendaftaran</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- end wizard syarat --}}

        {{-- start form --}}
        <div id="wizard-step-2" style="display: none">
            <div class="container-fluid px-1 py-5 mx-auto">
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                        <h3 class="text-center">Pendaftaran Pemuda Pelopor Tahun 2025</h3>
                        <p class="text-muted mb-4">Isi formulir ini dengan data yang benar dan lengkap.</p>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card px-lg-5 px-3" style="border-radius: 15px;">
                            <div class="card-body py-3 ">

                                {{-- form start --}}
                                <form method="POST" action="{{ route('lomba.submit', $lomba->id) }}" id="myForm"
                                    class="form-card mt-4 needs-validation" novalidate enctype="multipart/form-data">
                                    @csrf
                                    <div class="row justify-content-between text-left">
                                        <div class="form-group col-sm-12 flex-column d-flex">
                                            <label class="form-control-label h6 px-3">Email</label>
                                            <input class="form-control" type="text" id="email" name="email"
                                                placeholder="" required>
                                            <div class="invalid-feedback">Emaail wajib isi.</div>
                                        </div>
                                        <div class="form-group col-sm-12 flex-column d-flex">
                                            <label class="form-control-label h6 px-3">Password</label>
                                            <input class="form-control" type="password" id="password" name="password"
                                                placeholder="" required>
                                            <div class="invalid-feedback">isi password.</div>
                                        </div>
                                    </div>


                                    <div class="row justify-content-between text-left">
                                        <div class="form-group col-sm-12 flex-column d-flex">
                                            @foreach ($lomba->syarat_lomba as $syarat)
                                                @php
                                                    $parts = explode(':', $syarat);
                                                    $field = $parts[0];
                                                    $type = $parts[1] ?? 'text';
                                                @endphp

                                                <label
                                                    class="form-control-label h6 px-3">{{ ucfirst(str_replace('_', ' ', $field)) }}
                                                    <span class="text-danger">*</span>
                                                </label>

                                                @if ($type === 'file')
                                                    <input class="form-control" type="file"
                                                        name="data_isian[{{ $field }}]" required>
                                                @else
                                                    <input class="form-control" type="text"
                                                        name="data_isian[{{ $field }}]"
                                                        value="{{ old("data_isian.$field") }}" required>
                                                    <div class="invalid-feedback">Wajib diisi.</div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>

                                    {{-- <div class="row justify-content-between text-left">

                                        <div class="form-group col-sm-12 flex-column d-flex">
                                            <label class="form-control-label h6 px-3 mb-1">Tanggal Lahir<span
                                                    class="text-danger"> *</span></label>
                                            <div class="d-flex flex-sm-row gap-2">
                                                <div class="flex-fill mr-3">
                                                    <select class="form-control w-100" id="tgl_lahir_dd" name="tgl_lahir_dd"
                                                        required>
                                                        <option value="">dd</option>
                                                        @for ($i = 1; $i <= 31; $i++)
                                                            <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">
                                                                {{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                    <div class="invalid-feedback"></div>
                                                </div>

                                                <div class="flex-fill mr-3">
                                                    <select class="form-control w-100" id="tgl_lahir_mm" name="tgl_lahir_mm"
                                                        required>
                                                        <option value="">dd</option>
                                                        @for ($i = 1; $i <= 12; $i++)
                                                            <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">
                                                                {{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                                <div class="flex-fill mr-3">
                                                    <select class="form-control w-100" id="tgl_lahir_yyyy"
                                                        name="tgl_lahir_yyyy" required>
                                                        <option value="">dd</option>
                                                        @for ($i = 1990; $i <= date('Y'); $i++)
                                                            <option value="{{ $i }}">{{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                    {{-- <div class="row justify-content-between text-left">
                                        <div class="form-group col-sm-6 flex-column d-flex">
                                            <label class="form-control-label h6 px-3">Provinsi<span class="text-danger">
                                                    *</span></label>
                                            <select class="form-control w-100" id="provinsi" name="provinsi" required>
                                                <option value="">--Pilih Provinsi--</option>
                                            </select>
                                            <div class="invalid-feedback">Wajib diisi.</div>
                                        </div>
                                        <div class="form-group col-sm-6 flex-column d-flex">
                                            <label class="form-control-label h6 px-3">Kabupaten/Kota<span
                                                    class="text-danger">
                                                    *</span></label>
                                            <select class="form-control w-100" id="kota" name="kota" required>
                                                <option value="">--Pilih Kota--</option>
                                            </select>
                                            <div class="invalid-feedback">Wajib diisi.</div>
                                        </div>
                                        <div class="form-group col-sm-12 flex-column d-flex">
                                            <label class="form-control-label h6 px-3">Kode Pos<span class="text-danger">
                                                    *</span></label>
                                            <input class="form-control" type="text" id="kodePos" name="kodePos"
                                                required>
                                            <div class="invalid-feedback">Wajib diisi.</div>
                                        </div>

                                    </div> --}}


                                    {{-- <div class="row justify-content-between text-left">
                                        <div class="form-group col-sm-12 flex-column d-flex">
                                            <label class="form-control-label h6 px-3">Upload foto KTP <small>(max
                                                    200kb)</small><span class="text-danger">
                                                    *</span></label>
                                            <input class="form-control" type="file" id="foto_ktp" name="foto_ktp"
                                                placeholder="" required>
                                            <div class="invalid-feedback">Wajib upload foto KTP.</div>
                                        </div>
                                    </div> --}}


                                    {{-- <div class="form-check mt-3">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck"
                                            required>
                                        <label class="">Saya menyatakan bahwa seluruh data yang saya
                                            isi
                                            adalah benar.</label>
                                    </div> --}}

                                    <div class="form-check text-left ml-5 my-4">
                                        <input name="cek" class="form-check-input" type="checkbox" id="invalidCheck"
                                            required>
                                        <label class="">
                                            Saya menyatakan bahwa seluruh data yang saya isi adalah benar.
                                        </label>
                                    </div>
                            </div>
                            <div id="alert-warning-2" class="alert alert-danger d-none" role="alert">
                                Silakan lengkapi data anda.
                            </div>
                            <div class="row justify-content-end">
                                <div class="form-group col-sm-12 button">
                                    <button type="submit" class="btn" style="width: 100%">Kirim</button>
                                </div>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end form --}}
    </section>

    @push('scripts')
        <script>
            $(document).ready(function() {
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
                    const checkBox = document.getElementById("invalidCheck");
                    let isValid = form.checkValidity();

                    // Tampilkan alert jika form tidak valid atau checkbox tidak dicentang
                    if (!isValid || !checkBox.checked) {
                        $('#alert-warning-2').removeClass('d-none');
                    } else {
                        $('#alert-warning-2').addClass('d-none');
                    }

                    // Jika checkbox tidak dicentang, tambahkan pesan khusus
                    if (!checkBox.checked) {
                        $('#alert-warning-2').text("Silakan centang kotak persetujuan dan lengkapi data Anda.");
                    } else if (!isValid) {
                        $('#alert-warning-2').text("Silakan lengkapi data Anda.");
                    }

                    if (isValid && checkBox.checked) {
                        form.submit();
                    } else {
                        form.classList.add('was-validated');
                    }
                });
            });
        </script>

        {{-- <script>
            document.addEventListener('DOMContentLoaded', async function() {
                const provinsiSelect = document.getElementById('provinsi');
                const kotaSelect = document.getElementById('kota');
                const kecamatanSelect = document.getElementById('kecamatan');
                const desaSelect = document.getElementById('desa');

                // Fungsi untuk refresh NiceSelect
                function refreshNiceSelect(selectElement) {
                    const $select = $(selectElement);

                    // Method 1: Update NiceSelect (jika support)
                    if (typeof $select.niceSelect === 'function') {
                        try {
                            // Coba destroy dulu
                            $select.niceSelect('destroy');

                            // Inisialisasi ulang
                            $select.niceSelect();

                            console.log('NiceSelect refreshed for:', selectElement.id);
                        } catch (error) {
                            console.log('NiceSelect refresh error:', error);

                            // Fallback: Manual refresh
                            manualRefreshNiceSelect(selectElement);
                        }
                    } else {
                        manualRefreshNiceSelect(selectElement);
                    }
                }

                // Fungsi manual refresh untuk NiceSelect
                function manualRefreshNiceSelect(selectElement) {
                    const $select = $(selectElement);
                    const $niceSelect = $select.next('.nice-select');

                    if ($niceSelect.length > 0) {
                        // Hapus nice-select yang lama
                        $niceSelect.remove();

                        // Show select asli sementara
                        $select.show();

                        // Inisialisasi ulang NiceSelect
                        $select.niceSelect();

                        console.log('Manual refresh NiceSelect for:', selectElement.id);
                    }
                }

                try {
                    console.log('Mulai mengambil data provinsi...');

                    const provinsiRes = await fetch('/provinsi');

                    if (!provinsiRes.ok) {
                        throw new Error(`HTTP error! status: ${provinsiRes.status}`);
                    }

                    const provinsiData = await provinsiRes.json();
                    console.log('Data provinsi:', provinsiData);

                    // Clear dan update options provinsi
                    provinsiSelect.innerHTML = '<option value="">--Pilih Provinsi--</option>';

                    if (Array.isArray(provinsiData) && provinsiData.length > 0) {
                        provinsiData.forEach(item => {
                            provinsiSelect.innerHTML +=
                                `<option value="${item.code}">${item.name}</option>`;
                        });

                        console.log('Options ditambahkan, sekarang refresh NiceSelect...');

                        // PENTING: Refresh NiceSelect setelah update options
                        refreshNiceSelect(provinsiSelect);

                        console.log('Berhasil load', provinsiData.length, 'provinsi dan refresh NiceSelect');
                    }

                } catch (error) {
                    console.error('❌ Error saat mengambil data provinsi:', error);
                    provinsiSelect.innerHTML = '<option value="">Error: Gagal memuat provinsi</option>';
                    refreshNiceSelect(provinsiSelect);
                }

                // Event handler untuk provinsi
                $(provinsiSelect).on('change', async function() {
                    const selectedValue = this.value;
                    console.log('Provinsi dipilih:', selectedValue);

                    if (!selectedValue) {
                        // Reset semua dropdown di bawahnya
                        kotaSelect.innerHTML = '<option value="">--Pilih Kota--</option>';
                        kecamatanSelect.innerHTML = '<option value="">--Pilih Kecamatan--</option>';
                        desaSelect.innerHTML = '<option value="">--Pilih Desa--</option>';

                        refreshNiceSelect(kotaSelect);
                        refreshNiceSelect(kecamatanSelect);
                        refreshNiceSelect(desaSelect);
                        return;
                    }

                    try {
                        refreshNiceSelect(kotaSelect);

                        const res = await fetch(`/kota/${selectedValue}`);

                        if (!res.ok) {
                            throw new Error(`HTTP error! status: ${res.status}`);
                        }

                        const data = await res.json();
                        console.log('Data kota:', data);

                        // Update kota options
                        kotaSelect.innerHTML = '<option value="">--Pilih Kota--</option>';

                        if (Array.isArray(data) && data.length > 0) {
                            data.forEach(item => {
                                kotaSelect.innerHTML +=
                                    `<option value="${item.code}">${item.name}</option>`;
                            });
                        } else {
                            kotaSelect.innerHTML = '<option value="">Tidak ada kota tersedia</option>';
                        }

                        refreshNiceSelect(kotaSelect);

                        // Reset dropdown di bawahnya
                        kecamatanSelect.innerHTML = '<option value="">--Pilih Kecamatan--</option>';
                        desaSelect.innerHTML = '<option value="">--Pilih Desa--</option>';
                        refreshNiceSelect(kecamatanSelect);
                        refreshNiceSelect(desaSelect);

                    } catch (error) {
                        console.error('❌ Error saat mengambil data kota:', error);
                        kotaSelect.innerHTML = '<option value="">Error: Gagal memuat kota</option>';
                        refreshNiceSelect(kotaSelect);
                    }
                });

                // Event handler untuk kota
                $(kotaSelect).on('change', async function() {
                    const selectedValue = this.value;
                    console.log('Kota dipilih:', selectedValue);

                    if (!selectedValue) {
                        kecamatanSelect.innerHTML = '<option value="">--Pilih Kecamatan--</option>';
                        desaSelect.innerHTML = '<option value="">--Pilih Desa--</option>';
                        refreshNiceSelect(kecamatanSelect);
                        refreshNiceSelect(desaSelect);
                        return;
                    }

                    try {
                        refreshNiceSelect(kecamatanSelect);

                        const res = await fetch(`/kecamatan/${selectedValue}`);

                        if (!res.ok) {
                            throw new Error(`HTTP error! status: ${res.status}`);
                        }

                        const data = await res.json();
                        console.log('Data kecamatan:', data);

                        kecamatanSelect.innerHTML = '<option value="">--Pilih Kecamatan--</option>';

                        if (Array.isArray(data) && data.length > 0) {
                            data.forEach(item => {
                                kecamatanSelect.innerHTML +=
                                    `<option value="${item.code}">${item.name}</option>`;
                            });
                        } else {
                            kecamatanSelect.innerHTML =
                                '<option value="">Tidak ada kecamatan tersedia</option>';
                        }

                        refreshNiceSelect(kecamatanSelect);

                        // Reset desa
                        desaSelect.innerHTML = '<option value="">--Pilih Desa--</option>';
                        refreshNiceSelect(desaSelect);

                    } catch (error) {
                        console.error('❌ Error saat mengambil data kecamatan:', error);
                        kecamatanSelect.innerHTML =
                            '<option value="">Error: Gagal memuat kecamatan</option>';
                        refreshNiceSelect(kecamatanSelect);
                    }
                });

                // Event handler untuk kecamatan
                $(kecamatanSelect).on('change', async function() {
                    const selectedValue = this.value;
                    console.log('Kecamatan dipilih:', selectedValue);

                    if (!selectedValue) {
                        desaSelect.innerHTML = '<option value="">--Pilih Desa--</option>';
                        refreshNiceSelect(desaSelect);
                        return;
                    }

                    try {
                        refreshNiceSelect(desaSelect);

                        const res = await fetch(`/desa/${selectedValue}`);

                        if (!res.ok) {
                            throw new Error(`HTTP error! status: ${res.status}`);
                        }

                        const data = await res.json();
                        console.log('Data desa:', data);

                        desaSelect.innerHTML = '<option value="">--Pilih Desa--</option>';

                        if (Array.isArray(data) && data.length > 0) {
                            data.forEach(item => {
                                desaSelect.innerHTML +=
                                    `<option value="${item.code}">${item.name}</option>`;
                            });
                        } else {
                            desaSelect.innerHTML = '<option value="">Tidak ada desa tersedia</option>';
                        }

                        refreshNiceSelect(desaSelect);

                    } catch (error) {
                        console.error('❌ Error saat mengambil data desa:', error);
                        desaSelect.innerHTML = '<option value="">Error: Gagal memuat desa</option>';
                        refreshNiceSelect(desaSelect);
                    }
                });
            });

            // Pastikan ini dijalankan setelah NiceSelect diinisialisasi
            $(document).ready(function() {
                // Delay sedikit untuk memastikan semua elemen sudah siap
                setTimeout(function() {
                    console.log('Dokumen ready, trigger load provinsi...');

                    // Trigger event load provinsi jika diperlukan
                    // atau panggil fungsi load provinsi di sini

                }, 100);
            });
        </script> --}}
    @endpush
@endsection
