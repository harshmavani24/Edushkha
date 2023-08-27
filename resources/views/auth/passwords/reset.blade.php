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
    .login-input {
        margin-bottom: 15px;
        padding: 10px;
        border: none; /* Remove the border */
        background-color: #f5f5f5; /* Add a background color */
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .login-input input {
        width: 100%;
        padding: 8px;
        border: none; /* Remove the inner input border */
        background-color: transparent; /* Make the input background transparent */
        border-radius: 4px;
    }
</style>
<div class="login-container">
    <div class="login-title">{{ __('Reset Password') }}</div>

    <div class="login-form">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="login-input">
                <label for="email">{{ __('Email Address') }}</label>
                <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="login-input">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required autocomplete="new-password">
                @error('password')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="login-input">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div>
                <button type="submit" class="login-button">{{ __('Reset Password') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection