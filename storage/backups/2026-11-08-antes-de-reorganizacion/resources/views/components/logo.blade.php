@props(['compact' => false, 'light' => false])

<a class="brand {{ $compact ? 'brand-compact' : '' }} {{ $light ? 'brand-light' : '' }}" href="{{ route('login') }}" aria-label="AYULTA, inicio">
    <span class="brand-mark" aria-hidden="true">
        <svg viewBox="0 0 42 42" fill="none">
            <path d="M7 16.5 21 7l14 9.5v16a2.5 2.5 0 0 1-2.5 2.5h-23A2.5 2.5 0 0 1 7 32.5v-16Z" fill="currentColor" opacity=".14"/>
            <path d="M7 17 21 7l14 10M11 18.5V33h20V18.5M18 33V23h6v10" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"/>
            <circle cx="31.5" cy="10.5" r="4.5" fill="#33C4F0"/>
            <path d="M31.5 8v5M29 10.5h5" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
    </span>
    <span class="brand-copy">
        <span class="brand-name">AYULTA</span>
        @unless($compact)
            <span class="brand-tagline">La vida adulta, más fácil.</span>
        @endunless
    </span>
</a>
