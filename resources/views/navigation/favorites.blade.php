@extends('layouts.app')

@section('title', 'Favoritos')

@section('content')
    <div class="screen">
        <x-layout.page-header title="Mis favoritos" eyebrow="Guardados para ti" />

        <p class="screen__intro">Tus guías guardadas de todos los módulos. Ábrelas cuando quieras o quítalas de la lista.</p>

        <div class="favorites" data-favorites-page>
            <div class="favorites__list" data-favorites-list>
                @foreach ($catalog as $item)
                    <article class="favorite-item" data-favorite-item="{{ $item['id'] }}" hidden>
                        <a class="favorite-item__link" href="{{ $item['url'] }}">
                            <span class="icon-bubble"><x-ui.icon :name="$item['icon']" size="20" /></span>
                            <span class="favorite-item__body">
                                <span class="favorite-item__module">{{ $item['moduleTitle'] }}</span>
                                <span class="favorite-item__title">{{ $item['title'] }}</span>
                                <span class="favorite-item__status" data-activity-status></span>
                            </span>
                        </a>
                        <button type="button" class="icon-btn" data-favorite-remove="{{ $item['id'] }}" aria-label="Quitar «{{ $item['title'] }}» de favoritos">
                            <x-ui.icon name="trash-2" size="18" />
                        </button>
                    </article>
                @endforeach
            </div>

            <x-ui.empty-state
                icon="bookmark"
                title="Aún no tienes favoritos"
                description="Toca el ícono de marcador en cualquier guía para guardarla aquí y encontrarla rápido."
                :href="route('home')"
                action="Explorar módulos"
                data-favorites-empty
            />
        </div>
    </div>
@endsection

@section('tab', 'favoritos')
