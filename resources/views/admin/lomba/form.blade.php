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
            <button type="button" onclick="removeSyarat(this)">Hapus</button>
        </div>
    @endforeach
    <div class="syarat-item">
        <input type="text" name="syarat_lomba[]" placeholder="Tambah syarat">
        <button type="button" onclick="removeSyarat(this)">Hapus</button>
    </div>
</div>
    <button type="button" onclick="addSyarat()">+ Tambah</button>
</div>

<br>
<button type="submit">Simpan</button>

<script>
    function addSyarat() {
        const container = document.getElementById('syarat-container');
        const div = document.createElement('div');
        div.className = 'syarat-item';
        div.innerHTML = `
            <input type="text" name="syarat_lomba[]" placeholder="Tambah syarat">
            <button type="button" onclick="removeSyarat(this)">Hapus</button>
        `;
        container.appendChild(div);
    }

    function removeSyarat(button) {
        button.parentElement.remove();
    }
</script>