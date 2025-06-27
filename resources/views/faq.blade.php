@extends('layouts.app')
@section('title', 'FAQ - Frequently Asked Questions')
@section('content')

    <section class="py-5" id="faq">
        <div class="container">
            <div class="mb-5">
                <h2 class="fw-bold text-start">Frequently Asked Questions (FAQ)</h2>
                <p class="text-muted text-start">Temukan jawaban atas pertanyaan umum seputar platform ini.</p>
            </div>

            <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq1-heading">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1"
                            aria-expanded="true" aria-controls="faq1">
                            Apa itu platform ini?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" aria-labelledby="faq1-heading"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Platform ini digunakan untuk pendaftaran lomba, manajemen peserta, dan penilaian lomba secara
                            online.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq2-heading">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                            Bagaimana cara mendaftar akun?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" aria-labelledby="faq2-heading"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Klik tombol "Daftar" di halaman utama, lalu isi formulir dengan data yang benar dan lengkap.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq3-heading">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                            Apakah saya bisa mengubah data setelah mendaftar?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" aria-labelledby="faq3-heading"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Ya, kamu bisa mengedit data melalui halaman dashboard selama periode pendaftaran masih dibuka.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq4-heading">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4">
                            Bagaimana cara mengikuti lomba?
                        </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse" aria-labelledby="faq4-heading"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Setelah login, pilih lomba yang tersedia, isi formulir pendaftaran, dan unggah berkas yang
                            diminta.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq5-heading">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq5" aria-expanded="false" aria-controls="faq5">
                            Siapa yang bisa saya hubungi jika mengalami kendala?
                        </button>
                    </h2>
                    <div id="faq5" class="accordion-collapse collapse" aria-labelledby="faq5-heading"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Kamu bisa menghubungi tim panitia melalui kontak yang tersedia di halaman “Hubungi Kami”.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection