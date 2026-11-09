@extends('layouts.app')

@section('title', $module['title'])

@section('content')
    <div class="screen">
        <x-layout.page-header :title="$module['title']" :eyebrow="$module['eyebrow']" :back="route('home')" />

        <x-layout.module-hero :module="$module" title="Muévete por tu ciudad" text="Herramientas ilustrativas y guías para usar el transporte, planear recorridos y trasladarte con seguridad.">
            <x-ui.progress label="Guías completadas" :hook="'module-'.$module['key']" data-total="{{ count($guides) }}" class="progress--light" />
        </x-layout.module-hero>

        <section class="section" aria-labelledby="herramientas-movilidad">
            <div class="section__head">
                <span class="eyebrow">Herramientas</span>
                <h2 class="section__title" id="herramientas-movilidad">Tu ciudad en el bolsillo</h2>
            </div>
            <div class="tool-list">
                <x-ui.tool-card :href="route('mobility.routes')" icon="route" title="Rutas de transporte" description="Dos rutas ilustrativas de Torreón con recorrido, paradas y mapa." tag="Demostración" />
                <x-ui.tool-card :href="route('mobility.planner')" icon="navigation" title="Planifica tu recorrido" description="Escribe de dónde sales y a dónde vas para ver un recorrido de ejemplo." tag="Demostración" />
                <x-ui.tool-card :href="route('mobility.traffic')" icon="traffic-cone" title="Tráfico" description="Aprende a leer un mapa de tráfico con niveles fluido, moderado e intenso." tag="Ejemplo visual" />
            </div>
        </section>

        <section class="section" aria-labelledby="guias-movilidad">
            <div class="section__head">
                <span class="eyebrow">Guías de movilidad</span>
                <h2 class="section__title" id="guias-movilidad">Aprende a desplazarte</h2>
            </div>
            <div class="guide-list">
                @foreach ($guides as $guide)
                    <x-ui.guide-card :activity="$guide" />
                @endforeach
            </div>
        </section>
    </div>
@endsection

@section('tab', 'inicio')
