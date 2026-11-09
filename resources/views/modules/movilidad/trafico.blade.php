@extends('layouts.app')

@section('title', 'Tráfico ilustrativo')

@php
    $streets = [
        'av-principal' => ['M0 112h320', 'Avenida principal'],
        'calle-norte' => ['M176 0v112', 'Calle norte'],
        'calle-sur' => ['M176 112v108', 'Calle sur'],
        'periferico' => ['M24 20h272v180H24Z', 'Periférico'],
        'calle-centro' => ['M104 40v144', 'Calle centro'],
    ];
@endphp

@section('content')
    <div class="screen">
        <x-layout.page-header title="Tráfico" eyebrow="Movilidad" :back="route('mobility.index')" />

        <p class="traffic-warning" role="note"><x-ui.icon name="triangle-alert" size="18" /> Ejemplo visual · No es tráfico en tiempo real</p>

        <div class="segmented segmented--wide" role="radiogroup" aria-label="Elige un horario de ejemplo" data-traffic-times>
            <label><input type="radio" name="traffic-time" value="morning" checked><span>7:30 a. m.</span></label>
            <label><input type="radio" name="traffic-time" value="noon"><span>1:00 p. m.</span></label>
            <label><input type="radio" name="traffic-time" value="evening"><span>6:30 p. m.</span></label>
        </div>

        <figure class="map" data-traffic-map>
            <svg class="map__svg" viewBox="0 0 320 220" role="img" aria-label="Mapa ilustrativo de tráfico">
                <rect width="320" height="220" rx="16" fill="#F4FBFE"/>
                <path d="M0 40h320M0 184h320M48 0v220M264 0v220M232 0v220" stroke="#DCEFF7" stroke-width="5"/>
                @foreach ($streets as $key => [$path, $name])
                    <path d="{{ $path }}" fill="none" stroke="#fff" stroke-width="12" stroke-linecap="round"/>
                    <path d="{{ $path }}" fill="none" stroke-width="7" stroke-linecap="round" class="traffic-street" data-street="{{ $key }}"><title>{{ $name }}</title></path>
                @endforeach
                <text x="10" y="106" font-size="9" font-weight="600" fill="#0F172A">Av. principal</text>
                <text x="182" y="14" font-size="9" font-weight="600" fill="#0F172A">Calle norte</text>
                <text x="110" y="52" font-size="9" font-weight="600" fill="#0F172A">Calle centro</text>
            </svg>
            <figcaption class="map__caption"><x-ui.icon name="info" size="14" /> Calles y niveles de tráfico ficticios</figcaption>
        </figure>

        <ul class="traffic-legend">
            <li><span class="traffic-legend__line traffic-legend__line--low"></span> <strong>Verde:</strong> fluido</li>
            <li><span class="traffic-legend__line traffic-legend__line--mid"></span> <strong>Amarillo:</strong> moderado</li>
            <li><span class="traffic-legend__line traffic-legend__line--high"></span> <strong>Rojo:</strong> intenso</li>
        </ul>

        <section class="card" aria-live="polite">
            <h2 class="block-title"><x-ui.icon name="lightbulb" size="18" /> Cómo leer este mapa</h2>
            <p class="prose" data-traffic-text>A las 7:30 a. m. hay entradas a escuelas y trabajos: las avenidas principales suelen cargarse más.</p>
            <ul class="list list--bullet">
                <li><x-ui.icon name="dot" size="18" /> <span>Si tu recorrido pasa por una vía en rojo, considera salir antes o buscar una calle alterna.</span></li>
                <li><x-ui.icon name="dot" size="18" /> <span>En transporte público, el tráfico intenso también retrasa al autobús: suma tiempo extra.</span></li>
                <li><x-ui.icon name="dot" size="18" /> <span>Para conocer el tráfico real, usa una aplicación de navegación con datos en tiempo real.</span></li>
            </ul>
        </section>

        <x-ui.tool-card :href="route('mobility.guides.show', 'apps-de-navegacion')" icon="smartphone" title="Cómo usar aplicaciones de navegación" description="Aprende a consultar tráfico real, rutas y tiempos estimados." />
    </div>
@endsection

@section('tab', 'inicio')
