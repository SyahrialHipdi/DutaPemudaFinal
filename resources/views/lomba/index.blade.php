<h2>Daftar Lomba</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<ul>
@foreach($lombas as $lomba)
    <li>
        <strong>{{ $lomba->nama_lomba }} ({{ $lomba->tahun }})</strong><br>
        {{ $lomba->deskripsi }}<br>
        <a href="{{ route('lomba.form', $lomba->id) }}">Daftar</a>
    </li>
@endforeach
</ul>
