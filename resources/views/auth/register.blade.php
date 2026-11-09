@extends('layouts.app')

@section('title', 'Crear cuenta')

@section('content')
    <div class="screen screen--auth">
        @include('auth.partials.auth-hero', ['active' => 'register'])

        <h1 class="sr-only">Crear una cuenta en AYULTA</h1>

        <form method="POST" action="{{ route('register.store') }}" class="form auth-form" novalidate data-validate>
            @csrf
            <x-ui.input name="name" label="Nombre" icon="user-round" placeholder="Nombre" autocomplete="name" required minlength="2" maxlength="100" hide-label />
            <x-ui.input name="email" label="Correo electrónico" type="email" icon="mail" placeholder="Correo electrónico" autocomplete="email" required hide-label />
            <x-ui.input name="password" label="Contraseña" type="password" icon="lock" placeholder="Contraseña (8+ caracteres)" autocomplete="new-password" required minlength="8" toggle hide-label />
            <x-ui.input name="password_confirmation" label="Confirmar contraseña" type="password" icon="lock" placeholder="Confirmar contraseña" autocomplete="new-password" required minlength="8" toggle data-match="password" hide-label />

            <x-ui.button type="submit" full size="lg">Crear cuenta</x-ui.button>
        </form>

        @include('auth.partials.google-button')

        <p class="auth-demo">Registro simulado: tus datos solo se guardan en esta demostración.</p>
    </div>
@endsection
