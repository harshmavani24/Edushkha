@extends('layouts.app')

@section('content')
<style>
@keyframes gradientAnimation {
    0% {
        background-position: 0% 50%;
    }
    100% {
        background-position: 100% 50%;
    }
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    background: linear-gradient(45deg, #d9f0f0, #aabbdd) fixed;
    background-size: 200% 200%;
    animation: gradientAnimation 10s ease infinite;
}

    .login-container {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 350px;
    }

    .login-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .login-form {
        display: flex;
        flex-direction: column;
    }

    .login-input {
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .login-button {
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        padding: 10px;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .login-button:hover {
        background-color: #0056b3;
    }

    .forgot-password {
        margin-top: 10px;
        text-align: center;
        color: #666;
    }
</style>

<div class="login-container">
    <div class="login-title">{{ __('Login') }}</div>

    <form class="login-form" method="POST" action="{{ route('login') }}">
        @csrf

        <label for="email">{{ __('Email Address') }}</label>
        <input id="email" type="email" name="email" class="login-input" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
            <span role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <label for="password">{{ __('Password') }}</label>
        <input id="password" type="password" name="password" class="login-input" required autocomplete="current-password">

        @error('password')
            <span role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div>
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>

        <button type="submit" class="login-button">
            {{ __('Login') }}
        </button>

        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="forgot-password">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
    </form>
</div>
@endsection
