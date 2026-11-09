@extends('layouts.app')

@section('title', 'Localización de oficinas')

@section('content')
    <div class="screen">
        <x-layout.page-header title="Localización de oficinas" eyebrow="Trámites · Torreón, Coahuila" :back="route('procedures.index')" />

        <x-ui.notice tone="warning" title="Sin direcciones inventadas">
            No mostramos direcciones ni horarios porque cambian con frecuencia y no podemos verificarlos. Te llevamos al localizador oficial de cada institución, donde puedes buscar Torreón, Coahuila.
        </x-ui.notice>

        <div class="office-list">
            @foreach ($offices as $office)
                <article class="office card">
                    <header class="office__head">
                        <span class="icon-bubble icon-bubble--solid"><x-ui.icon :name="$office['icon']" size="20" /></span>
                        <div>
                            <h2 class="office__title">{{ $office['institution'] }}</h2>
                            <p class="office__service">{{ $office['service'] }}</p>
                        </div>
                    </header>
                    <p class="prose">{{ $office['how'] }}</p>
                    <p class="office__tip"><x-ui.icon name="lightbulb" size="16" /> <span>{{ $office['tip'] }}</span></p>
                    <x-ui.button :href="$office['url']" variant="outline" icon="external-link" full external>{{ $office['action'] }}</x-ui.button>
                </article>
            @endforeach
        </div>

        <p class="sources__date">Enlaces consultados el {{ \Illuminate\Support\Carbon::parse($checkedAt)->locale('es')->isoFormat('D [de] MMMM [de] YYYY') }}. Confirma siempre ubicación, horario y requisitos en el portal oficial.</p>
    </div>
@endsection

@section('tab', 'inicio')
