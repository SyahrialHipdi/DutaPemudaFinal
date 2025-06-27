{{-- Menampilkan error validasi jika ada --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label for="nama_lomba">Nama Lomba</label>
            <input type="text" id="nama_lomba" name="nama_lomba" class="form-control"
                placeholder="Contoh: Pemuda Pelopor" value="{{ old('nama_lomba', $lomba->nama_lomba ?? '') }}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="tahun">Tahun Pelaksanaan</label>
            <input type="number" id="tahun" name="tahun" class="form-control" placeholder="Contoh: 2025"
                value="{{ old('tahun', $lomba->tahun ?? date('Y')) }}" required>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="deskripsi">Deskripsi Singkat Lomba</label>
    <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3"
        placeholder="Jelaskan secara singkat mengenai lomba ini">{{ old('deskripsi', $lomba->deskripsi ?? '') }}</textarea>
</div>

<hr>

{{-- Bagian Dinamis Syarat Pendaftaran --}}
<div class="card card-outline card-info">
    <div class="card-header">
        <h3 class="card-title">Syarat Pendaftaran Peserta</h3>
    </div>
    <div class="card-body">
        <div id="syarat-container">
            @php
                $syarat_lomba = old('syarat_lomba', $lomba->syarat_lomba ?? []);
            @endphp
            @forelse ($syarat_lomba as $index => $item)
                @php
                    $parts = explode(':', $item);
                    $field = $parts[0] ?? '';
                    $type = $parts[1] ?? 'text';
                @endphp
                <div class="row syarat-item mb-2">
                    <div class="col-md-5">
                        <input type="text" name="syarat_lomba[{{ $index }}][field]"
                            placeholder="Nama Field (Contoh: Nama Lengkap)" class="form-control"
                            value="{{ $field }}">
                    </div>
                    <div class="col-md-5">
                        <select name="syarat_lomba[{{ $index }}][type]" class="form-control">
                            <option value="text" {{ $type == 'text' ? 'selected' : '' }}>Teks Singkat</option>
                            <option value="number" {{ $type == 'number' ? 'selected' : '' }}>Angka</option>
                            <option value="file" {{ $type == 'file' ? 'selected' : '' }}>Upload File</option>
                            <option value="textarea" {{ $type == 'textarea' ? 'selected' : '' }}>Teks Panjang
                                (Textarea)
                            </option>
                            <option value="email" {{ $type == 'email' ? 'selected' : '' }}>Email</option>
                            <option value="date" {{ $type == 'date' ? 'selected' : '' }}>Tanggal</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-xl btn-danger btn-block" onclick="removeElement(this)"><i
                                class="fas fa-trash"></i> Hapus</button>
                    </div>
                </div>
            @empty
                {{-- Kosongkan agar bisa ditambah dari awal --}}
            @endforelse
        </div>
        <button type="button" class="btn btn-success mt-2" onclick="addSyarat()">
            <i class="fas fa-plus-circle"></i> Tambah Syarat Pendaftaran
        </button>
    </div>
</div>

{{-- Bagian Dinamis Komponen Penilaian --}}
<div class="card card-outline card-warning mt-4">
    <div class="card-header">
        <h3 class="card-title">Komponen Penilaian Juri</h3>
    </div>
    <div class="card-body">
        <div id="komponen-container">
            @php
                $komponen_penilaian = old('komponen_penilaian', $lomba->komponen_penilaian ?? []);
            @endphp
            @forelse ($komponen_penilaian as $item)
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-tasks"></i></span>
                    </div>
                    <input type="text" name="komponen_penilaian[]" class="form-control"
                        placeholder="Contoh: Public Speaking" value="{{ $item }}">
                    <div class="input-group-append">
                        <button type="button"
                            class="btn btn-sm btn-outline-danger input-group-text btn-remove-komponen"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
            @empty
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-tasks"></i></span>
                    </div>
                    <input type="text" name="komponen_penilaian[]" class="form-control"
                        placeholder="Contoh: Public Speaking">
                    <div class="input-group-append">
                        <button type="button"
                            class="btn btn-sm btn-outline-danger input-group-text btn-remove-komponen"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
            @endforelse
        </div>
        <button type="button" class="btn btn-info mt-2 btn-add-komponen">
            <i class="fas fa-plus-circle"></i> Tambah Komponen Penilaian
        </button>
    </div>
</div>


@push('scripts')
    <script>
        // Inisialisasi index untuk item baru, berdasarkan jumlah item yang sudah ada
        let syaratIndex = {{ count($syarat_lomba) }};

        function addSyarat() {
            const container = document.getElementById('syarat-container');
            const div = document.createElement('div');
            div.className = 'row syarat-item mb-2';

            div.innerHTML = `
            <div class="col-md-5">
                <input type="text" name="syarat_lomba[${syaratIndex}][field]" placeholder="Nama Field Baru" class="form-control" required>
            </div>
            <div class="col-md-5">
                <select name="syarat_lomba[${syaratIndex}][type]" class="form-control">
                    <option value="text">Teks Singkat</option>
                    <option value="number">Angka</option>
                    <option value="file">Upload File</option>
                    <option value="textarea">Teks Panjang (Textarea)</option>
                    <option value="email">Email</option>
                    <option value="date">Tanggal</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-md btn-danger btn-block" onclick="removeElement(this)"><i class="fas fa-trash"></i> Hapus</button>
            </div>
        `;

            container.appendChild(div);
            syaratIndex++;
        }

        // Fungsi umum untuk menghapus parent dari tombol
        function removeElement(button) {
            button.closest('.syarat-item').remove();
        }

        // Menggunakan JQuery untuk komponen penilaian agar lebih ringkas
        $(document).ready(function() {
            $('.btn-add-komponen').on('click', function() {
                const container = $('#komponen-container');
                const newItem = `
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-tasks"></i></span>
                    </div>
                    <input type="text" name="komponen_penilaian[]" class="form-control" placeholder="Nama Komponen Baru" required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-sm btn-outline-danger input-group-text btn-remove-komponen"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            `;
                container.append(newItem);
            });

            // Event delegation untuk tombol hapus yang dibuat secara dinamis
            $('#komponen-container').on('click', '.btn-remove-komponen', function() {
                $(this).closest('.input-group').remove();
            });
        });
    </script>
@endpush
