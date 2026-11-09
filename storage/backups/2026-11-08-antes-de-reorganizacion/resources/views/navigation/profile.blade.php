@extends('layouts.app')

@section('title', 'Perfil — AYULTA')

@section('content')
    <div class="content-page profile-page">
        <x-header title="Mi perfil" eyebrow="TU CUENTA" />
        <section class="profile-card">
            <span class="avatar-circle" aria-hidden="true">{{ mb_strtoupper(mb_substr($user['name'], 0, 1)) }}</span>
            <div class="profile-identity">
                <h2>{{ $user['name'] }}</h2>
                <p>{{ $user['email'] }}</p>
            </div>
            <x-badge>{{ $user['is_demo'] ? 'Cuenta demo' : 'Cuenta temporal' }}</x-badge>
        </section>

        <section class="profile-section">
            <h2>Acerca de esta cuenta</h2>
            <div class="profile-info-row">
                <span class="profile-info-icon"><x-icon name="sparkles" size="20" /></span>
                <div>
                    <strong>Modo demostración</strong>
                    <p>El acceso no utiliza servicios de autenticación reales.</p>
                </div>
            </div>
            <div class="profile-info-row">
                <span class="profile-info-icon profile-info-green"><x-icon name="check" size="20" /></span>
                <div>
                    <strong>Sesión temporal</strong>
                    <p>Los registros creados aquí se guardan solo en tu sesión actual.</p>
                </div>
            </div>
        </section>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-buttons.secondary type="submit" full>Cerrar sesión</x-buttons.secondary>
        </form>
    </div>
@endsection

@section('tab', 'perfil')
