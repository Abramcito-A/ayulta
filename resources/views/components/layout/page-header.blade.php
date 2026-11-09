@props(['title', 'back' => null, 'eyebrow' => null])

<header {{ $attributes->class('page-header') }}>
    @if ($back)
        <a class="icon-btn icon-btn--surface" href="{{ $back }}" aria-label="Regresar">
            <x-ui.icon name="arrow-left" size="20" />
        </a>
    @else
        <x-ui.logo size="sm" :href="route('home')" />
    @endif
    <div class="page-header__copy">
        @if ($eyebrow)
            <span class="eyebrow">{{ $eyebrow }}</span>
        @endif
        <h1 class="page-header__title">{{ $title }}</h1>
    </div>
    <div class="page-header__actions">{{ $actions ?? '' }}</div>
</header>
