@extends('layouts.app')

@section('title', 'Perfil')

@section('content')
    <div class="screen">
        <x-layout.page-header title="Mi perfil" eyebrow="Tu cuenta" />

        <section class="profile-card">
            <span class="avatar" aria-hidden="true">{{ mb_strtoupper(mb_substr($user['name'], 0, 1)) }}</span>
            <div class="profile-card__identity">
                <h2 class="profile-card__name">{{ $user['name'] }}</h2>
                <p class="profile-card__email">{{ $user['email'] }}</p>
                <x-ui.badge :tone="$user['is_demo'] ? 'secondary' : 'primary'">{{ $user['is_demo'] ? 'Cuenta demostrativa' : 'Cuenta de prueba' }}</x-ui.badge>
            </div>
        </section>

        <x-ui.level-card :levels="$levels" />

        <section class="stats" aria-label="Tu avance">
            <x-ui.stat icon="circle-check" label="Actividades completadas" hook="completed" />
            <x-ui.stat icon="play" label="Guías iniciadas" hook="started" />
            <x-ui.stat icon="bookmark" label="Guías guardadas" hook="favorites" />
            <x-ui.stat icon="star" label="Puntos de aprendizaje" hook="points" />
        </section>

        <section class="section" aria-labelledby="modulos-avance">
            <h2 class="section__title section__title--sm" id="modulos-avance">Avance por módulo</h2>
            <div class="module-progress" data-module-progress-list>
                @foreach (collect($catalog)->groupBy('module') as $moduleKey => $items)
                    <x-ui.progress :label="$items->first()['moduleTitle']" :hook="'module-'.$moduleKey" :caption="'0 de '.$items->count().' completadas'" data-total="{{ $items->count() }}" />
                @endforeach
            </div>
        </section>

        <section class="section" aria-labelledby="cuenta-titulo">
            <h2 class="section__title section__title--sm" id="cuenta-titulo">Acerca de esta cuenta</h2>
            <x-ui.notice tone="demo" title="Modo demostración">
                El acceso es simulado y no utiliza servicios de autenticación reales. Tu avance, favoritos y respuestas se guardan solo en este navegador.
            </x-ui.notice>
            <button type="button" class="btn btn--ghost btn--md btn--full" data-modal-open="reset-modal">
                <x-ui.icon name="rotate-ccw" size="18" />
                <span>Reiniciar mi avance en este dispositivo</span>
            </button>
        </section>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-ui.button type="submit" variant="danger" icon="log-out" full>Cerrar sesión</x-ui.button>
        </form>
    </div>

    <x-ui.modal id="reset-modal" title="¿Reiniciar tu avance?" icon="triangle-alert">
        <p class="prose">Se borrarán tus favoritos, puntos, respuestas y progreso guardados en este navegador. Tu cuenta no se elimina.</p>
        <div class="modal__actions">
            <button type="button" class="btn btn--danger btn--md btn--full" data-reset-progress data-modal-close>Sí, reiniciar</button>
            <button type="button" class="btn btn--ghost btn--md btn--full" data-modal-close>Cancelar</button>
        </div>
    </x-ui.modal>
@endsection

@section('tab', 'perfil')
