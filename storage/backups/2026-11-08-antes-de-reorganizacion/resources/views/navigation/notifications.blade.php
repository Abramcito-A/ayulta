@extends('layouts.app')

@section('title', 'Notificaciones — AYULTA')

@section('content')
    <div class="content-page">
        <x-header title="Notificaciones" eyebrow="AL DÍA CONTIGO" />
        <div class="page-intro">
            <p>Novedades y recordatorios para acompañar tu aprendizaje.</p>
        </div>

        <section class="notification-list" aria-label="Avisos recientes">
            <article class="notification-card">
                <span class="notification-card-icon"><x-icon name="sparkles" size="21" /></span>
                <div>
                    <div class="notification-card-heading">
                        <h2>¡Tu espacio ya está listo!</h2>
                        <x-badge tone="green">Nuevo</x-badge>
                    </div>
                    <p>Explora los cuatro temas que AYULTA tiene preparados para ti.</p>
                    <span class="notification-time"><x-icon name="clock" size="14" /> Hoy</span>
                </div>
            </article>
            <article class="notification-card">
                <span class="notification-card-icon notification-icon-blue"><x-icon name="heart" size="21" /></span>
                <div>
                    <h2>Aprende a tu ritmo</h2>
                    <p>Guarda tus temas favoritos y vuelve a ellos cuando quieras.</p>
                    <span class="notification-time"><x-icon name="clock" size="14" /> Siempre disponible</span>
                </div>
            </article>
        </section>

        <p class="demo-disclaimer">Estos avisos son contenido de demostración.</p>
    </div>
@endsection

@section('tab', 'notificaciones')
