@extends('layouts.app')

@section('title', 'Planifica tu recorrido')

@section('content')
    <div class="screen">
        <x-layout.page-header title="Planifica tu recorrido" eyebrow="Movilidad" :back="route('mobility.index')" />

        <x-ui.notice tone="demo" title="Planificador demostrativo">
            El resultado es un recorrido ilustrativo para aprender a planear. No es un planificador en tiempo real ni usa rutas oficiales.
        </x-ui.notice>

        <form class="planner card" data-planner novalidate>
            <div class="planner__fields">
                <x-ui.input name="origin" label="¿De dónde sales?" icon="circle-dot" placeholder="Ej. Zona Centro, Torreón" list="planner-places" required maxlength="80" />
                <button type="button" class="icon-btn icon-btn--surface planner__swap" data-planner-swap aria-label="Intercambiar origen y destino">
                    <x-ui.icon name="arrow-up-down" size="18" />
                </button>
                <x-ui.input name="destination" label="¿A dónde vas?" icon="map-pin" placeholder="Ej. Zona Oriente, Torreón" list="planner-places" required maxlength="80" />
            </div>
            <datalist id="planner-places">
                @foreach ($places as $place)
                    <option value="{{ $place }}"></option>
                @endforeach
            </datalist>
            <div class="field">
                <span class="field__label">¿Cuándo sales?</span>
                <div class="segmented">
                    <label><input type="radio" name="time" value="now" checked><span>Ahora</span></label>
                    <label><input type="radio" name="time" value="peak"><span>Hora pico</span></label>
                    <label><input type="radio" name="time" value="night"><span>De noche</span></label>
                </div>
            </div>
            <p class="field__error" data-planner-error hidden>Escribe tu origen y tu destino (deben ser diferentes).</p>
            <x-ui.button type="submit" full icon="route">Ver recorrido ilustrativo</x-ui.button>
        </form>

        <section class="planner-result" data-planner-result hidden aria-live="polite">
            <h2 class="section__title section__title--sm">Recorrido sugerido <x-ui.badge tone="muted">Ejemplo</x-ui.badge></h2>
            <p class="prose" data-planner-summary></p>
            <x-ui.route-map label="Recorrido ilustrativo">
                <polyline data-planner-line points="40,180 40,112 176,112 176,52 280,52" fill="none" stroke="#00A8E8" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="1 0"/>
                <circle cx="40" cy="180" r="8" fill="#0F172A"/>
                <circle cx="280" cy="52" r="8" fill="#00A8E8" stroke="#fff" stroke-width="3"/>
            </x-ui.route-map>
            <ol class="timeline" data-planner-steps></ol>

            <h3 class="block-title"><x-ui.icon name="split" size="18" /> Alternativas demostrativas</h3>
            <div class="alt-list" data-planner-alternatives></div>

            <x-ui.notice tone="tip" title="Antes de salir">
                Confirma la ruta real en una aplicación de navegación o con el transporte municipal, revisa la hora de la última corrida y comparte tu ubicación con alguien de confianza si viajas de noche.
            </x-ui.notice>
            <a class="btn btn--outline btn--md btn--full" data-planner-maps href="https://www.google.com/maps" target="_blank" rel="noopener noreferrer">
                <x-ui.icon name="external-link" size="18" />
                <span>Consultar la ruta real en Google Maps</span>
            </a>
        </section>
    </div>
@endsection

@section('tab', 'inicio')
