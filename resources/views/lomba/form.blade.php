<h2>Form Pendaftaran: {{ $lomba->nama_lomba }}</h2>

<form method="POST" action="{{ route('lomba.submit', $lomba->id) }}" enctype="multipart/form-data">
    @csrf

    @foreach($lomba->syarat_lomba as $syarat)
        @php
            $parts = explode(':', $syarat);
            $field = $parts[0];
            $type = $parts[1] ?? 'text';
        @endphp

        <label>{{ ucfirst(str_replace('_', ' ', $field)) }}</label><br>

        @if($type === 'file')
            <input type="file" name="data_isian[{{ $field }}]"><br><br>
        @else
            <input type="text" name="data_isian[{{ $field }}]" value="{{ old("data_isian.$field") }}"><br><br>
        @endif
    @endforeach

    <button type="submit">Kirim Pendaftaran</button>
</form>
