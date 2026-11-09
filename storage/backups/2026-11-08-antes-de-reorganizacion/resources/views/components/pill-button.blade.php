@props(['active' => false, 'href' => null])

@php
    $classes = 'inline-flex items-center justify-center rounded-full py-2 px-6 text-center font-medium text-sm transition-colors '
        .($active
            ? 'bg-[#00A8E8] text-white'
            : 'bg-white border border-gray-200 text-[#0F172A]');
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->class($classes) }} @if ($active) aria-current="true" @endif>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => 'button'])->class($classes) }} aria-pressed="{{ $active ? 'true' : 'false' }}">
        {{ $slot }}
    </button>
@endif
