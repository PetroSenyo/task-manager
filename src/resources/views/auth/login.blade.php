@extends('layouts.app')

@section('content')
    <div class="container-fluid vh-100">
        <div class="row h-100">
            <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #343ac8 0%, #5a61d4 100%);">
                <div class="text-center text-white">
                    <h2 class="display-4 fw-bold mb-4">Ласкаво просимо!</h2>
                    <p class="lead fs-5">Увійдіть до свого акаунту та продовжуйте роботу</p>
                    <div class="mt-4">
                        <i class="bi bi-shield-check" style="font-size: 4rem; opacity: 0.3;"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 d-flex align-items-center justify-content-center bg-light">
                <div class="card shadow-lg border-0" style="width: 100%; max-width: 400px;">
                    <div class="card-body p-5">
                        <!-- Заголовок -->
                        <div class="text-center mb-4">
                            <h1 class="card-title h3 mb-3" style="color: #343ac8; font-weight: 600;">Вхід до системи</h1>
                            <p class="text-muted">Введіть свої дані для входу</p>
                        </div>

                        <!-- Форма логіну -->
                        <form method="POST" action="{{ route('authenticate') }}">
                            @csrf

                            <!-- Email поле -->
                            <div class="mb-3">

                                <label for="email" class="form-label fw-medium" style="color: #495057;">
                                    <i class="bi bi-envelope me-2" style="color: #343ac8;"></i>Email адреса
                                </label>
                                <input id="email"
                                       type="email"
                                       name="email"
                                       class="form-control form-control-lg "
                                       value="{{ old('email') }}"
                                       required
                                       autofocus
                                       placeholder="Введіть ваш email"
                                       style="border: 2px solid #e9ecef; border-radius: 10px;">


                            </div>

                            <!-- Password поле -->
                            <div class="mb-4">
                                <label for="password" class="form-label fw-medium" style="color: #495057;">
                                    <i class="bi bi-lock me-2" style="color: #343ac8;"></i>Пароль
                                </label>
                                <input id="password"
                                       type="password"
                                       name="password"
                                       class="form-control form-control-lg "
                                       required
                                       placeholder="Введіть ваш пароль"
                                       style="border: 2px solid #e9ecef; border-radius: 10px;">
                            </div>

                            <!-- Remember me і Forgot password -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" style="border-color: #343ac8;">
                                    <label class="form-check-label text-muted" for="remember">
                                        Запам'ятати мене
                                    </label>
                                </div>
                                <a href="{{ route('password.request') }}" class="text-decoration-none" style="color: #343ac8;">
                                    Забули пароль?
                                </a>
                            </div>

                            <!-- Кнопка входу -->
                            <button type="submit"
                                    class="btn btn-lg w-100 text-white fw-medium mb-3"
                                    style="background: linear-gradient(135deg, #343ac8 0%, #5a61d4 100%);
                                       border: none;
                                       border-radius: 10px;
                                       padding: 12px 24px;
                                       transition: all 0.3s ease;"
                                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(52, 58, 200, 0.3)'"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Увійти
                            </button>
                            @error('error-login')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
