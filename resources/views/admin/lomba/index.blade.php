<h1>Kelola Lomba</h1>

<a href="{{ route('admin.lomba.create') }}">+ Tambah Lomba</a>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>Nama</th><th>Tahun</th><th>Aksi</th>
    </tr>
    @foreach($lombas as $lomba)
    <tr>
        <td>{{ $lomba->nama_lomba }}</td>
        <td>{{ $lomba->tahun }}</td>
        <td>
            <a href="{{ route('admin.lomba.edit', $lomba->id) }}">Edit</a>
            <form action="{{ route('admin.lomba.destroy', $lomba->id) }}" method="POST" style="display:inline">
                @csrf @method('DELETE')
                <button onclick="return confirm('Yakin hapus?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
