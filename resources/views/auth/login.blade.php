@extends('layouts.app')

@section('content')
<div class="container">
    <div class="glass-form-container">
        <h1><ion-icon name="log-in-outline" style="color: var(--liquid-secondary); vertical-align: middle;"></ion-icon> {{ __('Entrar na Conta') }}</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group mb-3">
                <label for="email"><ion-icon name="mail-outline"></ion-icon> {{ __('Endereço de E-Mail') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="seuemail@exemplo.com">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="password"><ion-icon name="lock-closed-outline"></ion-icon> {{ __('Senha') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="••••••••">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label text-muted" for="remember">
                        {{ __('Lembrar de mim') }}
                    </label>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-between">
                <button type="submit" class="btn btn-primary">
                    <ion-icon name="log-in-outline"></ion-icon> {{ __('Entrar') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link text-muted" href="{{ route('password.request') }}">
                        {{ __('Esqueceu a senha?') }}
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection
