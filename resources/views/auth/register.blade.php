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



    .register-container {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 350px;
    }

    .register-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .register-form {
        display: flex;
        flex-direction: column;
    }

    .register-input {
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .register-button {
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        padding: 10px;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .register-button:hover {
        background-color: #0056b3;
    }

    .error-message {
        color: #e74c3c;
        margin-top: 5px;
    }
</style>

<div class="register-container">
    <div class="register-title">{{ __('Register') }}</div>

    <form class="register-form" method="POST" action="{{ route('register') }}">
        @csrf

        <label for="name">{{ __('Name') }}</label>
        <input id="name" type="text" name="name" class="register-input" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
            <div class="error-message">
                {{ $message }}
            </div>
        @enderror

        <label for="email">{{ __('Email Address') }}</label>
        <input id="email" type="email" name="email" class="register-input" value="{{ old('email') }}" required autocomplete="email">
        @error('email')
            <div class="error-message">
                {{ $message }}
            </div>
        @enderror

        <label for="password">{{ __('Password') }}</label>
        <input id="password" type="password" name="password" class="register-input" required autocomplete="new-password">
        @error('password')
            <div class="error-message">
                {{ $message }}
            </div>
        @enderror

        <label for="password-confirm">{{ __('Confirm Password') }}</label>
        <input id="password-confirm" type="password" name="password_confirmation" class="register-input" required autocomplete="new-password">

        <button type="submit" class="register-button">
            {{ __('Register') }}
        </button>
    </form>
</div>
@endsection
