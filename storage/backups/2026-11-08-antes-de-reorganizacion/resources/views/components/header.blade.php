@props(['title', 'back' => null, 'eyebrow' => null])

<header class="page-header">
    @if($back)
        <a class="icon-button back-button" href="{{ $back }}" aria-label="Regresar">
            <x-icon name="arrow-left" />
        </a>
    @else
        <x-logo compact />
    @endif
    <div class="page-header-copy">
        @if($eyebrow)
            <span class="eyebrow">{{ $eyebrow }}</span>
        @endif
        <h1>{{ $title }}</h1>
    </div>
    <span class="header-spacer" aria-hidden="true"></span>
</header>
