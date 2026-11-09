@props(['active' => 'inicio'])

@php
    $tabs = [
        ['key' => 'inicio', 'label' => 'Inicio', 'icon' => 'house', 'route' => 'home'],
        ['key' => 'favoritos', 'label' => 'Favoritos', 'icon' => 'bookmark', 'route' => 'navigation.favorites'],
        ['key' => 'notificaciones', 'label' => 'Notificaciones', 'icon' => 'bell', 'route' => 'navigation.notifications'],
        ['key' => 'perfil', 'label' => 'Perfil', 'icon' => 'user-round', 'route' => 'navigation.profile'],
    ];
@endphp

<nav class="bottom-nav" aria-label="Navegación principal">
    @foreach ($tabs as $tab)
        <a
            href="{{ route($tab['route']) }}"
            @class(['bottom-nav__item', 'is-active' => $active === $tab['key']])
            @if ($active === $tab['key']) aria-current="page" @endif
        >
            <span class="bottom-nav__icon">
                <x-ui.icon :name="$tab['icon']" size="22" />
                @if ($tab['key'] === 'notificaciones')
                    <span class="bottom-nav__dot" data-notification-dot hidden></span>
                @endif
            </span>
            <span class="bottom-nav__label">{{ $tab['label'] }}</span>
        </a>
    @endforeach
</nav>
