@extends('auth.layouts.app')

@section('login')
<div>
    <h2>Register</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label for="name">Name:</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
            <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="email">Email:</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
            <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password">Password:</label>
            <input id="password" type="password" name="password" required autocomplete="new-password">
            @error('password')
            <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <button type="submit">Daftar</button>
        </div>
        <span>Sudah punya akun? <a href="/login">Login</a></span>
    </form>
</div>
@endsection