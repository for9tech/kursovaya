@extends('layouts.app')

@section('title', 'Вход')
@section('styles')
    <link rel="stylesheet" href="{{ asset('public/auth.css') }}">
@endsection

@section('content')
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h1>Вход в систему</h1>
                <p>Войдите в свой аккаунт</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="auth-form">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-input @error('email') error @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input id="password" type="password" class="form-input @error('password') error @enderror"
                           name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="auth-button">
                    Войти
                </button>

                <div class="auth-divider">
                    <span>Нет аккаунта?</span>
                </div>

                <a href="{{ route('register') }}" class="auth-switch-button">
                    Зарегистрироваться
                </a>
            </form>
        </div>
    </div>
@endsection
