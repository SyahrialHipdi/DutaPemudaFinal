<h2>Detail Pendaftar: {{ $lomba->nama_lomba }}</h2>

@if($lomba->users->isEmpty())
    <p><em>Belum ada yang mendaftar.</em></p>
@else
    <table border="1" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Email</th>
                <th>Data Isian</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lomba->users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name ?? '-' }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @php
                            $dataIsian = json_decode($user->pivot->data_isian, true);
                        @endphp
                        <ul>
                            @foreach($dataIsian as $k => $v)
                                <li><strong>{{ ucfirst($k) }}:</strong> {{ $v }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

<p><a href="{{ route('admin.lomba.pendaftar.index') }}">← Kembali ke Daftar Lomba</a></p>
