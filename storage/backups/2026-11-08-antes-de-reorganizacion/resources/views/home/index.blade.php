@extends('layouts.app')

@section('title', 'Inicio — AYULTA')

@section('content')
    <div class="home-page">
        <header class="home-topbar">
            <x-logo compact />
            <a class="icon-button notification-shortcut" href="{{ route('navigation.notifications') }}" aria-label="Ver notificaciones">
                <x-icon name="bell" />
                <span class="notification-dot" aria-hidden="true"></span>
            </a>
        </header>

        <section class="home-welcome">
            <span class="eyebrow">TU ESPACIO PARA CRECER</span>
            <h1>Hola, {{ $user['name'] }}.</h1>
            <p>Pequeños pasos hoy, más confianza para todo lo que viene.</p>
        </section>

        <section class="learning-card" aria-label="Progreso de aprendizaje">
            <div class="learning-card-top">
                <span class="learning-icon"><x-icon name="sparkles" size="22" /></span>
                <x-badge>Tu aventura empieza aquí</x-badge>
            </div>
            <h2>Aprende a tu manera</h2>
            <p>Explora temas reales de la vida adulta, a tu ritmo y sin complicaciones.</p>
            <x-progress :value="0" label="Módulos por explorar" />
        </section>

        <section class="module-section">
            <div class="section-heading">
                <div>
                    <span class="eyebrow">CONOCIMIENTO PARA TU DÍA A DÍA</span>
                    <h2>¿Por dónde empezamos?</h2>
                </div>
            </div>
            <div class="module-list">
                @foreach($modules as $slug => $module)
                    <x-module-card :module="$module" :slug="$slug" />
                @endforeach
            </div>
        </section>
    </div>
@endsection

@section('tab', 'inicio')
