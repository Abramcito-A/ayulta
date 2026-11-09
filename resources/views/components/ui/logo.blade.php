@props(['size' => 'md', 'tagline' => false, 'href' => null])

@php($tag = $href ? 'a' : 'div')

<{{ $tag }} @if ($href) href="{{ $href }}" aria-label="AYULTA, ir al inicio" @endif {{ $attributes->class(['logo', 'logo--'.$size]) }}>
    <img
        class="logo__mark"
        src="{{ asset('images/logo/ayulta-logo.png') }}"
        srcset="{{ asset('images/logo/ayulta-logo.png') }} 1x, {{ asset('images/logo/ayulta-logo@2x.png') }} 2x"
        alt=""
        width="256"
        height="256"
        decoding="async"
    >
    <span class="logo__copy">
        <span class="logo__name">ayulta</span>
        @if ($tagline)
            <span class="logo__tagline">{{ config('ayulta.tagline') }}</span>
        @endif
    </span>
</{{ $tag }}>
