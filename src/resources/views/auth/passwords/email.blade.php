@extends('layouts.app')

@section('content')
    <div class="container py-5" style="max-width: 480px;">
        <h1 class="h4 mb-4" style="color:#343ac8;">Відновлення паролю</h1>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email адреса</label>
                <input id="email" type="email" name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}" required autofocus>
                @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn w-100 text-white"
                    style="background: linear-gradient(135deg, #343ac8 0%, #5a61d4 100%);">
                Надіслати посилання для скидання
            </button>
        </form>
    </div>
@endsection
