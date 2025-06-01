@extends('layouts.app')

@section('title', 'User Dashboard')

@section('content')

<form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="password">Password baru:</label>
        <input type="text" name="password" id="password" value="" required>
        <input type="text" name="password_confirmation" id="password_confirmation" value="" required>
        <br><br>

        <button type="submit">Update</button>
        <a href="/user/dashboard">
            <button type="button">Batal</button>
        </a>
    </form>
@endsection

            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

                                            {{-- @error('cek')
            <div style="color:red;">{{ $message }}</div>
                            @enderror --}}