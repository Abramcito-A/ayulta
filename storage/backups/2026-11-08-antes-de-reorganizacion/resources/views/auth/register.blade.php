@extends('layouts.app')

@section('title', 'Crear cuenta — AYULTA')
@section('body-class', 'auth-body')

@section('content')
    <div class="auth-page auth-page-register">
        <section class="auth-hero" aria-label="Bienvenida a AYULTA">
            <svg class="city-illustration" viewBox="0 0 430 112" fill="none" aria-hidden="true">
                <path d="M0 94h430M17 94V60h39v34M24 60V47h25v13M30 48V31h13v17M72 94V72h35v22M78 72V53h24v19M116 94V43h41v51M122 43V31h29v12M128 31V18h17v13M170 94V64h31v30M207 94V51h53v43M213 51V40h41v11M218 40V26h31v14M270 94V70h35v24M313 94V55h48v39M321 55V41h31v14M371 94V66h43v28" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9 94h412M75 82h7m9 0h7m-7-8v16m37-15h7m8 0h7m-7-8v16m58-3h7m8 0h7m-7-8v16m72-2h7m8 0h7m-7-8v16m48-22h7m8 0h7m-7-8v16m50 7h7m8 0h7" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
            </svg>
            <div class="auth-brand-wrap">
                <x-logo />
                <p class="auth-welcome">Un primer paso para sentirte más preparado.</p>
            </div>
        </section>

        <section class="auth-panel">
            <div class="auth-tabs" role="tablist" aria-label="Acceso a tu cuenta">
                <a class="auth-tab" href="{{ route('login') }}" role="tab" aria-selected="false">Iniciar sesión</a>
                <a class="auth-tab is-selected" href="{{ route('register') }}" role="tab" aria-selected="true">Registrarme</a>
            </div>

            <div class="auth-heading">
                <h1>Comienza por aquí</h1>
                <p>Crea una cuenta temporal para esta demostración.</p>
            </div>

            <form class="auth-form" method="POST" action="{{ route('register.store') }}">
                @csrf
                <x-input
                    label="Nombre"
                    name="name"
                    placeholder="¿Cómo te llamas?"
                    autocomplete="name"
                    required
                />
                <x-input
                    label="Correo electrónico"
                    name="email"
                    type="email"
                    placeholder="tu@correo.com"
                    autocomplete="email"
                    required
                />
                <div class="password-field">
                    <x-input
                        label="Contraseña"
                        name="password"
                        type="password"
                        placeholder="Al menos 8 caracteres"
                        autocomplete="new-password"
                        required
                    />
                    <button class="password-toggle" type="button" data-password-toggle="password" aria-label="Mostrar contraseña" aria-pressed="false">
                        <x-icon name="eye" size="20" />
                    </button>
                </div>
                <div class="password-field">
                    <x-input
                        label="Confirmar contraseña"
                        name="password_confirmation"
                        type="password"
                        placeholder="Escribe tu contraseña otra vez"
                        autocomplete="new-password"
                        required
                    />
                    <button class="password-toggle" type="button" data-password-toggle="password_confirmation" aria-label="Mostrar contraseña" aria-pressed="false">
                        <x-icon name="eye" size="20" />
                    </button>
                </div>
                <x-buttons.primary type="submit" full>Crear cuenta</x-buttons.primary>
            </form>

            <p class="auth-switch-copy">¿Ya tienes una cuenta? <a href="{{ route('login') }}">Regresa al inicio de sesión</a></p>
            <p class="demo-note"><x-icon name="sparkles" size="15" /> Tus datos solo viven en la sesión de demostración.</p>
        </section>
    </div>
@endsection
