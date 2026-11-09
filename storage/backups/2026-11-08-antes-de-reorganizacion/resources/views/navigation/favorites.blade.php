@extends('layouts.app')

@section('title', 'Favoritos — AYULTA')

@section('content')
    <div class="content-page">
        <x-header title="Mis favoritos" eyebrow="GUARDADOS PARA TI" />
        <div class="page-intro">
            <p>Ten a la mano los temas que quieras consultar de nuevo.</p>
        </div>
        <x-empty-state
            icon="heart"
            title="Aún no tienes favoritos"
            description="Cuando guardes un tema de aprendizaje, aparecerá aquí para que lo encuentres fácilmente."
            :href="route('home')"
            link-text="Explorar módulos"
        />
    </div>
@endsection

@section('tab', 'favoritos')
