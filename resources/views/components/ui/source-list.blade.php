@props(['sources' => [], 'checkedAt' => null, 'title' => 'Fuentes oficiales'])

@if (count($sources) > 0)
    <section {{ $attributes->class('sources') }} aria-label="{{ $title }}">
        <h3 class="sources__title"><x-ui.icon name="landmark" size="18" /> {{ $title }}</h3>
        <ul class="sources__list">
            @foreach ($sources as $source)
                <li>
                    <a href="{{ $source['url'] }}" target="_blank" rel="noopener noreferrer" class="sources__link">
                        <span class="sources__name">{{ $source['name'] }}</span>
                        @isset($source['description'])
                            <span class="sources__text">{{ $source['description'] }}</span>
                        @endisset
                        <span class="sources__url">{{ preg_replace('#^https?://#', '', rtrim($source['url'], '/')) }} <x-ui.icon name="external-link" size="13" /></span>
                    </a>
                </li>
            @endforeach
        </ul>
        @if ($checkedAt)
            <p class="sources__date">Enlaces consultados el {{ \Illuminate\Support\Carbon::parse($checkedAt)->locale('es')->isoFormat('D [de] MMMM [de] YYYY') }}. Requisitos, costos y horarios pueden cambiar: confirma siempre en el portal oficial.</p>
        @endif
    </section>
@endif
