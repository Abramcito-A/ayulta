@extends('layouts.app')

@section('title', $module['title'])

@section('content')
    <div class="screen">
        <x-layout.page-header :title="$module['title']" :eyebrow="$module['eyebrow']" :back="route('home')" />

        <x-layout.module-hero :module="$module" title="Tu dinero, tus decisiones" text="Aprende a usar el crédito con responsabilidad, ahorrar, armar tu presupuesto y protegerte de fraudes.">
            <x-ui.progress label="Guías completadas" :hook="'module-'.$module['key']" data-total="{{ count($guides) + count($experiences) }}" class="progress--light" />
        </x-layout.module-hero>

        <section class="section" aria-labelledby="guias-finanzas">
            <div class="section__head">
                <span class="eyebrow">Guías paso a paso</span>
                <h2 class="section__title" id="guias-finanzas">Aprende desde cero</h2>
            </div>
            <div class="guide-list">
                @foreach ($guides as $guide)
                    <x-ui.guide-card :activity="$guide" />
                @endforeach
            </div>
        </section>

        <section class="section" aria-labelledby="aprende-progresa">
            <div class="section__head">
                <span class="eyebrow">Practica con tus números</span>
                <h2 class="section__title" id="aprende-progresa">Aprende y progresa</h2>
                <p class="section__text">Tres experiencias interactivas para poner en práctica lo que aprendes. Cada una suma puntos a tu nivel.</p>
            </div>
            <x-ui.level-card :levels="$levels" />
            <div class="guide-list">
                @foreach ($experiences as $experience)
                    <x-ui.guide-card :activity="$experience" :favorite="false" />
                @endforeach
            </div>
        </section>

        <x-ui.notice tone="info" title="Información educativa">
            AYULTA no ofrece productos financieros ni recomienda instituciones específicas. Antes de contratar, compara con las herramientas de CONDUSEF y lee tu contrato.
        </x-ui.notice>
    </div>
@endsection

@section('tab', 'inicio')
