@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Berikan Sertifikat ke User</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('warning'))
            <div class="alert alert-warning">{{ session('warning') }}</div>
        @endif

        <form action="{{ route('sertifikat.generate') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="user_id">Pilih User</label>
                <select name="user_id" class="form-control" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="lomba_id">Pilih Lomba</label>
                <select name="lomba_id" class="form-control" required>
                    @foreach($lombas as $lomba)
                        <option value="{{ $lomba->id }}">{{ $lomba->nama_lomba }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Buat Sertifikat</button>
        </form>
    </div>
@endsection
