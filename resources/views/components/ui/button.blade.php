@props([
    'variant' => 'primary',
    'href' => null,
    'type' => 'button',
    'icon' => null,
    'iconRight' => null,
    'full' => false,
    'size' => 'md',
    'external' => false,
])

@php
    $classes = ['btn', 'btn--'.$variant, 'btn--'.$size, 'btn--full' => $full];
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->class($classes) }} @if ($external) target="_blank" rel="noopener noreferrer" @endif>
        @if ($icon) <x-ui.icon :name="$icon" size="18" /> @endif
        <span>{{ $slot }}</span>
        @if ($iconRight) <x-ui.icon :name="$iconRight" size="18" /> @endif
        @if ($external) <span class="sr-only">(se abre en una pestaña nueva)</span> @endif
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->class($classes) }}>
        @if ($icon) <x-ui.icon :name="$icon" size="18" /> @endif
        <span>{{ $slot }}</span>
        @if ($iconRight) <x-ui.icon :name="$iconRight" size="18" /> @endif
    </button>
@endif
