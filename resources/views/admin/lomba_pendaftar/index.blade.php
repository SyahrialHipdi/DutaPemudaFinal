<h2>Daftar Semua Lomba & Jumlah Pendaftar</h2>

<ul>
    @foreach($lombas as $lomba)
        <li>
            <strong>{{ $lomba->nama_lomba }} ({{ $lomba->tahun }})</strong> - 
            {{ $lomba->users_count }} pendaftar
            | <a href="{{ route('admin.lomba_pendaftar.show', $lomba->id) }}">Lihat Detail</a>
        </li>
    @endforeach
</ul>
