    @csrf

    <div>
        <label>Nama Lomba</label><br>
        <input type="text" name="nama_lomba" value="{{ old('nama_lomba', $lomba->nama_lomba ?? '') }}">
    </div>

    <div>
        <label>Tahun</label><br>
        <input type="number" name="tahun" value="{{ old('tahun', $lomba->tahun ?? '') }}">
    </div>

    <div>
        <label>Deskripsi</label><br>
        <textarea name="deskripsi">{{ old('deskripsi', $lomba->deskripsi ?? '') }}</textarea>
    </div>

<<<<<<< Updated upstream
    <div>
        <label>Syarat Lomba</label><br>
        {{-- <div id="syarat-container">
            @php
                $syarat = old('syarat_lomba', $lomba->syarat_lomba ?? []);
            @endphp
            @foreach ($syarat as $s)
            <input type="text" name="syarat_lomba[]" value="{{ $s }}"><br>
            @endforeach
            <input type="text" name="syarat_lomba[]" placeholder="Tambah syarat">
        </div> --}}
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
        <div class="syarat-item" style="margin-bottom: 10px;">
            <input type="text" name="syarat_lomba[{{ $index }}][field]" placeholder="Nama Field" value="{{ $field }}">
            <select name="syarat_lomba[{{ $index }}][type]">
                <option value="text" {{ $type == 'text' ? 'selected' : '' }}>Text</option>
                <option value="number" {{ $type == 'number' ? 'selected' : '' }}>Number</option>
                <option value="file" {{ $type == 'file' ? 'selected' : '' }}>File</option>
                <option value="textarea" {{ $type == 'textarea' ? 'selected' : '' }}>Textarea</option>
                <option value="email" {{ $type == 'email' ? 'selected' : '' }}>Email</option>
            </select>
            <button type="button" onclick="removeSyarat(this)">Hapus</button>
        </div>
    @endforeach

    {{-- Untuk input baru (tanpa index tetap) --}}
    {{-- <div class="syarat-item" style="margin-bottom: 10px;">
        <input type="text" name="syarat_lomba[new][field]" placeholder="Nama Field">
        <select name="syarat_lomba[new][type]">
            <option value="text">Text</option>
            <option value="number">Number</option>
            <option value="file">File</option>
            <option value="textarea">Textarea</option>
            <option value="email">Email</option>
        </select>
        <button type="button" onclick="removeSyarat(this)">Hapus</button>
    </div> --}}
</div>


<button type="button" onclick="addSyarat()">+ Tambah</button>


    <br>
    <button type="submit">Simpan</button>
=======
<div>
    <label>Syarat Lomba</label><br>
    {{-- <div id="syarat-container">
        @php
            $syarat = old('syarat_lomba', $lomba->syarat_lomba ?? []);
        @endphp
        @foreach ($syarat as $s)
        <input type="text" name="syarat_lomba[]" value="{{ $s }}"><br>
        @endforeach
        <input type="text" name="syarat_lomba[]" placeholder="Tambah syarat">
    </div> --}}
    <div id="syarat-container">
        @php
            $syarat = old('syarat_lomba', $lomba->syarat_lomba ?? []);
        @endphp
        @foreach ($syarat as $s)
            <div class="syarat-item">
                <input type="text" name="syarat_lomba[]" value="{{ $s }}">
                <div class="btn btn-sm btn-danger">
                    <button type="button" onclick="removeSyarat(this)">Hapus</button>
                </div>
            </div>
        @endforeach
        <div class="syarat-item">
            <input type="text" name="syarat_lomba[]" placeholder="Tambah syarat">
            <button type="button" class="btn btn-sm btn-danger" onclick="removeSyarat(this)"">Hapus</button>
        </div>
    </div>
    <button type="button" class="btn btn-sm btn-info mt-3" onclick="addSyarat()">+ Tambah</button>
</div>

<div class="row justify-content-start mt-4">
    <div class="form-group col-sm-3 button">
        <button type="submit" class="btn" style="width: 100%">Kirim</button>
    </div>
</div>
>>>>>>> Stashed changes

<script>
    let syaratIndex = {{ count($syarat) }};

    function addSyarat() {
        const container = document.getElementById('syarat-container');
        const div = document.createElement('div');
        div.className = 'syarat-item';
        div.style.marginBottom = '10px';

        div.innerHTML = `
<<<<<<< Updated upstream
            <input type="text" name="syarat_lomba[${syaratIndex}][field]" placeholder="Nama Field">
            <select name="syarat_lomba[${syaratIndex}][type]">
                <option value="text">Text</option>
                <option value="number">Number</option>
                <option value="file">File</option>
                <option value="textarea">Textarea</option>
                <option value="email">Email</option>
            </select>
            <button type="button" onclick="removeSyarat(this)">Hapus</button>
=======
            <input type="text" name="syarat_lomba[]" placeholder="Tambah syarat">
            <button type="button" class="btn btn-sm btn-danger mt-2" onclick="removeSyarat(this)"">Hapus</button>
>>>>>>> Stashed changes
        `;

        container.appendChild(div);
        syaratIndex++;
    }

    function removeSyarat(button) {
        button.parentElement.remove();
    }
</script>
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
