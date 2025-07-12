@extends('layouts.app')
@section('title', 'FAQ - Frequently Asked Questions')
@section('content')

    <section class="py-5" id="faq">
        <div class="container">
            <div class="mb-5">
                <h2 class="font-weight-bold text-left">Frequently Asked Questions (FAQ)</h2>
                <p class="text-muted text-left">Temukan jawaban atas pertanyaan umum seputar platform ini.</p>
            </div>

            <div id="faqAccordion" role="tablist" aria-multiselectable="true">
                {{-- FAQ 1 --}}
                <div class="card">
                    <div class="card-header" role="tab" id="faq1-heading">
                        <h5 class="mb-0">
                            <a data-toggle="collapse" href="#faq1" aria-expanded="true" aria-controls="faq1">
                                Apa itu platform ini?
                            </a>
                        </h5>
                    </div>
                    <div id="faq1" class="collapse show" role="tabpanel" aria-labelledby="faq1-heading"
                        data-parent="#faqAccordion">
                        {{-- Diubah menjadi card-block --}}
                        <div class="card-block">
                            Platform ini digunakan untuk pendaftaran lomba, manajemen peserta, dan penilaian lomba secara
                            online.
                        </div>
                    </div>
                </div>

                {{-- FAQ 2 --}}
                <div class="card">
                    <div class="card-header" role="tab" id="faq2-heading">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#faq2" aria-expanded="false"
                                aria-controls="faq2">
                                Bagaimana cara mendaftar akun?
                            </a>
                        </h5>
                    </div>
                    <div id="faq2" class="collapse" role="tabpanel" aria-labelledby="faq2-heading"
                        data-parent="#faqAccordion">
                         {{-- Diubah menjadi card-block --}}
                        <div class="card-block">
                            Klik tombol "Daftar" di halaman utama, lalu isi formulir dengan data yang benar dan lengkap.
                        </div>
                    </div>
                </div>

                {{-- FAQ 3 --}}
                <div class="card">
                    <div class="card-header" role="tab" id="faq3-heading">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#faq3" aria-expanded="false"
                                aria-controls="faq3">
                                Apakah saya bisa mengubah data setelah mendaftar?
                            </a>
                        </h5>
                    </div>
                    <div id="faq3" class="collapse" role="tabpanel" aria-labelledby="faq3-heading"
                        data-parent="#faqAccordion">
                         {{-- Diubah menjadi card-block --}}
                        <div class="card-block">
                            Ya, kamu bisa mengedit data melalui halaman dashboard selama periode pendaftaran masih dibuka.
                        </div>
                    </div>
                </div>

                {{-- FAQ 4 --}}
                <div class="card">
                    <div class="card-header" role="tab" id="faq4-heading">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#faq4" aria-expanded="false"
                                aria-controls="faq4">
                                Bagaimana cara mengikuti lomba?
                            </a>
                        </h5>
                    </div>
                    <div id="faq4" class="collapse" role="tabpanel" aria-labelledby="faq4-heading"
                        data-parent="#faqAccordion">
                         {{-- Diubah menjadi card-block --}}
                        <div class="card-block">
                            Setelah login, pilih lomba yang tersedia, isi formulir pendaftaran, dan unggah berkas yang
                            diminta.
                        </div>
                    </div>
                </div>

                {{-- FAQ 5 --}}
                <div class="card">
                    <div class="card-header" role="tab" id="faq5-heading">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#faq5" aria-expanded="false"
                                aria-controls="faq5">
                                Siapa yang bisa saya hubungi jika mengalami kendala?
                            </a>
                        </h5>
                    </div>
                    <div id="faq5" class="collapse" role="tabpanel" aria-labelledby="faq5-heading"
                        data-parent="#faqAccordion">
                         {{-- Diubah menjadi card-block --}}
                        <div class="card-block">
                            Kamu bisa menghubungi tim panitia melalui kontak yang tersedia di halaman “Hubungi Kami”.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection