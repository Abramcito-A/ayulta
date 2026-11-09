@props(['tone' => 'info', 'title' => null, 'icon' => null])

@php
    $icons = ['info' => 'info', 'tip' => 'lightbulb', 'warning' => 'triangle-alert', 'success' => 'circle-check', 'demo' => 'sparkles'];
@endphp

<aside {{ $attributes->class(['notice', 'notice--'.$tone]) }}>
    <x-ui.icon :name="$icon ?? $icons[$tone] ?? 'info'" size="20" class="notice__icon" />
    <div class="notice__body">
        @if ($title)
            <p class="notice__title">{{ $title }}</p>
        @endif
        <div class="notice__text">{{ $slot }}</div>
    </div>
</aside>
