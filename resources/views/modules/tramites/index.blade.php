@extends('layouts.app')

@section('title', $module['title'])

@section('content')
    <div class="screen">
        <x-layout.page-header :title="$module['title']" :eyebrow="$module['eyebrow']" :back="route('home')" />

        <x-layout.module-hero :module="$module" title="Tus documentos, sin complicaciones" text="Entiende para qué sirve cada documento, qué te pueden pedir y cómo prepararte antes de ir.">
            <x-ui.progress label="Guías completadas" :hook="'module-'.$module['key']" data-total="{{ count($guides) }}" class="progress--light" />
        </x-layout.module-hero>

        <x-ui.notice tone="warning" title="Información general vs. requisitos particulares">
            Estas guías explican el proceso general. Cada institución puede pedir requisitos adicionales según tu caso. Confirma siempre en el portal oficial antes de acudir.
        </x-ui.notice>

        <section class="section" aria-labelledby="guias-tramites">
            <div class="section__head">
                <span class="eyebrow">Seis guías principales</span>
                <h2 class="section__title" id="guias-tramites">Elige tu trámite</h2>
            </div>
            <div class="guide-list">
                @foreach ($guides as $guide)
                    <x-ui.guide-card :activity="$guide" />
                @endforeach
            </div>
        </section>

        <section class="section" aria-labelledby="oficinas-titulo">
            <h2 class="section__title section__title--sm" id="oficinas-titulo">¿Dónde se realizan?</h2>
            <x-ui.tool-card :href="route('procedures.offices')" icon="map-pin" title="Localización de oficinas" description="Localizadores oficiales para encontrar módulos y oficinas en Torreón, Coahuila." tag="Torreón primero" />
        </section>
    </div>
@endsection

@section('tab', 'inicio')
