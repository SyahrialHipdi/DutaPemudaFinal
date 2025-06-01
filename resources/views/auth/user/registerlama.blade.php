@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">User Register</div>
            <div class="card-body">
                <form method="POST" action="/user/register">
                    @csrf
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Name</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                     <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="whatsapp" class="form-label">whatsapp</label>
                        <input type="text" class="form-control" id="whatsapp " name="whatsapp" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggalLahir " name="tanggalLahir" required>
                    </div>
                    <label for="provinsi">Provinsi:</label>
                    <select class="skip-nice" id="provinsi" name="provinsi" required>
                        <option value="">-- Pilih Provinsi --</option>
                    </select class="skip-nice"><br><br>
                    <label for="kota">kota/Kabupaten:</label>
                    <select class="skip-nice" id="kota" name="kota" required>
                        <option value="">-- Pilih kota --</option>
                    </select class="skip-nice"><br><br>
                    <label for="kecamatan">kecamatan:</label>
                    <select class="skip-nice" id="kecamatan" name="kecamatan" required>
                        <option value="">-- Pilih kecamatan --</option>
                    </select class="skip-nice"><br><br>
                    <label for="desa">desa:</label>
                    <select class="skip-nice" id="desa" name="desa" required>
                        <option value="">-- Pilih desa --</option>
                    </select class="skip-nice"><br><br>
                    <div class="mb-3">
                        <label for="rt_rw" class="form-label">RT/RW</label>
                        <input type="text" class="form-control" id="rt_rw " name="rt_rw" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat " name="alamat" required>
                    </div>
                    <div class="mb-3">
                        <label for="kodePos" class="form-label">Kode Pos</label>
                        <input type="text" class="form-control" id="kodePos " name="kodePos" required>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="ktp" class="form-label">Poto KTP</label>
                        <input type="file" class="form-control" id="ktp " name="kodePos" required>
                    </div> --}}
                    <div class="mb-3">
                        <label for="proposal" class="form-label">Proposal</label>
                        <input type="text" class="form-control" id="proposal " name="proposal" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
        let a = 10;
        document.addEventListener('DOMContentLoaded', async function () {
            const provinsiSelect = document.getElementById('provinsi');
            console.log(provinsiSelect);
            const kotaSelect = document.getElementById('kota');
            const kecamatanSelect = document.getElementById('kecamatan');
            const desaSelect = document.getElementById('desa');
            
            // Ambil data provinsi
            const provinsiRes = await fetch('/provinsi');
            console.log(provinsiRes);
            const provinsiData = await provinsiRes.json();
            console.log(provinsiData);
            provinsiData.forEach(item => {
                provinsiSelect.innerHTML += `<option value="${item.code}">${item.name}</option>`;
            });

            // Event saat provinsi dipilih
            provinsiSelect.addEventListener('change', async function () {
                kotaSelect.innerHTML = '<option value="">-- Pilih Kota/Kabupaten --</option>';

                const res = await fetch(`/kota/${this.value}`);
                const data = await res.json();
                data.forEach(item => {
                    kotaSelect.innerHTML += `<option value="${item.code}">${item.name}</option>`;
                });
            });

            kotaSelect.addEventListener('change', async function () {
                kecamatanSelect.innerHTML = '<option value="">-- Pilih Kecamatan --</option>';

                const res = await fetch(`/kecamatan/${this.value}`);
                const data = await res.json();
                data.forEach(item => {
                    kecamatanSelect.innerHTML += `<option value="${item.code}">${item.name}</option>`;
                });
            });

            kecamatanSelect.addEventListener('change', async function () {
                desaSelect.innerHTML = '<option value="">-- Pilih Desa --</option>';

                const res = await fetch(`/desa/${this.value}`);
                const data = await res.json();
                data.forEach(item => {
                    desaSelect.innerHTML += `<option value="${item.code}">${item.name}</option>`;
                });
            });

            // Event saat kota dipilih
        });
    </script>
    @endpush