@extends('layouts.app')

@section('title', 'Notificaciones')

@section('content')
    <div class="screen">
        <x-layout.page-header title="Notificaciones" eyebrow="Al día contigo">
            <x-slot:actions>
                <button type="button" class="icon-btn icon-btn--surface" data-notifications-read aria-label="Marcar todas como leídas">
                    <x-ui.icon name="check-check" size="20" />
                </button>
            </x-slot:actions>
        </x-layout.page-header>

        <p class="screen__intro">Tu actividad reciente y recordatorios para seguir aprendiendo.</p>

        <section class="section" aria-labelledby="actividad-titulo">
            <h2 class="section__title section__title--sm" id="actividad-titulo">Tu actividad</h2>
            <div class="notification-list" data-notification-list></div>
            <x-ui.empty-state
                icon="bell"
                title="Sin actividad todavía"
                description="Cuando inicies una guía, completes una actividad o avances de nivel, lo verás aquí."
                :href="route('home')"
                action="Empezar una guía"
                data-notifications-empty
            />
        </section>

        <section class="section" aria-labelledby="recordatorios-titulo">
            <h2 class="section__title section__title--sm" id="recordatorios-titulo">Recordatorios educativos</h2>
            <div class="notification-list">
                @foreach ($reminders as $reminder)
                    <article class="notification">
                        <span class="icon-bubble"><x-ui.icon :name="$reminder['icon']" size="20" /></span>
                        <div class="notification__body">
                            <h3 class="notification__title">{{ $reminder['title'] }}</h3>
                            <p class="notification__text">{{ $reminder['body'] }}</p>
                            <a class="text-link" href="{{ route($reminder['route'], $reminder['params'] ?? []) }}">{{ $reminder['action'] }} <x-ui.icon name="arrow-right" size="14" /></a>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        <p class="block-note">Las notificaciones son demostrativas y se generan solo en este dispositivo. AYULTA no envía mensajes externos.</p>

        <template data-notification-template>
            <article class="notification">
                <span class="icon-bubble" data-n-icon></span>
                <div class="notification__body">
                    <div class="notification__head">
                        <h3 class="notification__title" data-n-title></h3>
                        <span class="badge badge--primary" data-n-new hidden>Nuevo</span>
                    </div>
                    <p class="notification__text" data-n-text></p>
                    <span class="notification__time"><span data-n-time></span></span>
                    <a class="text-link" data-n-link hidden>Abrir <span aria-hidden="true">→</span></a>
                </div>
            </article>
        </template>

        <div hidden>
            @foreach (['play' => 'play', 'circle-check' => 'circle-check', 'award' => 'award', 'trending-up' => 'trending-up', 'bookmark' => 'bookmark'] as $icon)
                <span data-icon-sprite="{{ $icon }}"><x-ui.icon :name="$icon" size="20" /></span>
            @endforeach
        </div>
    </div>
@endsection

@section('tab', 'notificaciones')
