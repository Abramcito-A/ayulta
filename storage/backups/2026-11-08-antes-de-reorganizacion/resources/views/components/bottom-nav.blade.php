@props(['active' => 'inicio'])

@php
    $tabs = [
        ['key' => 'inicio', 'label' => 'Inicio', 'icon' => 'house', 'route' => 'home'],
        ['key' => 'favoritos', 'label' => 'Favoritos', 'icon' => 'bookmark', 'route' => 'navigation.favorites'],
        ['key' => 'notificaciones', 'label' => 'Notificaciones', 'icon' => 'bell', 'route' => 'navigation.notifications'],
        ['key' => 'perfil', 'label' => 'Perfil', 'icon' => 'user', 'route' => 'navigation.profile'],
    ];
@endphp

<nav class="fixed bottom-0 inset-x-0 mx-auto w-full max-w-md bg-white border-t border-gray-100 flex justify-around items-center py-2 pb-6 z-50" aria-label="Navegación principal">
    @foreach ($tabs as $tab)
        @php($isActive = $active === $tab['key'])
        <a
            href="{{ route($tab['route']) }}"
            @class([
                'flex flex-col items-center justify-center min-w-16 transition-colors',
                'text-[#00A8E8]' => $isActive,
                'text-gray-500' => ! $isActive,
            ])
            @if ($isActive) aria-current="page" @endif
        >
            <x-dynamic-component :component="'lucide-'.$tab['icon']" class="w-6 h-6" />
            <span class="text-[10px] mt-1 font-medium">{{ $tab['label'] }}</span>
        </a>
    @endforeach
</nav>
