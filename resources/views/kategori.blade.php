@extends('layouts.app')
@section('title')
@section('content')


    {{-- start ketegori --}}
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <div class="card px-lg-5 px-3" style="border-radius: 15px;">
                    <div class="card-body py-4 text-left">
                        <h2 class="text-center">Pilih Kategori</h2>
                        <h6 class="text-muted text-center mb-5">Pilih program yang kamu inginkan.</h6>
                        {{-- kolom kategori --}}
                        <div class="mx-lg-5 mx-md-3 mx-1">
                            
                            <a href="{{route('auth.user.registerPP')}}">
                            <div class="program-item mb-5 d-flex flex-row align-items-center">
                                <img src="img/logo_ppan.png" alt="" width="52px" class="mr-3">
                                <h6>Pemuda Pelopor (PP)</h6>
                            </div>
                            </a>

                            <a href="{{route('auth.user.registerPPAP')}}">
                            <div class="program-item mb-5 d-flex flex-row align-items-center">
                                <img src="img/logo_ppan.png" alt="" width="52px" class="mr-3">
                                <h6>Pertukaran Pemuda Antar Provinsi (PPAP)</h6>
                            </div>
                            </a>
                            
                            <a href="{{route('auth.user.registerPPAP')}}">
                            <div class="program-item mb-5 d-flex flex-row align-items-center">
                                <img src="img/logo_ppan.png" alt="" width="52px" class="mr-3">
                                <h6>Pertukaran Pemuda Antar Negara (PPAN)</h6>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
