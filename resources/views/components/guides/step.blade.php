@props(['step', 'index', 'total', 'activity'])

<section
    class="step"
    id="paso-{{ $index + 1 }}"
    data-step="{{ $index }}"
    data-step-title="{{ $step['title'] }}"
    @isset($step['paths']) data-paths="{{ implode(',', $step['paths']) }}" @endisset
    aria-labelledby="paso-{{ $index + 1 }}-titulo"
>
    <header class="step__head">
        <span class="step__number" aria-hidden="true">{{ $index + 1 }}</span>
        <div>
            @isset($step['eyebrow'])
                <span class="eyebrow">{{ $step['eyebrow'] }}</span>
            @endisset
            <h3 class="step__title" id="paso-{{ $index + 1 }}-titulo">{{ $step['title'] }}</h3>
        </div>
    </header>
    @isset($step['paths'])
        <p class="step__path-note"><x-ui.icon name="route" size="14" /> Contenido para el camino que elegiste.</p>
    @endisset
    <div class="step__body">
        {{ $slot }}
    </div>
</section>
