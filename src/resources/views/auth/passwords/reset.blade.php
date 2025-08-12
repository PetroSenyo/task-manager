@extends('layouts.app')

@section('content')
    <div class="container py-5" style="max-width: 480px;">
        <h1 class="h4 mb-4" style="color:#343ac8;">Створити новий пароль</h1>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-3">
                <label for="email" class="form-label">Email адреса</label>
                <input id="email" type="email" name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email', $email) }}" required autofocus>
                @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Новий пароль</label>
                <input id="password" type="password" name="password"
                       class="form-control @error('password') is-invalid @enderror"
                       required>
                @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label">Підтвердження паролю</label>
                <input id="password_confirmation" type="password" name="password_confirmation"
                       class="form-control" required>
            </div>

            <button type="submit" class="btn w-100 text-white"
                    style="background: linear-gradient(135deg, #343ac8 0%, #5a61d4 100%);">
                Оновити пароль
            </button>
        </form>
    </div>
@endsection
