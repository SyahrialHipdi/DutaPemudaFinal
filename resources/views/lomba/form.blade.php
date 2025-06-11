<h2>Form Pendaftaran: {{ $lomba->nama_lomba }}</h2>

<form method="POST" action="{{ route('lomba.submit', $lomba->id) }}">
    @csrf

    @foreach($lomba->syarat_lomba as $syarat)
        <label>{{ ucfirst($syarat) }}</label><br>
        <input type="text" name="data_isian[{{ $syarat }}]" value="{{ old("data_isian.$syarat") }}"><br><br>
    @endforeach

    <button type="submit">Kirim Pendaftaran</button>
</form>
