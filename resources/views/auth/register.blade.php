@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h1>Регистрация</h1>
                <p>Создайте новый аккаунт</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="auth-form">
                @csrf

                <div class="form-group">
                    <label for="name">Имя</label>
                    <input id="name" type="text" class="form-input @error('name') error @enderror"
                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-input @error('email') error @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input id="password" type="password" class="form-input @error('password') error @enderror"
                           name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm">Подтвердите пароль</label>
                    <input id="password-confirm" type="password" class="form-input"
                           name="password_confirmation" required autocomplete="new-password">
                </div>

                <button type="submit" class="auth-button">
                    Зарегистрироваться
                </button>

                <div class="auth-divider">
                    <span>Уже есть аккаунт?</span>
                </div>

                <a href="{{ route('login') }}" class="auth-switch-button">
                    Войти
                </a>
            </form>
        </div>
    </div>
@endsection
