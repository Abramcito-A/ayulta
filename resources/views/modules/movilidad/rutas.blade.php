@extends('layouts.app')

@section('title', 'Rutas de transporte')

@section('content')
    <div class="screen">
        <x-layout.page-header title="Rutas de transporte" eyebrow="Movilidad" :back="route('mobility.index')" />

        <x-ui.notice tone="demo" title="Rutas de demostración">
            Estas dos rutas son ilustrativas: sus nombres, recorridos y paradas no son oficiales. Sirven para aprender a leer una ruta. Consulta las rutas vigentes de Torreón con las autoridades de transporte municipal o en una aplicación de navegación.
        </x-ui.notice>

        <div class="route-switch" role="tablist" aria-label="Elige una ruta" data-route-tabs>
            @foreach ($routes as $route)
                <button type="button" role="tab" class="route-switch__tab @if ($loop->first) is-active @endif" data-route-tab="{{ $route['key'] }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}" aria-controls="ruta-{{ $route['key'] }}" style="--route-color: {{ $route['color'] }}">
                    <span class="route-switch__swatch" aria-hidden="true"></span>
                    {{ $route['name'] }}
                </button>
            @endforeach
        </div>

        <x-ui.route-map :routes="$routes" :highlight="$routes[0]['key']" data-route-map />

        @foreach ($routes as $route)
            <section class="route-panel" id="ruta-{{ $route['key'] }}" role="tabpanel" data-route-panel="{{ $route['key'] }}" @unless ($loop->first) hidden @endunless style="--route-color: {{ $route['color'] }}">
                <header class="route-panel__head">
                    <span class="route-badge">{{ $route['name'] }}</span>
                    <h2 class="route-panel__title">{{ $route['label'] }}</h2>
                    <x-ui.badge tone="muted" icon="sparkles">Demostración</x-ui.badge>
                </header>
                <p class="prose">{{ $route['description'] }}</p>
                <dl class="result-grid">
                    <div><dt>Frecuencia</dt><dd>{{ $route['frequency'] }}</dd></div>
                    <div><dt>Horario</dt><dd>{{ $route['schedule'] }}</dd></div>
                </dl>
                <h3 class="block-title"><x-ui.icon name="map-pin" size="18" /> Paradas de ejemplo</h3>
                <ol class="timeline">
                    @foreach ($route['stops'] as $stop)
                        <li class="timeline__item">
                            <span class="timeline__dot" aria-hidden="true">{{ $loop->iteration }}</span>
                            <div>
                                <p class="timeline__title">{{ $stop['name'] }}</p>
                                <p class="timeline__text">{{ $stop['note'] }}</p>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </section>
        @endforeach

        <x-ui.tool-card :href="route('mobility.guides.show', 'identificar-ruta')" icon="book-open" title="Aprende a identificar una ruta" description="Guía para reconocer letreros, colores y números de una ruta de autobús." />
    </div>
@endsection

@section('tab', 'inicio')
