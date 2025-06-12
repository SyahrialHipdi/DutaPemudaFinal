@extends('layouts.app')
@section('title', 'form')
@section('content')

    {{-- <div id="wizard-step-1"> --}}
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
                        <form action="/user/pendaftaran" method="post">
                            @csrf
                            <div class="form-check text-left ml-3 my-4">
                                <input class="form-check-input" type="checkbox" id="agreeTerms" name="cek"
                                    value="1">
                                <label class="form-check-label" for="agreeTerms">
                                    Saya menyetujui syarat dan ketentuan pendaftaran Duta Pemuda.
                                </label>
                            </div>

                            <div id="alert-warning" class="alert alert-danger d-none" role="alert">
                                Silakan centang kotak persetujuan terlebih dahulu.
                            </div>

                            @error('cek')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                            <button id="btn-lanjut" class="btn" style="width: 100%" type="submit">Lanjut
                                Pendaftaran</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
