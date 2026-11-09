@props(['routes' => [], 'highlight' => null, 'label' => 'Mapa ilustrativo de rutas de demostración'])

{{-- Illustrative map only. Coordinates are fictitious (0-320 x 0-220). --}}
<figure {{ $attributes->class('map') }}>
    <svg class="map__svg" viewBox="0 0 320 220" role="img" aria-label="{{ $label }}">
        <rect width="320" height="220" rx="16" fill="#F4FBFE"/>
        <path d="M0 40h320M0 88h320M0 136h320M0 184h320M48 0v220M104 0v220M152 0v220M208 0v220M264 0v220" stroke="#DCEFF7" stroke-width="6"/>
        <path d="M0 112h320M176 0v220" stroke="#C9E7F4" stroke-width="10"/>
        <rect x="16" y="16" width="56" height="44" rx="8" fill="#E2F5EA" opacity=".9"/>
        <rect x="248" y="150" width="56" height="54" rx="8" fill="#E2F5EA" opacity=".9"/>
        @foreach ($routes as $route)
            @php
                $points = collect($route['points'])->map(fn ($p) => implode(',', $p))->implode(' ');
                $dimmed = $highlight && $highlight !== $route['key'];
            @endphp
            <g class="map__route" data-map-route="{{ $route['key'] }}" @if ($dimmed) opacity=".25" @endif>
                <polyline points="{{ $points }}" fill="none" stroke="#fff" stroke-width="9" stroke-linecap="round" stroke-linejoin="round"/>
                <polyline points="{{ $points }}" fill="none" stroke="{{ $route['color'] }}" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                @foreach ($route['stops'] as $stop)
                    <circle cx="{{ $stop['x'] }}" cy="{{ $stop['y'] }}" r="6" fill="#fff" stroke="{{ $route['color'] }}" stroke-width="3"/>
                    <text x="{{ $stop['x'] + 9 }}" y="{{ $stop['y'] - 8 }}" font-size="9" font-weight="600" fill="#0F172A">{{ $loop->iteration }}</text>
                @endforeach
            </g>
        @endforeach
        {{ $slot }}
    </svg>
    <figcaption class="map__caption"><x-ui.icon name="info" size="14" /> Mapa ilustrativo · No representa calles ni rutas oficiales</figcaption>
</figure>
