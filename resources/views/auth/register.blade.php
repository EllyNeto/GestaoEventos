@extends('layouts.app')

@section('content')
<div class="container">
    <div class="glass-form-container">
        <h1><ion-icon name="person-add-outline" style="color: var(--liquid-secondary); vertical-align: middle;"></ion-icon> {{ __('Criar Conta') }}</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group mb-3">
                <label for="name"><ion-icon name="person-outline"></ion-icon> {{ __('Nome Completo') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Seu nome">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="email"><ion-icon name="mail-outline"></ion-icon> {{ __('Endereço de E-Mail') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="seuemail@exemplo.com">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="password"><ion-icon name="lock-closed-outline"></ion-icon> {{ __('Senha') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="••••••••">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="password-confirm"><ion-icon name="checkmark-done-outline"></ion-icon> {{ __('Confirmar Senha') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••">
            </div>

            <button type="submit" class="btn btn-primary w-100">
                <ion-icon name="person-add-outline"></ion-icon> {{ __('Cadastrar-se') }}
            </button>
        </form>
    </div>
</div>
@endsection
