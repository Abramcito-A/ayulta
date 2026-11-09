@extends('layouts.app')

@section('title', $module['title'])

@section('content')
    <div class="screen">
        <x-layout.page-header :title="$module['title']" :eyebrow="$module['eyebrow']" :back="route('home')" />

        <x-layout.module-hero :module="$module" title="Tu primer hogar, paso a paso" text="Prepárate para rentar, comprar o independizarte con información clara y decisiones informadas.">
            <x-ui.progress label="Guías completadas" :hook="'module-'.$module['key']" data-total="{{ count($guides) + count($experiences) }}" class="progress--light" />
        </x-layout.module-hero>

        <section class="section" aria-labelledby="experiencias-vivienda">
            <div class="section__head">
                <span class="eyebrow">Experiencias interactivas</span>
                <h2 class="section__title" id="experiencias-vivienda">Practica antes de decidir</h2>
            </div>
            <div class="guide-list">
                @foreach ($experiences as $experience)
                    <x-ui.guide-card :activity="$experience" :favorite="false" />
                @endforeach
            </div>
        </section>

        <section class="section" aria-labelledby="guias-vivienda">
            <div class="section__head">
                <span class="eyebrow">Catálogo de guías</span>
                <h2 class="section__title" id="guias-vivienda">Siete guías para tu hogar</h2>
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
