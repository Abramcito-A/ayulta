@props(['activity', 'checkedAt' => null])

<div class="summary">
    @if (count($activity['summary_points']) > 0)
        <div class="summary__card">
            <h4 class="block-title"><x-ui.icon name="list-checks" size="18" /> Lo más importante</h4>
            <ul class="list list--check">
                @foreach ($activity['summary_points'] as $point)
                    <li><x-ui.icon name="circle-check" size="18" /> <span>{{ $point }}</span></li>
                @endforeach
            </ul>
        </div>
    @endif

    <x-ui.source-list :sources="$activity['sources']" :checked-at="$checkedAt" />

    <div class="completion" data-completion>
        <x-ui.illustration name="logro" class="completion__art" />
        <div class="completion__pending" data-completion-pending>
            <h4 class="completion__title">¿Terminaste {{ $activity['kind'] === 'guide' ? 'la guía' : 'la experiencia' }}?</h4>
            <p>Márcala como completada para sumar puntos de aprendizaje y registrar tu avance.</p>
            <button type="button" class="btn btn--primary btn--md btn--full" data-complete-activity>
                <x-ui.icon name="party-popper" size="18" />
                <span>Marcar como completada</span>
            </button>
        </div>
        <div class="completion__done" data-completion-done hidden>
            <h4 class="completion__title">¡Completado!</h4>
            <p>Registramos tu avance. Puedes repasar el contenido cuando quieras.</p>
            <div class="completion__actions">
                <x-ui.button :href="$activity['moduleRoute']" variant="primary" icon="layout-grid">Más de {{ $activity['moduleTitle'] }}</x-ui.button>
                <button type="button" class="btn btn--ghost btn--md" data-restart-activity>
                    <x-ui.icon name="rotate-ccw" size="18" />
                    <span>Repetir</span>
                </button>
            </div>
        </div>
    </div>
</div>
