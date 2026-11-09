@props(['type' => 'button', 'href' => null, 'full' => false])

@if($href)
    <a href="{{ $href }}" {{ $attributes->class(['button', 'button-secondary', 'button-full' => $full]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->class(['button', 'button-secondary', 'button-full' => $full]) }}>
        {{ $slot }}
    </button>
@endif
