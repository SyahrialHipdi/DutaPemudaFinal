@csrf

{{-- Nama Lomba --}}
<div class="form-group">
    <label for="nama_lomba">Nama Lomba</label>
    <input type="text" id="nama_lomba" name="nama_lomba" class="form-control"
        value="{{ old('nama_lomba', $lomba->nama_lomba ?? '') }}">
</div>

{{-- Tahun --}}
<div class="form-group">
    <label for="tahun">Tahun</label>
    <input type="number" id="tahun" name="tahun" class="form-control" value="{{ old('tahun', $lomba->tahun ?? '') }}">
</div>

{{-- Deskripsi --}}
<div class="form-group">
    <label for="deskripsi">Deskripsi</label>
    <textarea id="deskripsi" name="deskripsi" class="form-control"
        rows="4">{{ old('deskripsi', $lomba->deskripsi ?? '') }}</textarea>
</div>

{{-- Syarat Lomba (Dynamic Section) --}}
<div class="form-group">
    <label>Syarat Lomba</label>

    <div id="syarat-container">
        @php
            $syarat = old('syarat_lomba', $lomba->syarat_lomba ?? []);
        @endphp
        @foreach ($syarat as $index => $item)
            @php
                $parts = explode(':', $item);
                $field = $parts[0] ?? '';
                $type = $parts[1] ?? 'text';
            @endphp
            <div class="row syarat-item" style="margin-bottom: 10px;">
                <div class="col-md-5">
                    <input type="text" name="syarat_lomba[{{ $index }}][field]" placeholder="Contoh: Nama Lengkap"
                        class="form-control" value="{{ $field }}">
                </div>
                <div class="col-md-4">
                    <select name="syarat_lomba[{{ $index }}][type]" class="form-control">
                        <option value="text" {{ $type == 'text' ? 'selected' : '' }}>Text</option>
                        <option value="number" {{ $type == 'number' ? 'selected' : '' }}>Number</option>
                        <option value="file" {{ $type == 'file' ? 'selected' : '' }}>File</option>
                        <option value="textarea" {{ $type == 'textarea' ? 'selected' : '' }}>Textarea</option>
                        <option value="email" {{ $type == 'email' ? 'selected' : '' }}>Email</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeSyarat(this)">Hapus</button>
                </div>
            </div>
        @endforeach
    </div>
    <button type="button" class="btn btn-success btn-sm mt-2" onclick="addSyarat()">
        <i class="fa fa-plus"></i> Tambah Syarat
    </button>


    <div class="form-group">
        <label class="form-label">Komponen Penilaian</label>
        <div id="komponen-container">
            @php
                $nilai = old('komponen_penilaian', $lomba->komponen_penilaian ?? []);
            @endphp

            @forelse ($nilai as $item)
                <div class="input-group mb-2">
                    <input type="text" name="komponen_penilaian[]" class="form-control"
                        placeholder="Contoh: Public Speaking" value="{{ $item }}">
                    <button type="button" class="btn btn-danger btn-remove-komponen">- Hapus</button>
                </div>
            @empty
                <div class="input-group mb-2">
                    <input type="text" name="komponen_penilaian[]" class="form-control"
                        placeholder="Contoh: Public Speaking">
                    <button type="button" class="btn btn-danger btn-remove-komponen">- Hapus</button>
                </div>
            @endforelse
        </div>

        <button type="button" class="btn btn-add-komponen btn-primary">
            + Tambah Komponen
        </button>
    </div>


</div>

<hr>

<div class="form-group mt-4">
    <button class="btn btn-primary" type="submit">Simpan Lomba</button>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let syaratIndex = {{ count($syarat) }};

    function addSyarat() {
        const container = document.getElementById('syarat-container');
        const div = document.createElement('div');
        div.className = 'row syarat-item'; // Menggunakan class 'row' untuk grid
        div.style.marginBottom = '10px';

        // HTML baru yang sudah diberi kelas Bootstrap
        div.innerHTML = `
            <div class="col-md-5">
                <input type="text" name="syarat_lomba[${syaratIndex}][field]" placeholder="Nama Field Baru" class="form-control">
            </div>
            <div class="col-md-4">
                <select name="syarat_lomba[${syaratIndex}][type]" class="form-control">
                    <option value="text">Text</option>
                    <option value="number">Number</option>
                    <option value="file">File</option>
                    <option value="textarea">Textarea</option>
                    <option value="email">Email</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-danger btn-sm" onclick="removeSyarat(this)">Hapus</button>
            </div>
        `;

        container.appendChild(div);
        syaratIndex++;
    }

    function removeSyarat(button) {
        // Karena sekarang dibungkus oleh div kolom, kita perlu menghapus parent dari parent-nya (yaitu .row)
        button.parentElement.parentElement.remove();
    }

    $(document).ready(function () {
        // Tambah komponen penilaian
        $(document).on('click', '.btn-add-komponen', function () {
            $('#komponen-container').append(`
                <div class="input-group mb-2">
                    <input type="text" name="komponen_penilaian[]" class="form-control" placeholder="Contoh: Public Speaking" required>
                    <button type="button" class="btn btn-danger btn-remove-komponen">- hapus</button>
                </div>
            `);
        });

        // Hapus komponen penilaian
        $(document).on('click', '.btn-remove-komponen', function () {
            $(this).closest('.input-group').remove();
        });
    });
</script>