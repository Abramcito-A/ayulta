@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <div class="screen">
        <header class="home-top">
            <x-ui.logo size="md" :href="route('home')" />
            <a class="icon-btn icon-btn--surface" href="{{ route('navigation.notifications') }}" aria-label="Ver notificaciones">
                <x-ui.icon name="bell" size="20" />
                <span class="icon-btn__dot" data-notification-dot hidden></span>
            </a>
        </header>

        <section class="welcome">
            <span class="eyebrow">Tu espacio para crecer</span>
            <h1 class="welcome__title">Hola, {{ $user['name'] }}.</h1>
            <p class="welcome__text">AYULTA te acompaña paso a paso en lo que nadie te explicó de la vida adulta: tu dinero, tus documentos, cómo moverte y dónde vivir. Aprende desde cero, a tu ritmo y con ejemplos reales.</p>
        </section>

        <a class="continue-card" href="#" data-continue-card hidden>
            <span class="icon-bubble icon-bubble--solid"><x-ui.icon name="play" size="18" /></span>
            <span class="continue-card__body">
                <span class="continue-card__eyebrow">Continúa donde te quedaste</span>
                <span class="continue-card__title" data-continue-title></span>
            </span>
            <x-ui.icon name="chevron-right" size="20" />
        </a>

        <x-ui.level-card />

        <section class="section" aria-labelledby="modulos-titulo">
            <div class="section__head">
                <span class="eyebrow">Cuatro módulos para empezar</span>
                <h2 class="section__title" id="modulos-titulo">¿Por dónde empezamos?</h2>
            </div>
            <div class="module-list">
                @foreach ($modules as $module)
                    <x-ui.module-card :module="$module" />
                @endforeach
            </div>
        </section>
    </div>
@endsection

@section('tab', 'inicio')
