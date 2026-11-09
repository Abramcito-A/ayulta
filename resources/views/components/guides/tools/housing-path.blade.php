@props(['block', 'activity'])

<div class="journey" data-tool="housing-path">
    <div class="journey__summary">
        <x-ui.progress label="Tu camino hacia tu primera casa" hook="journey" caption="0 de {{ count($block['stages']) }} etapas completadas" />
    </div>
    <ol class="journey__stages">
        @foreach ($block['stages'] as $stage)
            <li class="journey-stage" data-stage="{{ $loop->index }}">
                <div class="journey-stage__marker" aria-hidden="true">
                    <span class="journey-stage__number">{{ $loop->iteration }}</span>
                    <x-ui.icon name="check" size="16" class="journey-stage__check" />
                </div>
                <div class="journey-stage__body">
                    <div class="journey-stage__head">
                        <h4 class="journey-stage__title">{{ $stage['title'] }}</h4>
                        <x-ui.badge tone="muted" data-stage-badge>Pendiente</x-ui.badge>
                    </div>
                    <p class="journey-stage__text">{{ $stage['body'] }}</p>
                    <ul class="list list--bullet list--compact">
                        @foreach ($stage['tasks'] as $task)
                            <li><x-ui.icon name="dot" size="16" /> <span>{{ $task }}</span></li>
                        @endforeach
                    </ul>
                    @isset($stage['link'])
                        <a class="text-link" href="{{ $stage['link']['url'] }}">{{ $stage['link']['label'] }} <x-ui.icon name="arrow-right" size="14" /></a>
                    @endisset
                    <label class="check check--card journey-stage__toggle">
                        <input type="checkbox" name="t-stage-{{ $loop->index }}" class="check__input" data-stage-toggle>
                        <span class="check__box" aria-hidden="true"><x-ui.icon name="check" size="14" /></span>
                        <span class="check__label">Marcar etapa como completada</span>
                    </label>
                </div>
            </li>
        @endforeach
    </ol>
    <div class="journey__lists">
        <div>
            <h5 class="tool__section"><x-ui.icon name="circle-check" size="16" /> Completadas</h5>
            <ul class="list list--check list--compact" data-journey-done><li class="muted">Aún ninguna.</li></ul>
        </div>
        <div>
            <h5 class="tool__section"><x-ui.icon name="clock" size="16" /> Pendientes</h5>
            <ul class="list list--bullet list--compact" data-journey-pending></ul>
        </div>
    </div>
</div>
