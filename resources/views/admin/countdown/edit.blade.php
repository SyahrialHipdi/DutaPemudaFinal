<!DOCTYPE html>
<html>

<head>
    <title>Edit Countdown</title>
</head>

<body>
    <h1>Edit Countdown</h1>

    <form method="POST" action="{{ route('countdown.update', $countdown->id) }}">
        @csrf
        <input type="text" name="title" value="{{ $countdown->title }}" required>
        <input type="datetime-local" name="target_datetime" value="{{ $countdown->target_datetime->format('Y-m-d\TH:i') }}"
            required>

        <select name="status">
            <option value="1" {{ $countdown->status ? 'selected' : '' }}>Aktif</option>
            <option value="0" {{ !$countdown->status ? 'selected' : '' }}>Mati</option>
        </select>

        <button type="submit">Update</button>
    </form>

    <a href="/countdown">Kembali</a>
</body>

</html>
