@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')
    <div class="screen screen--auth">
        @include('auth.partials.auth-hero', ['active' => 'login'])

        <h1 class="sr-only">Iniciar sesión en AYULTA</h1>

        <form method="POST" action="{{ route('login.store') }}" class="form auth-form" novalidate data-validate>
            @csrf
            <x-ui.input name="email" label="Correo electrónico" type="email" icon="mail" placeholder="Correo electrónico" autocomplete="email" required hide-label />
            <x-ui.input name="password" label="Contraseña" type="password" icon="lock" placeholder="Contraseña" autocomplete="current-password" required toggle hide-label />

            <x-ui.checkbox name="remember" label="Mantener sesión iniciada" />

            <x-ui.button type="submit" full size="lg">Iniciar sesión</x-ui.button>

            <button type="button" class="text-link auth-form__link" data-modal-open="recovery-modal">¿Olvidaste tu contraseña?</button>
        </form>

        @include('auth.partials.google-button')

        <p class="auth-demo">Cuenta demo: <strong>demo@ayulta.mx</strong> · <strong>ayulta123</strong></p>
    </div>

    <x-ui.modal id="recovery-modal" title="Recupera tu acceso" icon="key-round">
        <x-ui.notice tone="demo">Recuperación simulada: no se enviará ningún correo.</x-ui.notice>
        <form method="POST" action="{{ route('password.recovery') }}" class="form" novalidate data-validate>
            @csrf
            <x-ui.input name="recovery_email" label="Correo electrónico" type="email" icon="mail" placeholder="tu@correo.com" autocomplete="email" required />
            <x-ui.button type="submit" full>Simular recuperación</x-ui.button>
        </form>
    </x-ui.modal>
@endsection
