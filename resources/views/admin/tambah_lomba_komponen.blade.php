<form action="{{ route('admin.tambah_lomba_komponen', $lomba->id) }}" method="POST">
    @csrf

    <h4>Pilih Komponen Penilaian untuk Lomba: <strong>{{ $lomba->nama_lomba }}</strong></h4>

    @foreach ($komponens as $komponen)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="komponen_nilai[]" value="{{ $komponen->id }}" id="komponen{{ $komponen->id }}">
            <label class="form-check-label" for="komponen{{ $komponen->id }}">
                {{ $komponen->nama }}
            </label>
        </div>
    @endforeach

    <button type="submit" class="btn btn-success mt-3">Simpan</button>
</form>
