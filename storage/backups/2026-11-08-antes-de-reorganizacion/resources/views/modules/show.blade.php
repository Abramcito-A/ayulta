@extends('layouts.app')

@section('title', $module['title'].' — AYULTA')

@section('content')
    <div class="content-page module-page">
        <x-header :title="$module['title']" :back="route('home')" />

        <section class="module-banner" style="--module-accent: {{ $module['accent'] }}">
            <span class="module-banner-icon"><x-icon :name="$module['icon']" size="34" /></span>
            <span class="module-banner-eyebrow">{{ $module['eyebrow'] }}</span>
            <h2>{{ $module['title'] }}</h2>
            <p>{{ $module['description'] }}</p>
            <svg class="banner-decoration" viewBox="0 0 160 160" fill="none" aria-hidden="true">
                <circle cx="80" cy="80" r="68" stroke="currentColor" stroke-width="2"/>
                <circle cx="80" cy="80" r="48" stroke="currentColor" stroke-width="2"/>
                <circle cx="80" cy="80" r="28" stroke="currentColor" stroke-width="2"/>
            </svg>
        </section>

        <section class="module-placeholder">
            <span class="placeholder-icon"><x-icon name="sparkles" size="25" /></span>
            <x-badge tone="blue">PRÓXIMAMENTE</x-badge>
            <h2>Estamos preparando este espacio</h2>
            <p>Muy pronto encontrarás aquí recursos claros y útiles sobre {{ mb_strtolower($module['title']) }}.</p>
        </section>
    </div>
@endsection

@section('tab', 'inicio')
