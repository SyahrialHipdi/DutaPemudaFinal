
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Lomba</label>
        <small>{{$komponen->nama_lomba}} </small>
    </div>
    
    <!-- Deskripsi -->
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <small>{{$komponen->deskripsi}} </small>
    </div>
    
    <!-- Tahun -->
    <div class="mb-3">
        <label for="tahun" class="form-label">Tahun</label>
        <small>{{$komponen->tahun}} </small>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Lomba</button>
    <a href="{{ route('admin.tambah_lomba_komponen') }}" class="btn btn-primary">
    Tambah Komponen Penilaian
    </a>
