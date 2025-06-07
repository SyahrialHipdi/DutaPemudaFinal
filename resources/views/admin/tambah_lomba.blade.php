<form action="{{ route('admin.create_lomba') }}" method="POST">
    @csrf

    <!-- Nama Lomba -->
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Lomba</label>
        <input type="text" name="nama" id="nama" class="form-control" required>
    </div>

    <!-- Deskripsi -->
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required></textarea>
    </div>

    <!-- Tahun -->
    <div class="mb-3">
        <label for="tahun" class="form-label">Tahun</label>
        <input type="number" name="tahun" id="tahun" class="form-control" min="2000" max="2100" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Lomba</button>
</form>
