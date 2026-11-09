@extends('layouts.app')

@section('title', 'Iniciar sesión — AYULTA')

@section('content')
    <div class="flex flex-col min-h-screen px-6 pt-12 pb-8 bg-[#E6F8FF]">
        <header>
            <div class="rounded-xl border-2 border-black w-16 h-16 flex items-center justify-center mx-auto mb-2 bg-white" aria-hidden="true">
                <x-lucide-house class="w-8 h-8 text-[#00A8E8]" />
            </div>
            <h1 class="font-bold text-3xl text-center mb-1 text-[#0F172A]">ayulta</h1>
            <p class="font-semibold text-lg text-center mb-8">La vida adulta, más fácil.</p>
        </header>

        <nav class="bg-white/50 border border-gray-200 rounded-full flex p-1 mb-8 shadow-sm" aria-label="Acceso a tu cuenta">
            <a href="{{ route('login') }}" class="w-1/2 rounded-full py-2 text-center font-medium bg-[#00A8E8] text-white" aria-current="page">Iniciar sesión</a>
            <a href="{{ route('register') }}" class="w-1/2 rounded-full py-2 text-center font-medium text-[#0F172A]">Registrarme</a>
        </nav>

        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <x-input-field icon="mail" placeholder="Correo electrónico" type="email" name="email" autocomplete="email" required />
            <x-input-field icon="lock" placeholder="Contraseña" type="password" rightIcon="eye" name="password" autocomplete="current-password" required />

            <label class="flex items-center gap-2 mb-6 text-sm font-medium" for="remember">
                <input id="remember" name="remember" type="checkbox" value="1" class="w-4 h-4 accent-[#00A8E8]" @checked(old('remember'))>
                Mantener sesión iniciada
            </label>

            <button type="submit" class="w-full bg-[#00A8E8] text-white rounded-full py-3 text-lg font-semibold mb-4 transition-colors hover:bg-[#33C4F0]">
                Iniciar sesión
            </button>
        </form>

        <button type="button" class="text-[#00A8E8] text-sm text-center font-medium underline block mx-auto mb-8" data-modal-open="recovery-modal">
            ¿Olvidaste tu contraseña?
        </button>

        <div class="flex items-center gap-4 text-sm text-gray-500 mb-6">
            <span class="h-px grow bg-gray-300"></span>
            o continúa con
            <span class="h-px grow bg-gray-300"></span>
        </div>

        <button type="button" class="w-full bg-white border border-gray-900 rounded-full py-3 flex items-center justify-center gap-3 font-semibold text-[#0F172A]" data-demo-google>
            <x-icon name="google" size="20" />
            Continuar con Google
        </button>

        <p class="mt-auto pt-8 text-center text-xs text-gray-500">
            Cuenta demo: <strong class="font-semibold text-[#0F172A]">demo@ayulta.mx</strong> · Contraseña: ayulta123
        </p>
    </div>

    <x-modal id="recovery-modal" title="Recupera tu acceso">
        <p class="modal-description">Esta recuperación es solo demostrativa. No se enviará ningún correo.</p>
        <form method="POST" action="{{ route('password.recovery') }}" class="modal-form">
            @csrf
            <x-input-field icon="mail" placeholder="Correo electrónico" type="email" name="recovery_email" autocomplete="email" required />
            <x-buttons.primary type="submit" full>Continuar</x-buttons.primary>
        </form>
    </x-modal>
@endsection
