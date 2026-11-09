@props(['module'])

<a href="{{ route($module['route'].'.index') }}" {{ $attributes->class('module-card') }} data-module-card="{{ $module['key'] }}">
    <span class="module-card__art" aria-hidden="true">
        <x-ui.illustration :name="$module['illustration']" />
    </span>
    <span class="module-card__body">
        <span class="module-card__top">
            <span class="icon-bubble"><x-ui.icon :name="$module['icon']" size="22" /></span>
            <span class="module-card__eyebrow">{{ $module['eyebrow'] }}</span>
        </span>
        <span class="module-card__title">{{ $module['title'] }}</span>
        <span class="module-card__text">{{ $module['description'] }}</span>
        <span class="module-card__meta">
            <span data-module-progress="{{ $module['key'] }}">{{ count($module['guides']) }} guías</span>
            <span class="module-card__link">Explorar <x-ui.icon name="arrow-right" size="16" /></span>
        </span>
    </span>
</a>
